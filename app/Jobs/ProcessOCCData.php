<?php

namespace App\Jobs;

use App\Models\Upload;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\ReadFilter;
use Illuminate\Support\Facades\Log;

class ProcessOccData
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $uploadId;

    public function __construct($uploadId)
    {
        $this->uploadId = $uploadId;
    }

    public function handle()
    {
        $latest = Upload::find($this->uploadId);
        Log::info('Processing OCC data for upload: ' . $this->uploadId);

        if (!$latest || !Storage::exists($latest->file_path)) {
            Cache::forget('occ_data');
            return;
        }

        $path = Storage::path($latest->file_path);
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $dataRows = [];

        if ($extension === 'csv') {
            if (($handle = fopen($path, 'r')) !== false) {
                while (($data = fgetcsv($handle)) !== false) {
                    $dataRows[] = $data;
                }
                fclose($handle);
            }
            
        } elseif (in_array($extension, ['xlsx', 'xls'])) {
            try {
                $reader = IOFactory::createReader(ucfirst($extension));
                $reader->setReadDataOnly(true);
                $reader->setReadFilter(new class implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {
                    public function readCell(string $column, int $row, ?string $worksheetName = null): bool {
                        return $row === 1;
                    }
                });
                $spreadsheet = $reader->load($path);
                $sheet = $spreadsheet->getActiveSheet();
                $header = $sheet->rangeToArray('A1:' . $sheet->getHighestColumn() . '1')[0];
                $spreadsheet->disconnectWorksheets();
                unset($spreadsheet);

                $needed = ['AVAI', 'Telkom Datel', 'OCC 1', 'UPDATE DATE'];
                $indexes = [];

                foreach ($needed as $key) {
                    $i = array_search($key, $header);
                    $indexes[$key] = ($i !== false) ? $i : null;
                }

                $neededColumnsLetters = [];
                foreach ($indexes as $idx) {
                    if ($idx !== null) {
                        $neededColumnsLetters[] = Coordinate::stringFromColumnIndex($idx + 1);
                    }
                }

                $reader->setReadFilter(new ReadFilter($neededColumnsLetters));
                $spreadsheet = $reader->load($path);
                $sheet = $spreadsheet->getActiveSheet();
                $dataRows = $sheet->toArray();

                $spreadsheet->disconnectWorksheets();
                unset($spreadsheet);
            } catch (\Exception $e) {
                Cache::forget('occ_data');
                return;
            }
        } else {
            Cache::forget('occ_data');
            return;
        }

        if (empty($dataRows)) {
            Cache::forget('occ_data');
            return;
        }

        $header = array_map('trim', $dataRows[0]);
        $needed = ['AVAI', 'Telkom Datel', 'OCC 1', 'UPDATE DATE'];
        $indexes = [];

        foreach ($needed as $key) {
            $i = array_search($key, $header);
            $indexes[$key] = ($i !== false) ? $i : null;
        }

        $data = [];
        for ($i = 1; $i < count($dataRows); $i++) {
            $row = $dataRows[$i];
            $data[] = [
                'idle' => $indexes['AVAI'] !== null ? ($row[$indexes['AVAI']] ?? '') : '',
                'telda' => $indexes['Telkom Datel'] !== null ? ($row[$indexes['Telkom Datel']] ?? '') : '',
                'occ' => $indexes['OCC 1'] !== null ? ($row[$indexes['OCC 1']] ?? '') : '',
                'updated' => $indexes['UPDATE DATE'] !== null ? ($row[$indexes['UPDATE DATE']] ?? '') : '',
            ];
        }

        $groupedData = [];

        foreach ($data as $row) {
            $telda = trim($row['telda']);
            $occ = is_numeric($row['occ']) ? floatval($row['occ']) : 0;
            $idle = is_numeric($row['idle']) ? floatval($row['idle']) : 0;
            $updated = trim($row['updated']);

            if (!isset($groupedData[$telda])) {
                $groupedData[$telda] = [
                    'telda' => $telda,
                    'occ_sum' => $occ,
                    'occ_count' => 1,
                    'idle_sum' => $idle,
                    'latest_updated' => $updated !== '' ? $updated : null,
                ];
            } else {
                $groupedData[$telda]['occ_sum'] += $occ;
                $groupedData[$telda]['occ_count']++;
                $groupedData[$telda]['idle_sum'] += $idle;

                $currentLatest = $groupedData[$telda]['latest_updated'];
                if ($updated !== '') {
                    $updatedTime = strtotime($updated);
                    $currentLatestTime = $currentLatest !== null ? strtotime($currentLatest) : false;

                    if ($currentLatestTime === false || $updatedTime > $currentLatestTime) {
                        $groupedData[$telda]['latest_updated'] = $updated;
                    }
                }
            }
        }

        $finalData = [];

        foreach ($groupedData as $telda => $values) {
            $avgOcc = $values['occ_count'] > 0 ? $values['occ_sum'] / $values['occ_count'] : 0;

            $finalData[] = [
                'telda' => $telda,
                'occ' => round($avgOcc * 100, 2) . '%',
                'idle' => $values['idle_sum'],
                'updated' => $values['latest_updated'] ?? '',
            ];
        }

        Cache::put('occ_data', $finalData, now()->addMinutes(30));
    }
}

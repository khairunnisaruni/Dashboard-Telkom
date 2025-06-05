<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessOCCData;
use Illuminate\Support\Facades\Cache;
use App\Models\Upload;

class OccController extends Controller
{
    public function showOCC(Request $request)
    {
        if (!Cache::has('occ_data')) {
            $latest = Upload::where('type', 'occ')->latest()->first();
            if ($latest) {
                ProcessOccData::dispatch($latest->id);
            }
        }

        $occData = $this->filterAndSortOCC(Cache::get('occ_data', []), $request);
        return view('occ', ['occData' => $occData]);
    }

    public function showOCCUser(Request $request)
    {
        if (!Cache::has('occ_data')) {
            $latest = Upload::where('type', 'occ')->latest()->first();
            if ($latest) {
                ProcessOccData::dispatch($latest->id);
            }
        }

        $occData = $this->filterAndSortOCC(Cache::get('occ_data', []), $request);
        return view('user.occ-user', ['occData' => $occData]);
    }

    private function filterAndSortOCC(array $data, Request $request)
    {
        // Search by telda
        if ($request->filled('search')) {
            $search = strtolower($request->get('search'));
            $data = array_filter($data, function ($item) use ($search) {
                return str_contains(strtolower($item['telda']), $search);
            });
        }

        // Filter by type
        if ($request->get('filter') === 'occ') {
            $data = array_filter($data, fn($item) => $item['occ'] > 0);
        } elseif ($request->get('filter') === 'idle') {
            $data = array_filter($data, fn($item) => $item['idle'] > 0);
        }

        // Sort by occ
        if ($request->get('sort') === 'asc') {
            usort($data, fn($a, $b) => $a['occ'] <=> $b['occ']);
        } elseif ($request->get('sort') === 'desc') {
            usort($data, fn($a, $b) => $b['occ'] <=> $a['occ']);
        }

        return $data;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => [
                'required',
                'file',
                function ($attribute, $value, $fail) {
                    $allowedExtensions = ['csv', 'xlsx', 'xls'];
                    $extension = strtolower($value->getClientOriginalExtension());
                    if (!in_array($extension, $allowedExtensions)) {
                        $fail('The ' . $attribute . ' must be a file of type: csv, xlsx, xls.');
                    }
                },
            ],
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/occ', $filename);

        Upload::create([
            'type' => 'occ',
            'file_name' => $filename,
            'file_path' => $path,
        ]);

        Cache::forget('occ_data');

        return redirect()->back()->with('success', 'File berhasil diupload');
    }
}
<?php

namespace App\Jobs;

use App\Models\Upload;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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

        $scriptPath = str_replace('\\', '/', base_path('app/scripts/ExtractOCC.py'));
        $filePath = str_replace('\\', '/', Storage::path($latest->file_path));
        $command = "py \"$scriptPath\" \"$filePath\"";
        $output = shell_exec($command);

        if ($output) {
            $json = json_decode($output, true);
            if (is_array($json)) {
                Cache::put('occ_data', $json, now()->addMinutes(30));
            }
        }
    }
}

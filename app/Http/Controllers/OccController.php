<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessOCCData;
use Illuminate\Support\Facades\Cache;
use App\Models\Upload;

class OccController extends Controller
{
    public function showOCC()
    {
        if (!Cache::has('occ_data')) {
            $latest = Upload::where('type', 'occ')->latest()->first();
            if ($latest) {
                ProcessOccData::dispatch($latest->id);
            }
        }

        $occData = Cache::get('occ_data', []);
        return view('occ', ['occData' => $occData]);
    }

    public function showOCCUser()
    {
        if (!Cache::has('occ_data')) {
            $latest = Upload::where('type', 'occ')->latest()->first();
            if ($latest) {
                ProcessOccData::dispatch($latest->id);
            }
        }

        $occData = Cache::get('occ_data', []);
        return view('user.occ-user', ['occData' => $occData]);
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
                        $fail('The '.$attribute.' must be a file of type: csv, xlsx, xls.');
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

        if (Cache::has('occ_data')) {
            Cache::forget('occ_data');
        }

        return redirect()->back()->with('success', 'File berhasil diupload');
    }
}

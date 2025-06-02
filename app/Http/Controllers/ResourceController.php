<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;

class ResourceController extends Controller
{
    public function showResource()
    {
        return view('resource'); // pastikan folder view dan nama file benar
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
        $path = $file->storeAs('uploads/resource', $filename);

        Upload::create([
            'type' => 'resource',
            'file_name' => $filename,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'File berhasil diupload!');
    }
}

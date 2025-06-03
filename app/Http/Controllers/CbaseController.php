<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CbaseUpload;

class CbaseController extends Controller
{
    public function showCbase()
    {
        return view('customerbase'); // pastikan folder view dan nama file benar
    }

    public function showCbaseUser()
    {
        return view('user.customerbase-user'); // pastikan folder view dan nama file benar
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
            'subcategory' => 'required|in:Local Government,Large Enterprise,State Owned Enterprise',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/cbase/' . $request->subcategory, $filename);

        CbaseUpload::create([
            'subcategory' => $request->subcategory,
            'file_name' => $filename,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'File berhasil diupload');
    }
}

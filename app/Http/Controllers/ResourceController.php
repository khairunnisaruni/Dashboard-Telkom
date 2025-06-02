<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function showResource()
    {
        return view('resource'); // pastikan folder view dan nama file benar
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        $file = $request->file('file');

        // Simpan file di storage/app/uploads
        $path = $file->store('uploads');

        // TODO: Logika parsing file CSV/Excel dan simpan data ke database

        return redirect()->back()->with('success', 'File berhasil diupload!');
    }
}

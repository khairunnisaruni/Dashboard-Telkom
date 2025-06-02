<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OccController extends Controller
{
    public function showOCC()
    {
        return view('occ'); // pastikan folder view dan nama file benar
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

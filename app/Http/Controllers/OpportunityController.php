<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    // Menampilkan halaman opportunity
    public function showOpportunity()
    {
        return view('opportunity'); 
    }

    // Menangani upload file CSV/Excel
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        $file = $request->file('file');

        // Simpan file ke folder storage/app/uploads
        $path = $file->store('uploads');

        // TODO: Tambahkan logika parsing file dan simpan data ke database

        return redirect()->back()->with('success', 'File berhasil diupload!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity; 

class OpportunityController extends Controller
{
    // Menampilkan halaman opportunity dengan data
    public function showOpportunity()
    {
        // Ambil semua data opportunity dari DB, bisa disort atau difilter jika perlu
        $data = Opportunity::orderBy('updated_at', 'desc')->get();

        return view('opportunity', compact('data'));
    }

    // Menampilkan halaman khusus user jika ada
    public function showOpportunityUser()
    {
        return view('user.opportunity-user'); 
    }

    // Simpan data baru dari modal form
    public function modalUpload(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'nilai' => 'required|numeric|min:0',
            'wilayah' => 'required|string|max:255',
        ]);

           // Cek apakah kombinasi kategori & wilayah sudah ada
            $exists = Opportunity::where('kategori', $request->kategori)
                                ->where('wilayah', $request->wilayah)
                                ->exists();

            if ($exists) {
                return back()->withErrors(['duplicate' => 'Data dengan kategori dan wilayah tersebut sudah ada.'])->withInput();
            }

        // Simpan ke database
        Opportunity::create([
            'kategori' => $request->kategori,
            'jumlah' => $request->nilai,
            'wilayah' => $request->wilayah,
            // jika ada field lain seperti sme_name bisa ditambah
        ]);

        return redirect()->back()->with('success', 'Opportunity berhasil ditambahkan!');
    }

    // Update data existing dari modal edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string',
            'wilayah' => 'required|string',
            'nilai_baru' => 'required|numeric',
        ]);

        $exists = Opportunity::where('kategori', $request->kategori)
                            ->where('wilayah', $request->wilayah)
                            ->where('id', '!=', $id) // Hindari id sendiri
                            ->exists();

        if ($exists) {
            return back()->withErrors(['duplicate' => 'Data dengan kategori dan wilayah tersebut sudah ada.'])->withInput();
        }

        $opportunity = Opportunity::findOrFail($id);
        $opportunity->update([
            'kategori' => $request->kategori,
            'wilayah' => $request->wilayah,
            'jumlah' => $request->nilai_baru,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah.');
    }


    // (Optional) Delete method jika ada fungsi hapus
   public function destroy($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

}

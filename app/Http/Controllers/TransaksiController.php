<?php

// app/Http/Controllers/TransaksiController.php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        // Simpan transaksi ke database
        Transaksi::create([
            'id_pegawai' => $request->id_pegawai,
            'jumlah' => $request->jumlah,
            // Tambahkan kolom lain sesuai dengan kebutuhan
        ]);

        return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan');
    }
}

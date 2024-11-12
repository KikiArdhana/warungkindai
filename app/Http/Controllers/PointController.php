<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Poin;
use Illuminate\Http\Request;

class PoinController extends Controller
{
    // Fungsi untuk menambahkan poin ke member
    public function addPoin(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:member,id_pelanggan',
            'jumlah_poin' => 'required|integer|min:1',
        ]);

        // Ambil ID pelanggan dan jumlah poin dari request
        $id_pelanggan = $request->id_pelanggan;
        $jumlah_poin = $request->jumlah_poin;

        // Tambahkan poin baru
        $poin = new Poin();
        $poin->id_pelanggan = $id_pelanggan;
        $poin->jumlah_poin = $jumlah_poin;
        $poin->tanggal_diberikan = now();
        $poin->save();

        // Ambil member dan perbarui level
        $member = Member::find($id_pelanggan);
        $member->updateLevel();

        // Kembalikan respons
        return response()->json(['message' => 'Poin berhasil ditambahkan dan level diperbarui.'], 200);
    }
}

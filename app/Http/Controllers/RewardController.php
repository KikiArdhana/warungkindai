<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function cekReward($no_telepon)
    {
        // Cari member berdasarkan nomor telepon
        $member = Member::where('no_telepon', $no_telepon)
                        ->with('level') // Mengambil level
                        ->first();

        // Cek jika member ditemukan
        if ($member) {
            // Ambil data poin total dari accessor yang sudah ada
            $totalPoin = $member->total_poin;
            $level = $member->level->nama_level; // Ambil nama level dari relasi

            // Kembalikan data ke frontend
            return response()->json([
                'status' => 'success',
                'data' => [
                    'nama_pelanggan' => $member->nama_pelanggan,
                    'no_telepon' => $member->no_telepon,
                    'level' => $level,
                    'total_poin' => $totalPoin
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Member tidak ditemukan!'
            ], 404);
        }
    }
}

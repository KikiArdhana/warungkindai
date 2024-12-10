<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Member extends Model
{
   

    protected $table = 'member';
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'nama_pelanggan',
        'no_telepon',
        'total_poin',
        // Jangan tambahkan 'id_level' ke fillable jika level diatur otomatis
    ];

    // Relasi ke tabel Level
    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }

    public function diskon()
    {
        return $this->belongsTo(Level::class, 'id_promo');
    }


    // Event observer untuk mengatur level berdasarkan total poin
    protected static function booted()
    {
        static::saving(function ($member) {
            $member->id_level = self::determineLevel($member->total_poin);
        });
    }
    

    // Fungsi untuk menentukan level berdasarkan poin
    public static function determineLevel($totalPoin)
    {
        $levels = [
            ['min' => 0, 'max' => 99, 'id' => 1],
            ['min' => 100, 'max' => 199, 'id' => 2],
            ['min' => 200, 'max' => 299, 'id' => 3],
            ['min' => 300, 'max' => 399, 'id' => 4],
            ['min' => 400, 'max' => 499, 'id' => 5],
            ['min' => 500, 'max' => 599, 'id' => 6],
            ['min' => 600, 'max' => 699, 'id' => 7],
            ['min' => 700, 'max' => 799, 'id' => 8],
            ['min' => 800, 'max' => 899, 'id' => 9],
            ['min' => 900, 'max' => 999, 'id' => 10],
        ];

        foreach ($levels as $level) {
            if ($totalPoin >= $level['min'] && $totalPoin <= $level['max']) {
                return $level['id'];
            }
        }

        return null; // Jika tidak ada level yang cocok
    }
}

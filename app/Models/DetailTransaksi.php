<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        'id_transaksi', 'id_item', 'subtotal_harga', 'quantity',
    ];

    // Relasi dengan Transaksi (Many to One)
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    // Relasi dengan Menu (Many to One)
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_item');
    }
}

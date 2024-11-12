<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    public $incrementing = false; // Disable auto-incrementing for composite key

    protected $fillable = [
        'id_transaksi', 'id_item', 'subtotal_harga'
    ];

    // Relationships
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_item');
    }
}

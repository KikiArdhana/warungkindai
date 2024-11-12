<?php

// Model: Poin.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    protected $table = 'poin';
    protected $primaryKey = 'id_poin';

    protected $fillable = ['id_transaksi', 'id_pelanggan', 'jumlah_poin', 'tanggal_diberikan'];
}

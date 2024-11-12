<?php

// Model: Pegawai.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $fillable = ['nama_kasir', 'role'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pegawai');
    }
}

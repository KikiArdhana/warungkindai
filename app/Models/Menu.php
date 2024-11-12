<?php

// Model: Menu.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'id_item';

    protected $fillable = ['nama_item', 'harga', 'kategori'];
}

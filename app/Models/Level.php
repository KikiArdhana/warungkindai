<?php
// Model: Level.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $primaryKey = 'id_level'; // Primary key
    protected $fillable = ['nama_level', 'min_poin', 'max_poin']; // Kolom yang dapat diisi

    // Relasi one-to-one dengan diskon
    public function diskon()
    {
        return $this->hasOne(Diskon::class, 'id_level', 'id_level');
       
    }
}

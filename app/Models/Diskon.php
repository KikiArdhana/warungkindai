<?php
// Model: Diskon.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskon';
    protected $primaryKey = 'id_promo'; // Primary key
    protected $fillable = ['id_level', 'diskon']; // Kolom yang dapat diisi

    // Relasi one-to-one dengan level
    public function level()
{
    return $this->belongsTo(Level::class, 'id_level');
}

}

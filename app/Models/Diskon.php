<?php
// Model: Diskon.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diskon extends Model
{
    protected $table = 'diskon';
    protected $primaryKey = 'id_promo';
    protected $fillable = ['syarat_pembelian', 'diskon', 'nama_promo'];

}


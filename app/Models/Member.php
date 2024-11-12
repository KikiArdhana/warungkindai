<?php
// Model: Member.php
// Model: Member.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = ['nama_pelanggan', 'no_telepon', 'id_level'];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }

    public function poin()
    {
        return $this->hasMany(Poin::class, 'id_pelanggan');
    }

    // Ubah metode ini
    public function getTotalPoinAttribute()
    {
        return $this->poin()->sum('jumlah_poin');
    }
}

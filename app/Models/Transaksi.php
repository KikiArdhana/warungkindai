<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_pegawai',
        'id_pelanggan',
        'tanggal_transaksi',
        'total_pembelian',
        'total_pembelian_akhir',
        'diskon',
        'metode_pembayaran',
        // kolom lain
    ];
    

    // Relasi dengan Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function menu()
{
    return $this->belongsTo(Menu::class, 'id_item', 'id_item');
}


    // Relasi dengan Member
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_pelanggan');
    }

    // Relasi dengan Poin
    public function poin()
    {
        return $this->belongsTo(Poin::class, 'id_poin');
    }

    // Relasi dengan DetailTransaksi (One to Many)
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

    // Menghitung total pembelian dari menu yang dipilih
    public function setTotalPembelianAttribute($value)
    {
        $this->attributes['total_pembelian'] = $value ?: 0;
    }

    // Relasi dengan Menu melalui tabel pivot detail_transaksi
    public function items()
    {
        return $this->belongsToMany(Menu::class, 'detail_transaksi', 'id_transaksi', 'id_item')
                    ->withPivot('subtotal_harga', 'quantity')
                    ->withTimestamps();
    }

    // Otomatis menghitung total pembelian saat transaksi disimpan
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($transaksi) {
            if (isset($transaksi->menu_items)) {
                $total = collect($transaksi->menu_items)->sum(fn($item) => $item['total_pembelian']);
                $transaksi->total_pembelian = $total;
            }
        });
    }

    // Menyimpan detail transaksi setelah transaksi dibuat
    public static function afterCreate($record): void
    {
        $menuItems = request()->input('menu_items');
        foreach ($menuItems as $item) {
            $record->detailTransaksi()->create([
                'id_item' => $item['id_item'],
                'quantity' => $item['quantity'],
                'subtotal_harga' => $item['total_pembelian'], // Sesuaikan dengan kolom yang sesuai
            ]);
        }
    }
}

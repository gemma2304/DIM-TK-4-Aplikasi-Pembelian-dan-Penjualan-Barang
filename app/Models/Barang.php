<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang', 
        'stok', 
        'jumlah_pembelian', 
        'harga_beli', 
        'customer',
        'jumlah_penjualan', 
        'harga_jual',
    ];

    public function penjualan() {
        return $this->hasMany(Penjualan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'nama_customer',
        'total_beli',
        'total_biaya'
    ];

    public function barangs() {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}

<?php

namespace App\Livewire\Barang;

use App\Models\Barang;
use App\Models\Penjualan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function destroy($id)
    {

        // Hapus data
        Barang::destroy($id);

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('index');
    }

    public function render()
    {
        $total_pendapatan = Penjualan::all();
        $barang = Barang::all();

        $total = $total_pendapatan->sum('total_beli') * $total_pendapatan->sum('total_biaya');
        $laba_rugi = ($barang->sum('harga_jual') * $barang->sum('jumlah_penjualan')) - ($barang->sum('harga_beli') * $barang->sum('jumlah_pembelian'));
        if($laba_rugi > 0) {
            $pesan = 'Untung';
        } else if ($laba_rugi == 0) {
            $pesan = 'Normal';
        } else {
            $pesan = 'Rugi';
        }
        return view('livewire.barang.index', [
            'barang' => Barang::latest()->paginate(5),
            'total_pendapatan' => $total,
            'laba_rugi' => $laba_rugi,
            'pesan' => $pesan
        ]);
    }
}

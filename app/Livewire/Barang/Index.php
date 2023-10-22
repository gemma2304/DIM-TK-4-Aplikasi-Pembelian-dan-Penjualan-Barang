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
        $barang = Barang::all();

        $laba_kotor = $barang->sum('jumlah_penjualan') * $barang->sum('harga_jual');

        $laba_rugi = $laba_kotor - ($barang->sum('jumlah_pembelian') * $barang->sum('harga_beli')); 

        if($laba_rugi > 0) {
            $pesan = 'Untung';
        } else if ($laba_rugi == 0) {
            $pesan = 'Normal';
        } else {
            $pesan = 'Rugi';
        }
        return view('livewire.barang.index', [
            'barang' => Barang::latest()->paginate(5),
            'laba_kotor' => $laba_kotor,
            'laba_rugi'=> $laba_rugi,
            'pesan' => $pesan
        ]);
    }
}

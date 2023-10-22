<?php

namespace App\Livewire\Penjualan;

use DB;
use App\Models\Penjualan;
use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Edit extends Component
{
    public $idBarang;
    public $idPenjualan;
    public $nama_barang;
    public $laba_kotor;
    public $harga_jual;

    #[Rule('required', message: 'Masukkan nama Customer!')]
    public $customer;

    #[Rule('required', message: 'Masukkan Jumlah Pembelian!')]
    #[Rule('numeric', message: 'Harus merupakan angka!')]
    public $total_beli;

    public function mount($id) 
    {
        $penjualan = Penjualan::find($id);

        $this->idPenjualan      = $penjualan->id;
        $this->idBarang         = $penjualan->barangs->id;
        $this->nama_barang      = $penjualan->barangs->nama_barang;
        $this->customer         = $penjualan->nama_customer;
        $this->harga_jual       = $penjualan->barangs->harga_jual;
        $this->total_beli       = $penjualan->total_beli;

    }

    public function update()
    {
        $this->validate();

        //Ambil barang dari db
        $penjualan = Penjualan::find($this->idPenjualan);
        
        // update barang
        $penjualan->update([
            'nama_customer'   => $this->customer,
        ]);

        session()->flash('message', 'Data Berhasil Diupdate.');

        return redirect()->route('index.penjualan');
    }

    public function destroy($id)
    {
        DB::transaction(function () {

            Barang::where('id', $this->idBarang)->update([
                'jumlah_penjualan' => DB::raw("jumlah_penjualan-$this->total_beli"), 
                'stok' => DB::raw("stok+$this->total_beli"), 
            ]);

            // Hapus data
            Penjualan::destroy($this->idPenjualan);

        }, 5);
        

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('index');
    }


    public function render()
    {
        $penjualan = Penjualan::find($this->idPenjualan);
        return view('livewire.penjualan.edit', [
            'id_penjualan' => $penjualan
        ]);
    }
}

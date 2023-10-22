<?php

namespace App\Livewire\Barang;

use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Edit extends Component
{

    public $idBarang;

    #[Rule('required', message: 'Masukkan nama barang!')]
    public $nama_barang;

    #[Rule('required', message: 'Masukkan Jumlah Pembelian!')]
    #[Rule('numeric', message: 'Harus merupakan angka!')]
    public $jumlah_pembelian;

    #[Rule('required', message: 'Masukkan Harga Beli!')]
    #[Rule('numeric', message: 'Harus merupakan angka!')]
    public $harga_beli;

    #[Rule('required', message: 'Masukkan nama Customer!')]
    public $customer;

    #[Rule('required', message: 'Masukkan Harga Jual!')]
    #[Rule('numeric', message: 'Harus merupakan angka!')]
    public $harga_jual;

    public function mount($id)
    {
        $barang = Barang::find($id);

        $this->idBarang         = $barang->id;
        $this->nama_barang      = $barang->nama_barang;
        $this->jumlah_pembelian = $barang->jumlah_pembelian;
        $this->harga_beli       = $barang->harga_beli;
        $this->customer         = $barang->customer;
        $this->harga_jual       = $barang->harga_jual;
    }

    public function update()
    {
        $this->validate();

        //Ambil barang dari db
        $barang = Barang::find($this->idBarang);

        // update barang
        $barang->update([
            'nama_barang'       => $this->nama_barang,
            'jumlah_pembelian'  => $this->jumlah_pembelian,
            'stok'              => $this->jumlah_pembelian,
            'harga_beli'        => $this->harga_beli,
            'customer'          => $this->customer,
            'harga_jual'        => $this->harga_jual,
        ]);

        session()->flash('message', 'Data Berhasil Diupdate.');

        return redirect()->route('index');
    }

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
        $barang = Barang::find($this->idBarang);
        return view('livewire.barang.edit', [
            'id_barang' => $barang,
        ]);
    }
}

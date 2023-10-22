<?php

namespace App\Livewire\Barang;

use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\Rule;


class Create extends Component
{

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

    public function store()
    {
        $this->validate();

        Barang::create([
            'nama_barang' => $this->nama_barang,
            'stok' => $this->jumlah_pembelian,
            'jumlah_pembelian' => $this->jumlah_pembelian,
            'harga_beli' => $this->harga_beli,
            'customer' => $this->customer,
            'harga_jual' => $this->harga_jual,
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.barang.create');
    }
}

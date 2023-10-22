<?php

namespace App\Livewire\Penjualan;

use DB;
use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Penjualan;   
use Livewire\Component;
use Livewire\Attributes\Rule;

class Create extends Component
{
    public $idBarang;
    public $nama_barang;
    public $harga_jual;
    public $stok;
    public $laba_kotor;

    #[Rule('required', message: 'Masukkan nama Customer!')]
    public $customer;

    #[Rule('required', message: 'Masukkan Jumlah Pembelian!')]
    #[Rule('numeric', message: 'Harus merupakan angka!')]
    public $total_beli;

    public function mount($id)
    {
        $barang = Barang::find($id);

        $this->idBarang         = $barang->id;
        $this->nama_barang      = $barang->nama_barang;
        $this->harga_jual       = $barang->harga_jual;
        $this->stok             = $barang->stok;
    }

    public function store()
    {
        $this->validate();


        if ($this->total_beli > $this->stok) {
            session()->flash('error', 'Ooopss... tidak bisa memesan!');

            //redirect
            return redirect()->route('index');
        } else {

            $this->laba_kotor = $this->harga_jual * $this->total_beli;

            DB::transaction(function () {

                Barang::where('id', $this->idBarang)->update([
                'jumlah_penjualan'=> DB::raw("jumlah_penjualan+$this->total_beli"),
                'stok' => DB::raw("stok-$this->total_beli"), 
                ]);
    
                Penjualan::create([
                    'barang_id' => $this->idBarang,
                    'nama_customer' => $this->customer,
                    'total_beli' => $this->total_beli,
                    'laba_kotor' => $this->laba_kotor,
                ]);
            }, 5);
    
            session()->flash('message', 'Data Berhasil Disimpan.');
    
            //redirect
            return redirect()->route('index');
        }
        
    }

    public function render()
    {
        return view('livewire.penjualan.create', [
            'nama_barang' => $this->nama_barang,
            'harga_jual' => $this->harga_jual,
            'sisa_barang' => $this->stok,
        ]);
    }
}

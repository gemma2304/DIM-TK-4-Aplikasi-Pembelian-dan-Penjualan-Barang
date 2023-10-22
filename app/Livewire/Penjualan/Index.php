<?php

namespace App\Livewire\Penjualan;

use App\Models\Penjualan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public function render()
    {
        $barang = Penjualan::all();
        return view('livewire.penjualan.index', [
            'penjualans' => Penjualan::latest()->paginate(5)
        ]);
    }
}

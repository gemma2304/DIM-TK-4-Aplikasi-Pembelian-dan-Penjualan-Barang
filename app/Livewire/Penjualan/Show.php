<?php

namespace App\Livewire\Penjualan;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.penjualan.show', [
            'barangs' => Barang::latest()->paginate(5)
        ]);
    }
}

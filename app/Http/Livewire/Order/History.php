<?php

namespace App\Http\Livewire\Order;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Livewire\Component;

class History extends Component
{
    public $data, $item;

    public function mount()
    {
        $this->data = Pemesanan::where('pelanggan_id', \Auth::user()->pelanggan->id)->get();
        $this->item = DetailPemesanan::all();
    }

    public function detail($id)
    {
        return redirect()->route('pesan.detail', $id);
    }

    public function render()
    {
        return view('livewire.order.history');
    }
}

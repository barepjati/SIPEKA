<?php

namespace App\Http\Livewire\Order;

use App\Models\Pemesanan;
use Livewire\Component;

class Index extends Component
{
    /**
     * create function
     */
    public function create()
    {
        return redirect()->route('cart.create');
    }

    /**
     * update function
     */
    public function edit($id)
    {
        return redirect()->route('menu.edit', $id);
    }

    public function detail($id)
    {
        return redirect()->route('menu.edit', [
            'id' => $id,
            'editKategori' => true
        ]);
    }

    public function render()
    {
        return view('livewire.order.index', [
            'transaksi' => Pemesanan::where('user_id', \Auth::user()->id)->latest()->get()
        ]);
    }
}

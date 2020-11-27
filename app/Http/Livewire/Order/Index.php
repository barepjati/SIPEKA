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

    public function detail($id)
    {
        return redirect()->route('cart.detail', $id);
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('pemesanan.index');
    }

    public function render()
    {
        return view('livewire.order.index', [
            'transaksi' => Pemesanan::where('user_id', \Auth::user()->id)->latest()->get()
        ]);
    }
}

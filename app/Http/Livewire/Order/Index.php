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
        return redirect()->route('menu.create');
    }

    /**
     * update function
     */
    public function edit($id)
    {
        return redirect()->route('menu.edit', $id);
    }

    public function editKategori($id)
    {
        return redirect()->route('menu.edit', [
            'id' => $id,
            'editKategori' => true
        ]);
    }

    /**
     * destroy function
     */
    public function destroy($id)
    {
        $menu = Pemesanan::find($id);
        $menu->delete();

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('karyawan.index');
    }

    public function render()
    {
        return view('livewire.order.index', [
            'transaksi' => Pemesanan::where('user_id', \Auth::user()->id)->get()
        ]);
    }
}

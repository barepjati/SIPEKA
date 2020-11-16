<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.menu.index', [
            'menu' => Menu::all()
        ]);
    }

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
        $menu = Menu::find($id);
        $menu->delete();

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('karyawan.index');
    }
}

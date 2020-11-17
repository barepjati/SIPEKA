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
        return redirect()->route('menuResto.create');
    }

    /**
     * update function
     */
    public function edit($id)
    {
        return redirect()->route('menuResto.edit', $id);
    }

    public function editKategori($id)
    {
        return redirect()->route('menuResto.edit', [
            'id' => $id,
            'editKategori' => true
        ]);
    }

    public function tersedia(Menu $menu)
    {
        // $menu = Menu::findOrFail($id);
        // dd($menu->status);
        $menu->update(['status' => 'tersedia']);
        // dd($menu->status);
        session()->flash('message', 'Status ' . $menu->nama . ' Diupdate ke ' . $menu->status);
        return redirect()->route('menuResto.index');
    }

    public function habis(Menu $menu)
    {
        // $menu = Menu::findOrFail($id);
        // dd($menu->status);
        $menu->update(['status' => 'habis']);
        // dd($menu->status);
        session()->flash('message', 'Status ' . $menu->nama . ' Diupdate ke ' . $menu->status);
        return redirect()->route('menuResto.index');
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
        return redirect()->route('menuResto.index');
    }
}

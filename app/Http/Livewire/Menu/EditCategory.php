<?php

namespace App\Http\Livewire\Menu;

use App\Models\Kategori;
use App\Models\Menu;
use Livewire\Component;

class EditCategory extends Component
{
    public $data, $menuId, $nama;
    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $menu = Menu::findOrFail($id);
        $data = Kategori::all();

        $this->menuId   = $menu->id;
        $this->nama     = $menu->nama;
        $this->data     = $data;
    }


    public function render()
    {
        return view('livewire.menu.edit-category');
    }
}

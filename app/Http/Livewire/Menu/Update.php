<?php

namespace App\Http\Livewire\Menu;

use App\Models\Kategori;
use App\Models\Menu;
use Livewire\Component;

class Update extends Component
{
    /**
     * define public variable
     */
    public $menuId, $nama, $harga, $deskripsi, $kategori, $kategoriId, $dataKategori, $data;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $menu = Menu::findOrFail($id);
        $dataKategori = Kategori::all();

        $this->menuId       = $menu->id;
        $this->nama         = $menu->nama;
        $this->harga        = $menu->harga;
        $this->deskripsi    = $menu->deskripsi;
        $this->kategori     = $menu->kategori->nama;
        $this->kategoriId   = $menu->kategori->id;
        $this->dataKategori = $dataKategori;
    }

    /**
     * rules
     */
    protected $rules = [
        'nama'      => 'required|max:255',
        // 'data'      => 'required',
        'harga'     => 'required|numeric|min:0|not_in:0|regex:/^\d+(\.\d{1,2})?$/',
        'deskripsi' => 'required|min:15',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate();
        // dd('masuk');
        $menu = Menu::findOrFail($this->menuId);

        if ($this->data == $this->kategori || $this->data == null) {
            // dd('masuk null');
            $menu->update([
                'nama'      => $this->nama,
                'harga'     => $this->harga,
                'deskripsi' => $this->deskripsi,
            ]);
        } else {
            // dd($this->data == $this->kategori);
            $menu->update([
                'nama'          => $this->nama,
                'harga'         => $this->harga,
                'deskripsi'     => $this->deskripsi,
                'kategori_id'   => $this->data,
            ]);
        }

        //flash message
        session()->flash('message', 'Data ' . $this->nama . ' Berhasil Diupdate.');

        //redirect
        return redirect()->route('menuResto.index');
    }

    public function showIndex()
    {
        // session()->flash('message', 'Data ' . $this->nama . ' Batal Diupdate.');
        return redirect()->route('menuResto.index');
    }

    public function render()
    {
        return view('livewire.menu.update');
    }
}

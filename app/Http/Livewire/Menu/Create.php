<?php

namespace App\Http\Livewire\Menu;

use App\Models\Kategori;
use App\Models\Menu;
use Livewire\Component;

class Create extends Component
{
    public $nama, $deskripsi, $harga;
    public $kategoriId, $kategoriNama, $data;

    public function mount(Kategori $kategori)
    {
        $this->kategoriId = $kategori->id;
        $this->kategoriNama = $kategori->nama;
    }

    protected $rules = [
        'nama'      => 'required|unique:menu|max:255',
        'data'      => 'required',
        'harga'     => 'required|numeric|min:0|not_in:0|regex:/^\d+(\.\d{1,2})?$/',
        'deskripsi' => 'required|min:15',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        $this->validate();

        // dd($this->data);

        Menu::create([
            'nama'          => $this->nama,
            'deskripsi'     => $this->deskripsi,
            'harga'         => $this->harga,
            'kategori_id'   => $this->data,
        ]);

        session()->flash('message', 'Data ' . $this->nama . ' Berhasil Ditambah.');

        return redirect()->route('menuResto.index');
    }

    public function showIndex()
    {
        return redirect()->route('menuResto.index');
    }

    public function render()
    {
        return view('livewire.menu.create', [
            'kategori'  => Kategori::all()
        ]);
    }
}

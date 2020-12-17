<?php

namespace App\Http\Livewire\Table;

use App\Models\Meja;
use Livewire\Component;

class Create extends Component
{
    public $nomor, $harga;

    protected $rules = [
        'nomor' => 'required|unique:meja,no_meja|max:255',
        'harga' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
    ];

    protected $messages = [
        'nomor.required' => 'Field Nomor Meja tidak boleh kosong.',
        'nomor.unique' => 'Nomor Meja Telah digunakan.',
        'harga.required' => 'Field Harga tidak boleh kosong.',
        'harga.numeric' => 'Field Harga hanya format angka.',
        'harga.min' => 'Minimal Harga 0 atau gratis.',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        $this->validate();

        Meja::create([
            'no_meja'   => $this->nomor,
            'harga'     => $this->harga,
        ]);

        session()->flash('message', 'Data Meja Nomor ' . $this->nomor . ' Berhasil Ditambah.');

        return redirect()->route('meja.index');
    }

    public function showIndex()
    {
        return redirect()->route('meja.index');
    }

    public function render()
    {
        return view('livewire.table.create');
    }
}

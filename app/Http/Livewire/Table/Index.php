<?php

namespace App\Http\Livewire\Table;

use App\Models\Meja;
use Livewire\Component;

class Index extends Component
{
    public $meja;

    public function mount()
    {
        $this->meja = Meja::all();
        // dd($this->meja[0]->no_meja);
    }

    public function create()
    {
        return redirect()->route('meja.create');
    }

    public function destroy($id)
    {
        $meja = Meja::find($id);
        $meja->delete();

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('meja.index');
    }

    public function render()
    {
        return view('livewire.table.index');
    }
}

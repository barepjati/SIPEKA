<?php

namespace App\Http\Livewire\Reservasi;

use App\Models\DetailPemesanan;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pemesanan;
use Livewire\Component;

class Index extends Component
{
    public $data, $detail;

    public function mount()
    {
        $this->detail = DetailPemesanan::all();
        if (auth()->user()->role_id == 3) {
            $this->data = Pemesanan::where('pelanggan_id', auth()->user()->role_id == 3)->whereNotNull('meja_id')->get();
        } else {
            $this->data = Pemesanan::whereNotNull('pelanggan_id')->whereNotNull('meja_id')->get();
        }
    }

    public function create()
    {
        return redirect()->route('pelanggan.reservasi.create');
    }

    public function detail($id)
    {
        if (auth()->user()->role_id == 3) {
            return redirect()->route('pelanggan.reservasi.detail', $id);
        } elseif (auth()->user()->role_id == 2) {
            // dd('masuk');
            return redirect()->route('reservasi.detail', $id);
        }
    }

    public function render()
    {
        return view('livewire.reservasi.index')
            ->layout('layouts.myview', [
                'title'     => 'profil',
                'subtitle'  => '',
                'active'    => 'reservasi.index'
            ]);
    }
}

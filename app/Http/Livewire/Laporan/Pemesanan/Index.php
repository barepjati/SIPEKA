<?php

namespace App\Http\Livewire\Laporan\Pemesanan;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.laporan.pemesanan.index', [
            'data' => Pemesanan::latest()->where('status', 'selesai')->get(),
            'detail' => DetailPemesanan::all()
        ]);
    }
}

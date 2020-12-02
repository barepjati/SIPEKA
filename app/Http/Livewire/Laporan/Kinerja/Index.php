<?php

namespace App\Http\Livewire\Laporan\Kinerja;

use App\Models\Karyawan;
use App\Models\Pemesanan;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.laporan.kinerja.index', [
            'karyawan' => Karyawan::all(),
            'pemesanan' => Pemesanan::all()
        ]);
    }
}

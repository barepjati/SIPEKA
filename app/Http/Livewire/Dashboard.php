<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Karyawan;
use App\Models\Manager;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $alternatif, $kriteria, $user, $totalPemesanan;

    public function mount()
    {
        if (Auth::user()->role->nama == 'pelanggan') {
            $this->totalPemesanan = count(Pemesanan::where('status', 'menunggu'));
        } else {
            $this->alternatif = count(Manager::all());
            $this->kriteria = count(Karyawan::all());
            $this->user = count(User::all());
        }
        dd(Auth::user()->role->nama);
    }

    public function render()
    {
        return view('livewire.dashboard')
            ->layout('layouts.myview', [
                'title'     => 'dashboard',
                'subtitle'  => '',
                'active'    => 'dashboard',
            ]);
    }
}

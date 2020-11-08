<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Employee;
use App\Models\Manager;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'alternatif' => count(Manager::all()),
            'kriteria'  => count(Employee::all()),
            'user'      => count(User::all()),
        ])
            ->layout('layouts.myview', [
                'title'     => 'dashboard',
                'subtitle'  => '',
                'active'    => 'dashboard',
            ]);
    }
}

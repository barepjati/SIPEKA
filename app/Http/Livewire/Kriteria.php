<?php

namespace App\Http\Livewire;

use App\Models\Kriteria as ModelsKriteria;
use Livewire\Component;

class Kriteria extends Component
{
    public function render()
    {
        return view('livewire.kriteria', [
            'data'  => ModelsKriteria::all()
        ])
            ->layout('layouts.myview', [
                'title' => 'Kriteria',
                'subtitle' => '',
            ]);
    }
}

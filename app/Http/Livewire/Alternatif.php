<?php

namespace App\Http\Livewire;

use App\Models\Alternatif as ModelsAlternatif;
use Livewire\Component;

class Alternatif extends Component
{
    public function render()
    {
        return view('livewire.alternatif', [
            'data'  => ModelsAlternatif::all()
        ])
            ->layout('layouts.myview', [
                'title' => 'Alternatif',
                'subtitle' => '',
            ]);
    }
}

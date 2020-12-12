<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('pelanggan.profil.index', [
            'title'         => 'profil',
            'subtitle'      => '',
            'active'        => 'profil.index',
        ]);
    }

    public function edit()
    {
        return view('pelanggan.profil.edit', [
            'title'         => 'profil',
            'subtitle'      => 'edit',
            'active'        => 'profil.index',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function __invoke()
    {
        return view('pelanggan.reservasi.index', [
            'title'     => 'reservasi',
            'subtitle'  => '',
            'active'    => 'reservasi'
        ]);
    }

    public function create()
    {
        return view('pelanggan.reservasi.tambah', [
            'title'     => 'reservasi',
            'subtitle'  => 'create',
            'active'    => 'reservasi'
        ]);
    }
}

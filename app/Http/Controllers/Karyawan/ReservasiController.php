<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function __invoke()
    {
        return view('karyawan.reservasi.index', [
            'title'     => 'reservasi',
            'subtitle'  => '',
            'active'    => 'reservasi'
        ]);
    }
}

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

    public function detail($id)
    {
        return view('karyawan.reservasi.detail', [
            'title'     => 'reservasi',
            'subtitle'  => 'detail',
            'active'    => 'reservasi',
            'id'        => $id
        ]);
    }
}

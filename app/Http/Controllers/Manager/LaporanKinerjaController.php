<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanKinerjaController extends Controller
{
    public function index()
    {
        return view('manajer.laporan.kinerja', [
            'title'     => 'Laporan Kinerja',
            'subtitle'  => '',
            'active'    => 'kinerja'
        ]);
    }
}

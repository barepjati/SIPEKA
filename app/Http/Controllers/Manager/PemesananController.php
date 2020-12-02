<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('manajer.laporan.pemesanan', [
            'title'     => 'Laporan Pemesanan',
            'subtitle'  => '',
            'active'    => 'pemesanan'
        ]);
    }
}

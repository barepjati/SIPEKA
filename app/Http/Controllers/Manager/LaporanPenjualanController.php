<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        return view('manajer.laporan.penjualan', [
            'title'     => 'Laporan Penjualan',
            'subtitle'  => '',
            'active'    => 'penjualan'
        ]);
    }
}

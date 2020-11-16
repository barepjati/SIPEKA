<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // $kategori = Kategori::count();

        return view('manajer.dashboard.index', [
            'title'         => 'Dashboard',
            'subtitle'      => '',
            'active'        => 'dashboard',
            // 'kategori'            => $kategori,
            'jmlkaryawan'   => Karyawan::count(),
            'jmlmenu'       => Menu::count(),
            'jmlkategori'   => Kategori::count(),
        ]);
    }
}

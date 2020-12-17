<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function __invoke()
    {
        return view('manajer.meja.index', [
            'title'     => 'meja',
            'subtitle'  => '',
            'active'    => 'meja.index'
        ]);
    }

    public function detail($id)
    {
        dd('in deployment');
        return view('manajer.meja.index', [
            'title'     => 'meja',
            'subtitle'  => 'detail',
            'active'    => 'meja.index',
            'id'        => $id
        ]);
    }

    public function create()
    {
        return view('manajer.meja.tambah', [
            'title'     => 'meja',
            'subtitle'  => 'tambah',
            'active'    => 'meja.index'
        ]);
    }
}

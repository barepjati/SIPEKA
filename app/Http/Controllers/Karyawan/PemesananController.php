<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('karyawan.pemesanan.index', [
            'title'     => 'pemesanan',
            'subtitle'  => '',
            'active'    => 'pemesanan.index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function proses($id)
    {
        $data = Pemesanan::find($id);
        $data->update([
            'status'    => 'diproses',
            'user_id'   => \Auth::user()->id
        ]);
        session()->flash('message', 'Data Pesanan ' . $data->nama .' diproses.');
        return redirect()->back();
        // dd($data);
    }

    public function kirim($id)
    {
        $data = Pemesanan::find($id);
        $data->update([
            'status'    => 'dikirim',
            'user_id'   => \Auth::user()->id
        ]);
        session()->flash('message', 'Data Pesanan ' . $data->nama .' dikirim.');
        return redirect()->back();
        // dd('masuk kirim');
    }
}

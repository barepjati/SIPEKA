<?php

namespace App\Http\Livewire\Order;

use App\Models\Alamat;
use App\Models\DetailPemesanan;
use App\Models\Menu;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Detail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cariMenu, $pemesananId, $no_transaksi, $status, $nama, $total, $cart, $uang, $kembali, $alamat, $ongkir;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $target = Pemesanan::findOrFail($id);
        $cart   = DetailPemesanan::where('transaksi_id', $id)->get();
        // dd($target->alamat);
        if ($target) {
            $this->pemesananId  = $target->id;
            $this->no_transaksi = $target->no_transaksi;
            $this->status       = $target->status;
            $this->nama         = $target->nama;
            $this->total        = $target->total;
            $this->cart         = $cart;
            $this->uang         = 0;
            $this->kembali      = 0;
            if ($target->alamat) {
                $this->alamat       = $target->alamat->alamat;
            }
        }
    }

    protected $rules = [
        // 'ongkir' => 'required|min:2',
        'ongkir' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
    ];

    protected $messages = [
        'ongkir.required' => 'Field Ongkos Kirim tidak boleh kosong.',
        'ongkir.numeric' => 'Field Ongkos Kirim hanya format angka.',
        'ongkir.min'     => 'Minimal Ongkos Kirim 0 atau gratis.'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function back()
    {
        if (Auth::user()->role_id == 3) {
            return redirect()->route('pesan.history');
        } else {
            return redirect()->route('pemesanan.index');
        }
    }

    public function proses($id)
    {
        $data = Pemesanan::find($id);
        $data->update([
            'status'    => 'diproses',
            'user_id'   => \Auth::user()->id
        ]);
        $this->status = $data->status;
        $this->emit('alert', ['type'  => 'success', 'message' =>  'Pesanan diupdate ke diproses.']);
        // return redirect()->back();
    }

    // public function tambahOngkir($id)
    // {

    //     $data = Pemesanan::find($id);
    //     $data->update([
    //         'status'    => 'diproses',
    //         'user_id'   => \Auth::user()->id,
    //         'ongkir'    => $this->ongkir
    //     ]);
    //     $this->status = $data->status;
    //     $this->emit('alert', ['type'  => 'success', 'message' =>  'Ongkir sudah Ditambah.']);
    // }

    public function kirim($id)
    {
        $this->validate();
        if ($this->ongkir) {
            $data = Pemesanan::find($id);
            $data->update([
                'status'    => 'dikirim',
                'user_id'   => \Auth::user()->id,
                'ongkir'    => $this->ongkir,
                'total'     => $this->ongkir + $this->total
            ]);
            $this->status = $data->status;
            $this->emit('alert', ['type'  => 'success', 'message' =>  'Pesanan diupdate ke dikirim.']);
        } else {
            $this->emit('alert', ['type'  => 'error', 'message' =>  'Masukan ongkir.']);
        }
    }

    public function render()
    {
        return view('livewire.order.detail', [
            'menu'  => Menu::where('status', 'tersedia')
                ->where('nama', 'like', '%' . $this->cariMenu . '%')
                ->orWhere('harga', 'like', '%' . $this->cariMenu . '%')
                ->paginate(10),
        ])
            ->layout('layouts.myview', [
                'title'     => 'pemesanan',
                'subtitle'  => 'invoice',
                'active'    => 'pemesanan.index'
            ]);
    }
}

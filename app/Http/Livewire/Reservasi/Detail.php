<?php

namespace App\Http\Livewire\Reservasi;

use App\Models\Alamat;
use App\Models\DetailPemesanan;
use App\Models\Menu;
use App\Models\Pemesanan;
use Livewire\Component;
use Livewire\WithPagination;

class Detail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cariMenu, $pemesananId, $no_transaksi, $status, $nama, $total, $cart, $uang, $kembali, $alamat, $dataMeja, $no_meja, $data, $nomor, $harga_reservasi, $mejaId, $res, $tanggal, $jumlah, $waktu;

    public function mount($id)
    {
        $target = Pemesanan::findOrFail($id);
        $cart   = DetailPemesanan::where('transaksi_id', $id)->get();
        // dd($target->meja);
        if ($target) {
            $this->pemesananId  = $target->id;
            $this->no_transaksi = $target->no_transaksi;
            $this->status       = $target->status;
            $this->nama         = $target->nama;
            $this->total        = $target->total;
            $this->cart         = $cart;
            $this->uang         = 0;
            $this->kembali      = 0;
            $this->mejaId       = $target->meja->id;
            $this->no_meja      = $target->meja->no_meja;
            $this->waktu        = $target->waktu;
            $this->tanggal      = $target->tanggal;
            $this->harga_reservasi = $target->meja->harga;
            // dd($this->status);
            if ($target->alamat) {
                $this->alamat       = $target->alamat->alamat;
            }
        }
        // dd($this->no_meja);
    }

    public function tambahCart($id)
    {
        $menu = Menu::where('id', $id)->first();
        $ada = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('menu_id', $id)
            ->exists();

        if (\Auth::user()->role->id == 3) {
            $this->nama = \Auth::user()->pelanggan->nama;
            if ($this->pemesananId == null) {
                $pemesanan = Pemesanan::create([
                    'nama' => $this->nama,
                    'no_transaksi' => (string) \Str::uuid(),
                    'total' => 0,
                    'status' => 'pending'
                ]);
                $this->pemesananId = $pemesanan->id;
                DetailPemesanan::create([
                    'transaksi_id'  => $pemesanan->id,
                    'menu_id'       => $id,
                    'kuantitas'     => 1,
                    'harga'         => $menu->harga
                ]);
                $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
                $this->total = $this->total + $menu->harga;
                $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $menu->nama . ' Berhasil Ditambah.']);
            } else {
                if ($ada) {
                    $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
                    $this->emit('alert', ['type'  => 'error', 'message' =>  'Data ' . $menu->nama . ' Sudah Ditambahkan.']);
                } else {
                    DetailPemesanan::create([
                        'transaksi_id'  => $this->pemesananId,
                        'menu_id'       => $id,
                        'kuantitas'     => 1,
                        'harga'         => $menu->harga
                    ]);
                    $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
                    $this->total = $this->total + $menu->harga;
                    $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $menu->nama . ' Berhasil Ditambah.']);
                }
            }
        } else {
            if ($this->pemesananId) {
                if ($ada) {
                    $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
                    $this->emit('alert', ['type'  => 'error', 'message' =>  'Data ' . $menu->nama . ' Sudah Ditambahkan.']);
                } else {
                    DetailPemesanan::create([
                        'transaksi_id'  => $this->pemesananId,
                        'menu_id'       => $id,
                        'kuantitas'     => 1,
                        'harga'         => $menu->harga
                    ]);
                    $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
                    $this->total = $this->total + $menu->harga;
                    $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $menu->nama . ' Berhasil Ditambah.']);
                }
            } else {
                $this->emit('alert', ['type'  => 'error', 'message' =>  'Silakan inputkan Nama']);
            }
        }
    }

    public function increment($id)
    {
        $target = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('id', $id)
            ->first();
        $target->update([
            'kuantitas' => $target->kuantitas + 1,
            'harga'     => $target->harga + $target->menu->harga
        ]);
        $this->total = $this->total + $target->menu->harga;
        $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
    }

    public function decrement($id)
    {
        $target = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('id', $id)
            ->first();
        $target->update([
            'kuantitas' => $target->kuantitas - 1,
            'harga'     => $target->harga - $target->menu->harga
        ]);
        $this->total = $this->total - $target->menu->harga;
        $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
    }

    public function batal()
    {
        $target = Pemesanan::findOrFail($this->pemesananId);
        $target->delete();
        session()->flash('message', 'Data Transaksi Dibatalkan.');
        if (\Auth::user()->role_id == 3) {
            return redirect()->route('pelanggan.dashboard');
        } else {
            return redirect()->route('pemesanan.index');
        }
    }

    public function hitung()
    {
        $validatedData = $this->validate(
            ['uang' => 'required|numeric'],
            [
                'uang.required' => 'Field :attribute tidak boleh kosong.',
                'uang.numeric' => 'Field :attribute hanya angka.',
            ],
            ['uang' => 'Input Uang']
        );
        $this->kembali = $this->uang - $this->total;
        if ($this->kembali <  0) {
            $this->kembali = 0;
            $this->reset('uang');
            $this->emit('alert', ['type'  => 'error', 'message' =>  'Uang kurang dari ' . $this->total]);
        }
        Pemesanan::where('id', $this->pemesananId)
            ->update([
                'total' => $this->total
            ]);
    }

    public function cetakStruk()
    {
        // dd(auth()->user()->id);
        if ($this->cart) {
            if (\Auth::user()->role->nama == "pelanggan") {
                if (Alamat::where('user_id', \Auth::user()->id)->first()) {
                    // dd($this->alamat->alamat);
                    Pemesanan::where('id', $this->pemesananId)->update([
                        'status'        => 'pending',
                        'total'         => $this->total,
                        'pelanggan_id'  => \Auth::user()->pelanggan->id,
                        'alamat_id'     => $this->alamat->id,
                    ]);
                    session()->flash('message', 'Pesanan sudah diinputkan harap menunnggu.');
                    return redirect(route('pelanggan.dashboard'));
                } else {
                    $this->emit('alert', ['type'  => 'error', 'message' =>  'Alamat Kosong Silakan tambah Alamat di Menu alamat']);
                }
            } else {
                if ($this->uang) {
                    if ($this->uang >= $this->total) {
                        Pemesanan::where('id', $this->pemesananId)->update([
                            'status'    => 'selesai',
                            'user_id'   => auth()->user()->id,
                        ]);
                        return redirect()->route('struk', [
                            'id' => $this->pemesananId,
                            'uang' => $this->uang
                        ]);
                    } else {
                        $this->emit('alert', ['type'  => 'error', 'message' =>  'Uang kurang dari ' . $this->total]);
                    }
                } else {
                    $this->emit('alert', ['type'  => 'error', 'message' =>  'Input Uang terlebih dahulu.']);
                }
            }
        } else {
            $this->emit('alert', ['type'  => 'error', 'message' =>  'Data Kosong.']);
        }
    }

    public function kembali()
    {
        return redirect()->route('reservasi.index');
    }

    public function render()
    {
        return view('livewire.reservasi.detail', [
            'menu'  => Menu::where('status', 'tersedia')
                ->where('nama', 'like', '%' . $this->cariMenu . '%')
                ->orWhere('harga', 'like', '%' . $this->cariMenu . '%')
                ->paginate(10),
        ]);
    }
}

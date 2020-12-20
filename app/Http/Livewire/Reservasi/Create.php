<?php

namespace App\Http\Livewire\Reservasi;

use App\Models\Alamat;
use App\Models\DetailPemesanan;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Pemesanan;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cariMenu, $pemesananId, $no_transaksi, $status, $nama, $total, $cart, $uang, $kembali, $alamat, $dataMeja, $data, $nomor, $harga_reservasi, $mejaId, $res, $tanggal, $jumlah, $waktu;

    protected $rules = [
        'tanggal'   => 'required|',
        'waktu'     => 'required',
        'jumlah'    => 'required|numeric|min:1|regex:/^\d+(\.\d{1,2})?$/',
    ];

    protected $messages = [
        'tanggal.required' => 'Field tanggal tidak boleh kosong.',
        'tanggal.unique' => 'tanggal Telah digunakan pada Menu yang lain.',
        'jumlah.required' => 'Field jumlah tidak boleh kosong.',
        'jumlah.numeric' => 'Field jumlah hanya format angka.',
        'jumlah.min' => 'Minimal jumlah 0 atau gratis.',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->dataMeja = Meja::all();
        if (\Auth::user()->role_id == 3) {
            $this->alamat = Alamat::where('user_id', \Auth::user()->id)->first();
            $this->nama = auth()->user()->pelanggan->nama;
        } else {
            $this->alamat == null;
        }
    }

    public function tambahMeja()
    {
        // dd($this->tanggal, $this->waktu, $this->jumlah);
        $this->validate();
        if ($this->data) {
            if ($this->tanggal || $this->waktu) {
                $this->nomor = Meja::find($this->data);
                $pemesanan = Pemesanan::create([
                    'nama' => $this->nama,
                    'no_transaksi' => (string) \Str::uuid(),
                    'total' => 0,
                    'user_id' => \Auth::user()->id,
                    'meja_id' => $this->data,
                    'alamat_id' => $this->alamat->id,
                    'pelanggan_id' => auth()->user()->pelanggan->id,
                    'status' => 'diterima',
                    'tanggal'  => $this->tanggal,
                    'waktu' => $this->waktu,
                    'jumlah' => $this->jumlah
                ]);
                $this->pemesananId = $pemesanan->id;
                $this->no_transaksi = $pemesanan->no_transaksi;
                $this->status = $pemesanan->status;
                // $this->namaPemesan = $pemesanan->nama;
                $this->harga_reservasi = $this->nomor->harga;
                $this->total = $pemesanan->total + $this->nomor->harga;
                $this->mejaId = $this->nomor->id;
                $this->res = true;

                $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $this->nama . ' Berhasil Ditambah.']);
            } else {
                $this->emit('alert', ['type'  => 'error', 'message' =>  'Pilih tanggal pemesanan.']);
            }
        } else {
            $this->emit('alert', ['type'  => 'error', 'message' =>  'Nomor Meja atau jumlah orang harap diisi.']);
        }
    }

    public function tambahCart($id)
    {
        $menu = Menu::where('id', $id)->first();
        $ada = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('menu_id', $id)
            ->exists();

        if (\Auth::user()->role->id == 3) {
            $this->nama = \Auth::user()->pelanggan->nama;
            if ($this->res == true) {
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
                $this->emit('alert', ['type'  => 'error', 'message' =>  'Silakan tambah Nomor Meja.']);
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

    public function destroy($id)
    {
        $target = DetailPemesanan::where('transaksi_id', $this->pemesananId)
            ->where('id', $id)
            ->first();
        $target->delete();
        $this->total = $this->total - $target->harga;
        $this->cart = DetailPemesanan::where('transaksi_id', $this->pemesananId)->get();
        $this->emit('alert', ['type'  => 'success', 'message' =>  'Data ' . $target->menu->nama . ' Berhasil dihapus dari daftar pemesanan.']);
    }

    public function cetakStruk()
    {
        if ($this->cart) {
            if (\Auth::user()->role->nama == "pelanggan") {
                if (Alamat::where('user_id', \Auth::user()->id)->first()) {
                    // dd($this->alamat->alamat);
                    if ($this->res == true) {
                        Pemesanan::where('id', $this->pemesananId)->update([
                            'status'        => 'diterima',
                            'total'         => $this->total,
                            'pelanggan_id'  => \Auth::user()->pelanggan->id,
                            'alamat_id'     => $this->alamat->id,
                        ]);
                        session()->flash('message', 'Pesanan sudah diinputkan.');
                    } else {
                        Pemesanan::where('id', $this->pemesananId)->update([
                            'status'        => 'pending',
                            'total'         => $this->total,
                            'pelanggan_id'  => \Auth::user()->pelanggan->id,
                            'alamat_id'     => $this->alamat->id,
                        ]);
                        session()->flash('message', 'Pesanan sudah diinputkan mohon menunggu.');
                    }
                    return redirect(route('pelanggan.dashboard'));
                } else {
                    $this->emit('alert', ['type'  => 'error', 'message' =>  'Alamat Kosong Silakan tambah Alamat di Menu alamat']);
                }
            } else {
                if ($this->uang) {
                    if ($this->uang >= $this->total) {
                        Pemesanan::where('id', $this->pemesananId)->update([
                            'status'    => 'selesai'
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

    public function render()
    {
        return view('livewire.reservasi.create', [
            'menu'  => Menu::where('nama', 'like', '%' . $this->cariMenu . '%')
                ->orWhere('harga', 'like', '%' . $this->cariMenu . '%')
                ->paginate(10),
        ]);
    }
}

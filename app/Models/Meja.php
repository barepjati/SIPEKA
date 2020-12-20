<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';

    protected $fillable = [
        'no_meja',
        'harga',
        'status'
    ];

    public function transaksi()
    {
        return $this->hasMany('App\Models\Pemesanan');
    }
}

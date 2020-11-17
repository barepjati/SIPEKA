<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillabel = [
        'no_transaksi',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

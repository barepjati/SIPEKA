<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->uuid('no_transaksi')->nullable();
            $table->string('status')->default('belum dibayar')->comment('diterima', 'belum dibayar, pending, diproses, dikirim, selesai');
            $table->string('nama');
            $table->string('jumlah')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('meja_id')->nullable()->constrained('meja')->onUpdate('cascade')->onDelete('cascade');
            //Reservasi
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            // khusus Order Online
            $table->foreignId('pelanggan_id')->nullable()->constrained('pelanggan')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('alamat_id')->nullable()->constrained('alamat')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->double('ongkir')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}

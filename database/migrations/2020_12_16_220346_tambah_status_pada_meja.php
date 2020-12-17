<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahStatusPadaMeja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meja', function (Blueprint $table) {
            $table->enum('status', [
                'tersedia',
                'dipesan',
            ])->default('tersedia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meja', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

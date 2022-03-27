<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->mediumText('produk');
            $table->integer('meja_id');
            $table->integer('area_id');
            $table->string('type')->comment('sendiri,couple,keluarga,grup');
            $table->string('jenis_pembayaran')->comment('tunai, non tunai');
            $table->string('nama_bank')->nullable();
            $table->string('nomor_kartu')->nullable();
            $table->string('expiration')->nullable();
            $table->string('cvv')->nullable();
            $table->integer('total');
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
        Schema::dropIfExists('orders');
    }
}

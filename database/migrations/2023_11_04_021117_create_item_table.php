<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('name');
            $table->string('price');
            $table->unsignedBigInteger('user_id'); // Kolom user_id sebagai foreign key
            $table->foreign('user_id')->references('id')->on('users'); // Menghubungkan ke kolom 'id' pada tabel 'users'
            $table->set('categori', ['elektronik', 'food', 'fashion']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};

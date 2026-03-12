<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('fal fa-desktop'); // Menyimpan class FontAwesome
            $table->string('title'); // Judul layanan
            $table->text('description'); // Deskripsi
            $table->string('order_number')->nullable(); // Nomor urut (contoh: 01.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Untuk menyimpan nama file gambar
            $table->string('small_text_top')->nullable(); // Teks kecil di atas (opsional)
            $table->string('big_text'); // Teks besar utama
            $table->text('small_text_bottom')->nullable(); // Teks kecil di bawah (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};

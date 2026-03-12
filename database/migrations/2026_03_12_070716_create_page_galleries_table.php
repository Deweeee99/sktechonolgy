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
        Schema::create('page_galleries', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel pages, jika page dihapus, gallery otomatis terhapus (cascade)
            $table->foreignId('page_id')->constrained()->onDelete('cascade'); 
            $table->string('image'); // Path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_galleries');
    }
};

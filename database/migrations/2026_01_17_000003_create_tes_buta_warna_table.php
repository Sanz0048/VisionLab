<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tes_buta_warna', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->integer('skor');
            $table->string('kategori'); // Normal / Ringan / Sedang / Berat
            $table->dateTime('tanggal_tes');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tes_buta_warna');
    }
};

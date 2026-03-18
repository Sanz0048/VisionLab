<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TesButaWarna extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar Laravel tidak mencari tabel 'tes_buta_warnas'
    protected $table = 'tes_buta_warna';

    // Pastikan menggunakan 'user_id' (sesuai foreign key di migration Anda)
    protected $fillable = ['users_id', 'skor', 'kategori'];

    /**
     * Relasi ke model User
     */
    public function user(): BelongsTo
    {
        // Secara default Laravel mencari kolom 'user_id' di tabel ini
        return $this->belongsTo(User::class, 'users_id');
    }
}

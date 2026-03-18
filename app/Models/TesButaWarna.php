<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class TesButaWarna extends Model
{
    // Hubungkan ke nama tabel yang ada di gambar
    protected $table = 'tes_buta_warna';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'users_id',
        'skor',
        'kategori',
        'tanggal_tes'
    ];

    /**
     * Relasi ke model User
     */
    public function user(): BelongsTo
    {
        // Secara default Laravel mencari kolom 'users_id' di tabel ini
        return $this->belongsTo(User::class, 'users_id');
    }
}

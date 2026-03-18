<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'users_id',
        'skor',
        'kategori',
    ];

    /**
     * Mendapatkan data user yang memiliki hasil tes ini.
     * * Relasi ini sangat penting agar Admin bisa menampilkan 
     * nama user di halaman riwayat.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Boot function untuk logika otomatis (Opsional).
     * Contoh: Mengurutkan hasil tes dari yang terbaru secara global.
     */
    protected static function booted()
    {
        static::addGlobalScope('latest', function ($builder) {
            $builder->latest();
        });
    }
}

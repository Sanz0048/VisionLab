<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarnsworthResult extends Model
{
    protected $table = 'tes_buta_warna'; // nama tabel
    protected $fillable = ['users_id', 'skor', 'kategori'];
}

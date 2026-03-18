<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TesButaWarna;
use Illuminate\Support\Facades\Auth;

class FarnsworthControllerGuest extends Controller
{
    // Ini method yang dicari oleh Route Anda
    public function testguest()
    {
        // Pastikan file view ini ada di: resources/views/farnsworth/test.blade.php
        return view('farnsworth.testguest');
    }

    public function save(Request $request)
    {
        $request->validate([
            'skor' => 'required|integer'
        ]);

        $skor = $request->skor;

        if ($skor <= 15) {
            $kategori = 'Normal';
        } elseif ($skor <= 30) {
            $kategori = 'Ringan';
        } elseif ($skor <= 60) {
            $kategori = 'Sedang';
        } else {
            $kategori = 'Berat';
        }

        // Simpan ke database (users_id di-set NULL untuk guest)
        TesButaWarna::create([
            'users_id' => Auth::check() ? Auth::id() : null,
            'skor' => $skor,
            'kategori' => $kategori,
            'tanggal_tes' => now()->toDateString(),
        ]);

        return response()->json([
            'success' => true,
            'kategori' => $kategori
        ]);
    }
}

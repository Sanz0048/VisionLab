<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TesButaWarna;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class FarnsworthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test()
    {
        return view('farnsworth.test');
    }

    public function save(Request $request)
    {
        try {
            $request->validate([
                'skor' => 'required|integer'
            ]);

            $skor = $request->skor;

            // Logika kategori sesuai keinginan Anda
            if ($skor <= 15) {
                $kategori = 'Normal';
            } elseif ($skor <= 30) {
                $kategori = 'Ringan';
            } elseif ($skor <= 60) {
                $kategori = 'Sedang';
            } else {
                $kategori = 'Berat';
            }

            // Simpan ke tabel tes_buta_warna
            $data = \App\Models\TesButaWarna::create([
                'users_id'    => auth()->id(),
                'skor'        => $skor,
                'kategori'    => $kategori,
                'tanggal_tes' => now()->toDateString(),
            ]);

            return response()->json([
                'success'  => true,
                'kategori' => $kategori,
                'skor'     => $skor
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

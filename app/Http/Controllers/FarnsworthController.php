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

        TesButaWarna::create([
            'users_id' => Auth::id(),
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

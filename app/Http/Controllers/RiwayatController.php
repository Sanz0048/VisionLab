<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarnsworthResult; // Model untuk tabel skor

class RiwayatController extends Controller
{
    public function index()
    {
        $results = FarnsworthResult::orderBy('created_at', 'desc')->get();
        return view('riwayat', compact('results'));
    }
}

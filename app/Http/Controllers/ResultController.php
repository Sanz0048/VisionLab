<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TesButaWarna;

class ResultController extends Controller
{
    /**
     * Menampilkan riwayat tes berdasarkan role.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin: Ambil semua riwayat + data user (eager loading)
            $results = TesButaWarna::with('user')->latest()->get();
        } else {
            // User: Hanya ambil riwayat milik sendiri
            $results = TesButaWarna::where('users_id', $user->id)->latest()->get();
        }

        return view('riwayat', compact('results'));
    }
}

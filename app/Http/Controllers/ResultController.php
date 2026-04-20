<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf; // Pastikan ini di-import
use App\Models\TesButaWarna;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $results = TesButaWarna::with('user')
                ->oldest()
                ->paginate(10);
        } else {
            $results = TesButaWarna::where('users_id', $user->id)
                ->oldest()
                ->paginate(10);
        }

        return view('riwayat', compact('results'));
    }

    public function downloadPDF()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $results = TesButaWarna::join('users', 'tes_buta_warna.users_id', '=', 'users.id')
                ->select('tes_buta_warna.*')
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $results = TesButaWarna::where('users_id', $user->id)
                ->orderBy('created_at', 'asc')
                ->get();
        }

        // Gunakan Facade (ini cara paling aman jika provider sudah terdaftar)
        $pdf = Pdf::loadView('pdf.riwayat', compact('results'));

        return $pdf->download('Rekap_Riwayat_VisionLab.pdf');
    }
}

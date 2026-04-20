<?php

namespace App\Http\Controllers;

// Gunakan class Pdf secara langsung tanpa alias
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TesButaWarna;
use Illuminate\Http\Request;
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

        // Panggil class Pdf secara eksplisit
        $pdf = Pdf::loadView('pdf.riwayat', [
            'results' => $results
        ]);

        return $pdf->download('Rekap_Riwayat_VisionLab.pdf');
    }
}

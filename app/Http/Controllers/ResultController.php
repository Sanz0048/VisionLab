<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TesButaWarna;
use Barryvdh\DomPDF\Facade\Pdf; // Import facade PDF

class ResultController extends Controller
{
    /**
     * Menampilkan riwayat tes berdasarkan role.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Ambil semua, urutkan dari yang terlama (oldest), batasi 10 per halaman
            $results = TesButaWarna::with('user')
                ->oldest()
                ->paginate(10);
        } else {
            // Ambil milik sendiri, urutkan dari yang terlama, batasi 10 per halaman
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
            // Jika admin, ambil semua data dan urutkan berdasarkan nama user melalui join
            $results = TesButaWarna::join('users', 'tes_buta_warna.users_id', '=', 'users.id')
                ->select('tes_buta_warna.*')
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            // Jika user biasa, ambil data miliknya sendiri (nama pasti sama, jadi urutkan berdasarkan tanggal)
            $results = TesButaWarna::where('users_id', $user->id)
                ->orderBy('created_at', 'asc')
                ->get();
        }

        $pdf = Pdf::loadView('pdf.riwayat', compact('results'));
        return $pdf->download('Rekap_Riwayat_VisionLab.pdf');
    }
}

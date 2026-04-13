<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisionController extends Controller
{
    // Method untuk halaman Beranda
    public function index()
    {
        return view('home'); // Pastikan nama file adalah home.blade.php
    }

    // Method untuk halaman Tentang
    public function about()
    {
        return view('tentang'); // Pastikan nama file adalah about.blade.php
    }
    public function help()
    {
        return view('bantuan'); // Pastikan nama file adalah about.blade.php
    }
    public function privacy()
    {
        return view('kebijakanprivasi'); // Pastikan nama file adalah about.blade.php
    }
}

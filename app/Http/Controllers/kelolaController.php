<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class kelolaController extends Controller
{
    public function index()
    {
        // Mengambil semua user yang role-nya BUKAN admin
        $users = User::where('role', '!=', 'admin')->get();

        return view('kelolaakun', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus!');
    }

    // Menampilkan halaman edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('editakun', compact('user'));
    }

    // Memproses perubahan data
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6', // Password boleh kosong
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Hanya update password jika input tidak kosong
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('kelolaakun')->with('success', 'Data akun ' . $user->name . ' berhasil diperbarui!');
    }
}

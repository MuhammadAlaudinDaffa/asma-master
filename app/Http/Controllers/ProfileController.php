<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil pengguna.
     */
    public function show()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Kirim data pengguna ke view
        return view('profile.show', compact('user'));
    }
}
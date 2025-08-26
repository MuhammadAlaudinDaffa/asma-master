<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MahasiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah login dan role-nya adalah 'mahasiswa'
        if (Auth::check() && Auth::user()->role === 'mahasiswa') {
            return $next($request);
        }

        // Jika tidak, arahkan kembali ke dashboard dengan pesan error
        return redirect('/dashboard')->with('error', 'Akses Ditolak. Anda tidak memiliki izin untuk halaman ini.');
    }
}
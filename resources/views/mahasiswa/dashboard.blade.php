@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
    <div class="container mx-auto py-8 px-4 sm:px-0">
        <div class="bg-[var(--card-bg)] rounded-xl shadow-md p-6 md:p-8 mb-6 transition-shadow duration-300">
            <div class="flex items-center space-x-4 mb-4">
                <i class="fas fa-user-circle text-5xl text-[var(--text-muted)]"></i>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-[var(--text-dark)]">Halo, {{ Auth::user()->name }} 👋</h1>
                    <p class="text-sm md:text-base text-[var(--text-muted)]">Selamat datang di dashboard AsMa. Mari sampaikan aspirasi Anda!</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <a href="{{ route('pengaduan.create') }}" class="block bg-[var(--card-bg)] p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 flex-shrink-0 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center text-blue-500 dark:text-blue-400 text-xl">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-[var(--text-dark)]">Buat Pengaduan Baru</h3>
                        <p class="text-sm text-[var(--text-muted)]">Ajukan laporan baru dengan mudah.</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('pengaduan.history') }}" class="block bg-[var(--card-bg)] p-6 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 flex-shrink-0 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center text-green-500 dark:text-green-400 text-xl">
                        <i class="fas fa-history"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-[var(--text-dark)]">Riwayat Pengaduan</h3>
                        <p class="text-sm text-[var(--text-muted)]">Lihat semua status pengaduan Anda.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
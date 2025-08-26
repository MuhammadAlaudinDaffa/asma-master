@extends('layouts.app')
@section('title', 'Profil Saya')
@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">
    <!-- Card Utama -->
    <div class="bg-[var(--card-bg)] rounded-xl shadow-lg p-6 md:p-8 border border-[var(--border-color)]">
        <div class="flex flex-col sm:flex-row items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-[var(--text-dark)]">
                <i class="fas fa-user-circle mr-2 text-[var(--primary-color)]"></i> Profil Saya
            </h1>
            <a href="{{ route('dashboard') }}" class="btn-primary flex items-center space-x-2 mt-4 sm:mt-0">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali ke Dashboard</span>
            </a>
        </div>
        
        @if (auth()->user()->is_admin)
        <p class="text-[var(--text-muted)] mb-6">
            Informasi akun Anda tidak dapat diubah. Jika ada kesalahan, silakan hubungi admin.
        </p>
        @endif

        <div class="space-y-6">
            <!-- Nama Lengkap -->
            <div class="border-b border-[var(--border-color)] pb-4">
                <label class="block text-lg font-medium text-[var(--text-muted)] mb-2">
                    <i class="fas fa-user mr-2 text-[var(--primary-color)]"></i> Nama Lengkap
                </label>
                <p class="text-xl font-semibold text-[var(--text-dark)]">{{ $user->name }}</p>
            </div>
            
            <!-- NIM -->
            <div class="border-b border-[var(--border-color)] pb-4">
                <label class="block text-lg font-medium text-[var(--text-muted)] mb-2">
                    <i class="fas fa-id-badge mr-2 text-green-500 dark:text-green-400"></i> NIM
                </label>
                <p class="text-xl font-semibold text-[var(--text-dark)]">{{ $user->nim }}</p>
            </div>
            
            <!-- Email -->
            <div class="border-b border-[var(--border-color)] pb-4">
                <label class="block text-lg font-medium text-[var(--text-muted)] mb-2">
                    <i class="fas fa-envelope mr-2 text-purple-500 dark:text-purple-400"></i> Email
                </label>
                <p class="text-xl font-semibold text-[var(--text-dark)]">{{ $user->email ?? 'N/A' }}</p>
            </div>
            
            <!-- Role -->
            <div class="pb-4">
                <label class="block text-lg font-medium text-[var(--text-muted)] mb-2">
                    <i class="fas fa-user-tag mr-2 text-indigo-500 dark:text-indigo-400"></i> Role
                </label>
                <p class="text-xl font-semibold text-[var(--text-dark)]">{{ ucfirst($user->role) }}</p>
            </div>
        </div>
        
        <!-- Info Card -->
        <div class="mt-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
            <div class="flex items-start space-x-3">
                <i class="fas fa-info-circle text-[var(--primary-color)] mt-1"></i>
                <div>
                    <h3 class="font-semibold text-[var(--primary-color)] mb-1">Informasi Penting</h3>
                    <p class="text-sm text-[var(--text-muted)]">
                        Data profil Anda dikelola oleh sistem administrasi. Untuk perubahan data, 
                        silakan menghubungi administrator atau bagian akademik.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
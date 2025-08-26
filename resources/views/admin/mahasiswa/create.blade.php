@extends('layouts.app')

@section('title', 'Tambah Mahasiswa Baru')

@section('content')
<div class="max-w-3xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('admin.mahasiswa.index') }}" 
           class="inline-flex items-center text-sm font-medium text-[var(--text-muted)] hover:text-[var(--primary-color)] transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar
        </a>
    </div>

    <div class="bg-[var(--card-bg)] rounded-xl shadow-sm border border-[var(--border-color)] overflow-hidden">
        <div class="px-6 py-5 border-b border-[var(--border-color)]">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-green-100 dark:bg-green-900/20 flex items-center justify-center">
                    <i class="fas fa-user-plus text-green-600 dark:text-green-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h1 class="text-xl font-semibold text-[var(--text-dark)]">Tambah Mahasiswa Baru</h1>
                    <p class="text-sm text-[var(--text-muted)] mt-1">Lengkapi formulir di bawah ini untuk mendaftarkan akun mahasiswa baru</p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.mahasiswa.store') }}" method="POST" class="px-6 py-6">
            @csrf
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-[var(--text-dark)] mb-2">
                        <i class="fas fa-user mr-2 text-blue-500"></i>Nama Lengkap
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}" 
                           required
                           class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--card-bg)] text-[var(--text-dark)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1.5"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div>
                    <label for="nim" class="block text-sm font-medium text-[var(--text-dark)] mb-2">
                        <i class="fas fa-id-card mr-2 text-blue-500"></i>Nomor Induk Mahasiswa (NIM)
                    </label>
                    <input type="text" 
                           name="nim" 
                           id="nim" 
                           value="{{ old('nim') }}" 
                           required
                           class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--card-bg)] text-[var(--text-dark)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
                    @error('nim')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1.5"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-[var(--text-dark)] mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Email (Opsional)
                    </label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--card-bg)] text-[var(--text-dark)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1.5"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-[var(--text-dark)] mb-2">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>Password
                    </label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           required
                           class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--card-bg)] text-[var(--text-dark)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1.5"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[var(--text-dark)] mb-2">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>Konfirmasi Password
                    </label>
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           required
                           class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--card-bg)] text-[var(--text-dark)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1.5"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('admin.mahasiswa.index') }}" 
                   class="px-6 py-3 text-center font-medium text-[var(--text-muted)] bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <button type="submit" 
                        class="btn-primary inline-flex items-center px-6 py-3 text-center font-medium rounded-lg shadow-sm transition duration-300">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Tambah Mahasiswa
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
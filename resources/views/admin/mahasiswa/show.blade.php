@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<div class="max-w-3xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <div class="bg-[var(--card-bg)] rounded-xl shadow-sm border border-[var(--border-color)] overflow-hidden">
        <div class="px-6 py-5 border-b border-[var(--border-color)]">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-12 w-12 rounded-lg bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                    <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h1 class="text-xl font-semibold text-[var(--text-dark)]">Detail Mahasiswa</h1>
                    <p class="text-sm text-[var(--text-muted)] mt-1">Informasi lengkap tentang mahasiswa</p>
                </div>
            </div>
        </div>

        <div class="px-6 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="dark:bg-gray-800/30 rounded-lg p-5">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                            <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-[var(--text-muted)]">Nama Lengkap</h3>
                            <p class="mt-1 text-lg font-semibold text-[var(--text-dark)]">{{ $mahasiswa->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="dark:bg-gray-800/30 rounded-lg p-5">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                            <i class="fas fa-id-card text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-[var(--text-muted)]">NIM</h3>
                            <p class="mt-1 text-lg font-semibold text-[var(--text-dark)]">{{ $mahasiswa->nim }}</p>
                        </div>
                    </div>
                </div>

                <div class="dark:bg-gray-800/30 rounded-lg p-5">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                            <i class="fas fa-envelope text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-[var(--text-muted)]">Email</h3>
                            <p class="mt-1 text-lg font-semibold text-[var(--text-dark)]">{{ $mahasiswa->email ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="dark:bg-gray-800/30 rounded-lg p-5">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                            <i class="fas fa-calendar-plus text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-sm font-medium text-[var(--text-muted)]">Tanggal Dibuat</h3>
                            <p class="mt-1 text-lg font-semibold text-[var(--text-dark)]">{{ $mahasiswa->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('admin.mahasiswa.edit', $mahasiswa) }}" 
                   class="btn-primary inline-flex items-center px-6 py-3 text-center font-medium rounded-lg shadow-sm transition duration-300">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Mahasiswa
                </a>
                <a href="{{ route('admin.mahasiswa.index') }}" 
                   class="px-6 py-3 text-center font-medium text-[var(--text-muted)] bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
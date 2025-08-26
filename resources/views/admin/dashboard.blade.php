@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-0">
    <div class="bg-[var(--card-bg)] rounded-xl shadow-md p-6 md:p-8 mb-6 transition-shadow duration-300">
        <div class="flex items-center space-x-4 mb-4">
            <i class="fas fa-user-cog text-4xl md:text-5xl text-[var(--text-muted)]"></i>
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-[var(--text-dark)]">Dashboard Admin</h1>
                <p class="text-sm md:text-base text-[var(--text-muted)]">Ringkasan statistik dan manajemen pengaduan.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-[var(--card-bg)] p-6 rounded-xl shadow-md flex items-center justify-between transition-shadow duration-300">
            <div>
                <h3 class="text-sm font-medium text-[var(--text-muted)] uppercase">Total Pengaduan</h3>
                <p class="mt-1 text-3xl font-bold text-[var(--text-dark)]">{{ \App\Models\Pengaduan::count() }}</p>
            </div>
            <div class="text-4xl text-[var(--primary-color)]">
                <i class="fas fa-inbox"></i>
            </div>
        </div>
        <div class="bg-[var(--card-bg)] p-6 rounded-xl shadow-md flex items-center justify-between transition-shadow duration-300">
            <div>
                <h3 class="text-sm font-medium text-[var(--text-muted)] uppercase">Pengaduan Baru</h3>
                <p class="mt-1 text-3xl font-bold text-[var(--text-dark)]">{{ \App\Models\Pengaduan::where('status', 'dikirim')->count() }}</p>
            </div>
            <div class="text-4xl text-yellow-500">
                <i class="fas fa-clock"></i>
            </div>
        </div>
        <div class="bg-[var(--card-bg)] p-6 rounded-xl shadow-md flex items-center justify-between transition-shadow duration-300">
            <div>
                <h3 class="text-sm font-medium text-[var(--text-muted)] uppercase">Sedang Diproses</h3>
                <p class="mt-1 text-3xl font-bold text-[var(--text-dark)]">{{ \App\Models\Pengaduan::where('status', 'diproses')->count() }}</p>
            </div>
            <div class="text-4xl text-blue-500">
                <i class="fas fa-sync-alt"></i>
            </div>
        </div>
        <div class="bg-[var(--card-bg)] p-6 rounded-xl shadow-md flex items-center justify-between transition-shadow duration-300">
            <div>
                <h3 class="text-sm font-medium text-[var(--text-muted)] uppercase">Pengaduan Selesai</h3>
                <p class="mt-1 text-3xl font-bold text-[var(--text-dark)]">{{ \App\Models\Pengaduan::where('status', 'selesai')->count() }}</p>
            </div>
            <div class="text-4xl text-green-500">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>

    <div class="bg-[var(--card-bg)] rounded-xl shadow-md p-6 md:p-8 transition-shadow duration-300">
        <h2 class="text-2xl font-bold mb-4 text-[var(--text-dark)]">Pengaduan Terbaru</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[var(--border-color)]">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nomor Tiket</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-[var(--card-bg)] divide-y divide-[var(--border-color)]">
                    @foreach(\App\Models\Pengaduan::latest()->limit(5)->get() as $pengaduan)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-dark)]">{{ $pengaduan->nomor_tiket }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-muted)]">{{ $pengaduan->kategori }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($pengaduan->status == 'dikirim') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 @endif">
                                {{ ucfirst($pengaduan->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-200">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
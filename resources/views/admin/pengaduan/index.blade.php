@extends('layouts.app')

@section('title', 'Manajemen Pengaduan')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-0">
    <div class="bg-[var(--card-bg)] rounded-xl shadow-md p-6 md:p-8 transition-shadow duration-300">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
            <h1 class="text-2xl md:text-3xl font-bold text-[var(--text-dark)]">Daftar Pengaduan</h1>
            <div class="flex items-center space-x-2 w-full sm:w-auto">
                <form action="{{ route('admin.pengaduan.index') }}" method="GET" class="flex w-full sm:w-auto">
                    <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}"
                           class="w-full p-2 rounded-l-lg border border-[var(--border-color)] bg-[var(--bg-primary)] text-[var(--text-dark)] focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-r-lg hover:bg-blue-600 transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 space-y-4 sm:space-y-0">
            <form action="{{ route('admin.pengaduan.index') }}" method="GET" class="w-full sm:w-auto flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                <select name="status" class="block w-full p-2 rounded-lg border border-[var(--border-color)] bg-[var(--bg-primary)] text-[var(--text-dark)] focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Status</option>
                    <option value="dikirim" {{ request('status') == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                    <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <select name="kategori" class="block w-full p-2 rounded-lg border border-[var(--border-color)] bg-[var(--bg-primary)] text-[var(--text-dark)] focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Kategori</option>
                    <option value="Fasilitas Umum" {{ request('kategori') == 'Fasilitas Umum' ? 'selected' : '' }}>Fasilitas Umum</option>
                    <option value="Kebersihan" {{ request('kategori') == 'Kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                    <option value="Administrasi" {{ request('kategori') == 'Administrasi' ? 'selected' : '' }}>Administrasi</option>
                    <option value="Dosen & Akademik" {{ request('kategori') == 'Dosen & Akademik' ? 'selected' : '' }}>Dosen & Akademik</option>
                    <option value="Lain-lain" {{ request('kategori') == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                </select>
                <button type="submit" class="bg-[var(--bg-primary)] dark:bg-gray-700 p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition border border-[var(--border-color)]">
                    <i class="fas fa-filter text-[var(--text-dark)]"></i>
                </button>
            </form>
        </div>
        
        @if($pengaduans->isEmpty())
            <div class="bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 p-4 rounded-lg text-center">
                <p>Tidak ada pengaduan ditemukan.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[var(--border-color)]">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">
                                Nomor Tiket
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">
                                Pelapor
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">
                                Kategori
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-[var(--card-bg)] divide-y divide-[var(--border-color)]">
                        @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-dark)]">{{ $pengaduan->nomor_tiket }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-muted)]">{{ $pengaduan->user->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-muted)]">{{ $pengaduan->kategori }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if($pengaduan->status == 'dikirim') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                        @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                        @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 @endif">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-muted)]">{{ $pengaduan->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-200">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $pengaduans->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
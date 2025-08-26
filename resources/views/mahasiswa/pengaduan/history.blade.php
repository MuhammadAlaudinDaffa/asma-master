@extends('layouts.app')

@section('title', 'Riwayat Pengaduan')

@section('content')
    <div class="container mx-auto py-8 px-4 sm:px-0">
        <div class="bg-[var(--card-bg)] rounded-xl shadow-md p-6 md:p-8 transition-shadow duration-300">
            <div class="flex items-center space-x-4 mb-6">
                <i class="fas fa-history text-4xl text-[var(--primary-color)]"></i>
                <h1 class="text-2xl md:text-3xl font-bold text-[var(--text-dark)]">Riwayat Pengaduan Anda</h1>
            </div>
            <p class="text-[var(--text-muted)] mb-6">
                Berikut adalah daftar pengaduan yang telah Anda kirim. Anda dapat memantau statusnya di sini.
            </p>

            @if ($pengaduans->isEmpty())
                <div class="bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 p-4 rounded-lg text-center">
                    <p>Anda belum memiliki riwayat pengaduan.</p>
                    <a href="{{ route('pengaduan.create') }}"
                        class="font-semibold text-blue-700 dark:text-blue-200 hover:underline mt-2 inline-block">
                        Buat pengaduan pertama Anda sekarang!
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[var(--border-color)]">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nomor Tiket
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Judul
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Prioritas
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-[var(--card-bg)] divide-y divide-[var(--border-color)]">
                            @foreach ($pengaduans as $pengaduan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--text-dark)]">
                                        {{ $pengaduan->nomor_tiket }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-muted)]">
                                        {{ $pengaduan->judul }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-muted)]">
                                        {{ $pengaduan->kategori }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span
                                            class="font-bold @if ($pengaduan->prioritas == 'Tinggi') text-red-500 @elseif($pengaduan->prioritas == 'Sedang') text-yellow-500 @else text-blue-500 @endif">
                                            {{ ucfirst($pengaduan->prioritas) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        @if ($pengaduan->status == 'dikirim') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                        @elseif($pengaduan->status == 'diproses')
                                            bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                        @else
                                            bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 @endif">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-muted)]">
                                        {{ $pengaduan->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('pengaduan.show', $pengaduan->id) }}"
                                            class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-200">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
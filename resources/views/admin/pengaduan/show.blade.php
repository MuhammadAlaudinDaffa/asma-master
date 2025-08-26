@extends('layouts.app')

@section('title', 'Detail Pengaduan')

@section('content')
    <div class="container mx-auto py-8 px-4 sm:px-0">
        <div class="bg-[var(--card-bg)] rounded-xl shadow-md p-6 md:p-8 transition-shadow duration-300">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 space-y-4 sm:space-y-0">
                <h1 class="text-2xl md:text-3xl font-bold text-[var(--text-dark)]">Detail Pengaduan
                    #{{ $pengaduan->nomor_tiket }}</h1>
                <a href="{{ route('admin.pengaduan.index') }}" class="btn-primary flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="bg-[var(--bg-primary)] p-4 rounded-lg border border-[var(--border-color)]">
                        <h3 class="font-semibold text-lg mb-2 text-[var(--text-dark)]">Informasi Pengaduan</h3>
                        <div class="space-y-2 text-sm text-[var(--text-muted)]">
                            <p><strong>Judul:</strong> {{ $pengaduan->judul }}</p>
                            @if ($pengaduan->anonim == 0)
                                <p><strong>Pelapor:</strong> {{ $pengaduan->user->name ?? 'N/A' }}</p>
                                <p><strong>NIM:</strong> {{ $pengaduan->user->nim ?? 'N/A' }}</p>
                            @endif
                            <p><strong>Kategori:</strong> {{ $pengaduan->kategori }}</p>
                            <p><strong>Prioritas:</strong>
                                <span
                                    class="font-bold @if ($pengaduan->prioritas == 'Tinggi') text-red-500 @elseif($pengaduan->prioritas == 'Sedang') text-yellow-500 @else text-blue-500 @endif">
                                    {{ ucfirst($pengaduan->prioritas) }}
                                </span>
                            </p>
                            <p><strong>Tanggal Pengaduan:</strong> {{ $pengaduan->created_at->format('d F Y, H:i') }}</p>
                            <p><strong>Status:</strong>
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if ($pengaduan->status == 'dikirim') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                    @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                    @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 @endif">
                                    {{ ucfirst($pengaduan->status) }}
                                </span>
                            </p>
                            <p><strong>Status Anonim:</strong> {{ $pengaduan->anonim ? 'Ya' : 'Tidak' }}</p>
                        </div>
                    </div>
                    <div class="bg-[var(--bg-primary)] p-4 rounded-lg border border-[var(--border-color)]">
                        <h3 class="font-semibold text-lg mb-2 text-[var(--text-dark)]">Deskripsi</h3>
                        <p class="text-[var(--text-muted)]">{{ $pengaduan->deskripsi }}</p>
                    </div>
                    @if ($pengaduan->bukti)
                        <div class="bg-[var(--bg-primary)] p-4 rounded-lg border border-[var(--border-color)]">
                            <h3 class="font-semibold text-lg mb-2 text-[var(--text-dark)]">Bukti</h3>
                            @php
                                $relPath = preg_replace('/^public\//', '', $pengaduan->bukti ?? '');
                                $ext = strtolower(pathinfo($relPath, PATHINFO_EXTENSION));
                                $exists = $relPath && Storage::disk('public')->exists($relPath);
                                $url = $exists ? asset('storage/' . $relPath) : null;
                            @endphp

                            @if ($url)
                                @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                    <a href="{{ $url }}" target="_blank" class="block">
                                        <img src="{{ $url }}" alt="Bukti Pengaduan"
                                            class="w-full h-auto rounded-lg shadow-md mt-2">
                                    </a>
                                @elseif($ext === 'pdf')
                                    <a href="{{ $url }}" target="_blank"
                                        class="text-blue-500 hover:underline flex items-center space-x-2 mt-2">
                                        <i class="fas fa-file-pdf"></i>
                                        <span>Lihat Bukti (PDF)</span>
                                    </a>
                                @else
                                    <a href="{{ $url }}" target="_blank"
                                        class="text-blue-500 hover:underline flex items-center space-x-2 mt-2">
                                        <i class="fas fa-file-alt"></i>
                                        <span>Download Bukti</span>
                                    </a>
                                @endif
                            @else
                                <p class="text-gray-500">Bukti tidak ditemukan</p>
                            @endif
                        </div>
                    @endif

                    @if ($pengaduan->rating)
                        <div class="bg-[var(--bg-primary)] p-4 rounded-lg border border-[var(--border-color)]">
                            <h3 class="font-semibold text-lg mb-2 text-[var(--text-dark)]">Feedback Mahasiswa</h3>
                            <div class="flex items-center space-x-1 text-yellow-500 text-xl">
                                @for ($i = 0; $i < $pengaduan->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                <span class="ml-2 text-sm text-[var(--text-muted)]">{{ $pengaduan->rating }} dari 5</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="bg-[var(--card-bg)] p-6 md:p-8 rounded-xl shadow-md h-full flex flex-col justify-center">
                    <h3 class="font-semibold text-xl mb-4 text-[var(--text-dark)]">Ubah Status Pengaduan</h3>
                    <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-semibold text-[var(--text-dark)] mb-2">Status
                                Saat
                                Ini</label>
                            <span
                                class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full
                                @if ($pengaduan->status == 'dikirim') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300
                                @elseif($pengaduan->status == 'diproses') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 @endif">
                                {{ ucfirst($pengaduan->status) }}
                            </span>
                        </div>

                        <div class="mb-6">
                            <label for="new_status" class="block text-sm font-semibold text-[var(--text-dark)] mb-2">Ubah
                                Status Menjadi</label>
                            <select name="status" id="new_status" required
                                class="w-full p-3 rounded-lg border border-[var(--border-color)] bg-[var(--bg-primary)] text-[var(--text-dark)] focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="dikirim" {{ $pengaduan->status == 'dikirim' ? 'selected' : '' }}>Dikirim
                                </option>
                                <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses
                                </option>
                                <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                            @error('status')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full btn-primary">
                            <i class="fas fa-sync-alt mr-2"></i> Perbarui Status
                        </button>
                    </form>
                </div>
            </div>

            {{-- Bagian Riwayat Status BARU --}}
            <div class="mt-8 bg-[var(--bg-primary)] p-6 md:p-8 rounded-xl border border-[var(--border-color)]">
                <h2 class="text-xl md:text-2xl font-bold text-[var(--text-dark)] mb-6">Riwayat Status</h2>
                <div class="relative pl-6">
                    {{-- Garis Timeline --}}
                    <div class="absolute left-0 top-0 h-full w-1 bg-[var(--border-color)]"></div>

                    @foreach ($pengaduan->statusLogs->sortBy('created_at') as $log)
                        <div class="mb-8 relative last:mb-0">
                            {{-- Lingkaran Ikon Status --}}
                            <div
                                class="absolute -left-6 top-0 flex items-center justify-center w-6 h-6 rounded-full bg-[var(--bg-primary)] border border-[var(--border-color)] z-10">
                                @if ($log->new_status == 'dikirim')
                                    <i class="fas fa-paper-plane text-yellow-500"></i>
                                @elseif($log->new_status == 'diproses')
                                    <i class="fas fa-spinner text-blue-500 animate-spin"></i>
                                @elseif($log->new_status == 'selesai')
                                    <i class="fas fa-check-circle text-green-500"></i>
                                @endif
                            </div>

                            <div class="ml-4 space-y-1">
                                <p class="text-sm font-semibold text-[var(--text-dark)]">
                                    Status diubah menjadi <span
                                        class="font-bold text-[var(--text-accent)]">{{ ucfirst($log->new_status) }}</span>
                                </p>
                                <p class="text-xs text-[var(--text-muted)]">
                                    @if ($log->user)
                                        Oleh: {{ $log->user->is_admin ? 'Admin ' . $log->user->name : $log->user->name }}
                                    @else
                                        Oleh: Pengguna Dihapus
                                    @endif
                                </p>
                                <p class="text-xs text-[var(--text-muted)]">{{ $log->created_at->format('d F Y, H:i') }}
                                </p>
                                @if ($log->catatan)
                                    <p class="text-sm italic text-[var(--text-dark)] mt-2">
                                        Catatan: "{{ $log->catatan }}"
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Bagian Komentar BARU --}}
            <div class="mt-8 bg-[var(--bg-primary)] p-6 md:p-8 rounded-xl border border-[var(--border-color)]">
                <h2 class="text-xl md:text-2xl font-bold text-[var(--text-dark)] mb-6">Diskusi</h2>

                {{-- Formulir Komentar (Selalu tampil untuk admin) --}}
                <form action="{{ route('admin.pengaduan.addComment', $pengaduan->id) }}" method="POST" class="mb-8">
                    @csrf
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-semibold text-[var(--text-dark)] mb-2">Tulis
                            Komentar
                            Admin</label>
                        <textarea name="comment" id="comment" rows="4" required
                            class="w-full p-3 rounded-lg border border-[var(--border-color)] bg-[var(--bg-primary)] text-[var(--text-dark)] focus:outline-none focus:ring-2 focus:ring-blue-500 @error('comment') border-red-500 @enderror"
                            placeholder="Ketik komentar Anda di sini..."></textarea>
                        @error('comment')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i> Kirim Komentar
                    </button>
                </form>

                {{-- Daftar Komentar --}}
                @forelse($pengaduan->comments->sortBy('created_at') as $comment)
                    <div class="bg-[var(--card-bg)] p-4 rounded-lg shadow-sm border border-[var(--border-color)] mb-4">
                        <div class="flex items-center space-x-3 mb-2">
                            {{-- Asumsikan user memiliki atribut 'is_admin' --}}
                            @if ($comment->user && $comment->user->is_admin)
                                <i class="fas fa-user-shield text-blue-500"></i>
                                <p class="font-bold text-[var(--text-dark)]">Admin {{ $comment->user->name }}</p>
                            @elseif($comment->user)
                                <i class="fas fa-user text-gray-500"></i>
                                <p class="font-bold text-[var(--text-dark)]">{{ $comment->user->name }}</p>
                            @else
                                <p class="font-bold text-[var(--text-dark)]">Pengguna Tidak Dikenal</p>
                            @endif
                        </div>
                        <p class="text-[var(--text-muted)] mt-2">{{ $comment->comment }}</p>
                        <span
                            class="text-xs text-[var(--text-muted)] mt-2 block">{{ $comment->created_at->format('d F Y, H:i') }}</span>
                    </div>
                @empty
                    <p class="text-[var(--text-muted)] text-center">Belum ada komentar untuk pengaduan ini.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

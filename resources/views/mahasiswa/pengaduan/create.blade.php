@extends('layouts.app')

@section('title', 'Buat Pengaduan')

@section('content')
    <div class="container mx-auto py-8 px-4 sm:px-0">
        <div class="bg-[var(--card-bg)] rounded-xl shadow-md p-6 md:p-8 transition-shadow duration-300">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 space-y-4 sm:space-y-0">
                <h1 class="text-2xl md:text-3xl font-bold text-[var(--text-dark)]">Ajukan Pengaduan Baru</h1>
                <a href="{{ route('pengaduan.history') }}" class="btn-primary flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i>
                    <span>Riwayat Pengaduan</span>
                </a>
            </div>
            <p class="text-[var(--text-muted)] mb-6">
                Isi form berikut untuk mengajukan pengaduan atau aspirasi Anda
            </p>

            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Kolom kiri --}}
                    <div class="space-y-6">

                        {{-- Judul Pengaduan --}}
                        <div>
                            <label for="judul" class="block text-sm font-medium text-[var(--text-dark)] mb-2">Judul
                                Pengaduan *</label>
                            <input type="text" id="judul" name="judul" required
                                class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--bg-primary)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                placeholder="Masukkan judul pengaduan" value="{{ old('judul') }}">
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kategori Pengaduan --}}
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-[var(--text-dark)] mb-2">Kategori
                                *</label>
                            <select id="kategori" name="kategori" required
                                class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--bg-primary)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
                                <option value="">Pilih kategori</option>
                                <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik
                                </option>
                                <option value="Fasilitas" {{ old('kategori') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas
                                </option>
                                <option value="Administrasi" {{ old('kategori') == 'Administrasi' ? 'selected' : '' }}>
                                    Administrasi</option>
                                <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan
                                </option>
                                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                            @error('kategori')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Prioritas Pengaduan --}}
                        <div>
                            <label class="block text-sm font-medium text-[var(--text-dark)] mb-2">Prioritas *</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="prioritas" value="Rendah" class="form-radio text-blue-500"
                                        {{ old('prioritas', 'Sedang') == 'Rendah' ? 'checked' : '' }}>
                                    <span class="ml-2 text-[var(--text-dark)]">Rendah</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="prioritas" value="Sedang" class="form-radio text-blue-500"
                                        {{ old('prioritas', 'Sedang') == 'Sedang' ? 'checked' : '' }}>
                                    <span class="ml-2 text-[var(--text-dark)]">Sedang</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="prioritas" value="Tinggi" class="form-radio text-blue-500"
                                        {{ old('prioritas') == 'Tinggi' ? 'checked' : '' }}>
                                    <span class="ml-2 text-[var(--text-dark)]">Tinggi</span>
                                </label>
                            </div>
                            @error('prioritas')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Kolom kanan --}}
                    <div class="space-y-6">

                        {{-- Lampiran --}}
                        <div>
                            <label for="lampiran" class="block text-sm font-medium text-[var(--text-dark)] mb-2">
                                Lampiran (Opsional)
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="lampiran"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-[var(--border-color)] border-dashed rounded-lg cursor-pointer bg-[var(--bg-primary)] hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200">
                                    <div id="preview-area"
                                        class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                        <i class="fas fa-cloud-upload-alt text-3xl text-[var(--text-muted)] mb-2"></i>
                                        <p class="mb-2 text-sm text-[var(--text-muted)]">
                                            <span class="font-semibold">Klik untuk upload</span> atau drag & drop
                                        </p>
                                        <p class="text-xs text-[var(--text-muted)]">
                                            PNG, JPG, JPEG, PDF (Maks. 2MB)
                                        </p>
                                    </div>
                                    <input id="lampiran" name="lampiran" type="file" class="hidden"
                                        accept=".png,.jpg,.jpeg,.pdf" />
                                </label>
                            </div>
                            @error('lampiran')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Pengaduan anonim --}}
                        <div class="flex items-center">

                            <input type="checkbox" name="anonim" value="1" {{ old('anonim') ? 'checked' : '' }}>
                            <label for="anonim" class="ml-2 block text-sm text-[var(--text-dark)]">
                                Kirim sebagai anonim (nama Anda tidak akan ditampilkan)
                            </label>
                            @error('anonim')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Deskripsi Pengaduan --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-[var(--text-dark)] mb-2">Deskripsi
                        Pengaduan *</label>
                    <textarea id="deskripsi" name="deskripsi" rows="6" required
                        class="w-full px-4 py-3 rounded-lg border border-[var(--border-color)] bg-[var(--bg-primary)] focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                        placeholder="Jelaskan pengaduan Anda secara detail">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit form --}}
                <div class="flex justify-end">
                    <button type="submit" class="btn-primary flex items-center space-x-2">
                        <i class="fas fa-paper-plane"></i>
                        <span>Kirim Pengaduan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('lampiran');
            const previewArea = document.getElementById('preview-area');
            const originalPreviewHTML = previewArea.innerHTML;

            fileInput.addEventListener('change', function(e) {
                const file = e.target.files[0];

                if (file) {
                    previewArea.innerHTML = `
                        <i class="fas fa-file-alt text-3xl text-green-500 mb-2"></i>
                        <p class="text-sm font-medium text-[var(--text-dark)]">${file.name}</p>
                        <p class="text-xs text-[var(--text-muted)]">Klik untuk mengubah file</p>
                    `;
                } else {
                    previewArea.innerHTML = originalPreviewHTML;
                }
            });
        });
    </script>
@endsection

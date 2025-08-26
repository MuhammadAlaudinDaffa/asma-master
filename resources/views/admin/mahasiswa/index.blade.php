@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[var(--text-dark)]">Daftar Mahasiswa</h1>
            <p class="text-sm text-[var(--text-muted)] mt-1">Kelola data mahasiswa sistem</p>
        </div>
        <a href="{{ route('admin.mahasiswa.create') }}" 
           class="btn-primary inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg shadow-sm">
            <i class="fas fa-plus-circle mr-2"></i>
            Tambah Mahasiswa
        </a>
    </div>

    <div class="bg-[var(--card-bg)] rounded-xl shadow-sm border border-[var(--border-color)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[var(--border-color)]">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">NIM</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-[var(--text-muted)] uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--border-color)]">
                    @forelse ($mahasiswas as $mahasiswa)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-dark)]">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                                        <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-[var(--text-dark)]">{{ $mahasiswa->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-dark)]">{{ $mahasiswa->nim }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--text-dark)]">{{ $mahasiswa->email ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.mahasiswa.show', $mahasiswa) }}" 
                                       class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 p-2 rounded-lg hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors"
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.mahasiswa.edit', $mahasiswa) }}" 
                                       class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300 p-2 rounded-lg hover:bg-yellow-50 dark:hover:bg-yellow-900/20 transition-colors"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.mahasiswa.destroy', $mahasiswa) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <i class="fas fa-users text-4xl text-gray-300 dark:text-gray-600 mb-4"></i>
                                <p class="text-gray-500 dark:text-gray-400">Belum ada data mahasiswa</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($mahasiswas->hasPages())
            <div class="px-6 py-4 border-t border-[var(--border-color)] bg-gray-50 dark:bg-gray-800/50">
                {{ $mahasiswas->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
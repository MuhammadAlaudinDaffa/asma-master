<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    // Tampilkan formulir tambah mahasiswa
    public function createMahasiswa()
    {
        return view('admin.mahasiswa.create');
    }

    // Simpan mahasiswa baru
    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:users|max:255',
            'email' => 'nullable|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Akun mahasiswa berhasil ditambahkan.');
    }

    // Tampilkan daftar semua mahasiswa
    public function indexMahasiswa()
    {
        $mahasiswas = User::where('role', 'mahasiswa')->paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    // Tampilkan detail mahasiswa
    public function showMahasiswa(User $mahasiswa)
    {
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    // Tampilkan formulir edit mahasiswa
    public function editMahasiswa(User $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    // Update data mahasiswa
    public function updateMahasiswa(Request $request, User $mahasiswa)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:users,nim,' . $mahasiswa->id,
            'email' => 'nullable|email|unique:users,email,' . $mahasiswa->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $mahasiswa->update($data);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    // Hapus mahasiswa
    public function destroyMahasiswa(User $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
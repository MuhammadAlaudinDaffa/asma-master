<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanStatusLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminPengaduanController extends Controller
{
    /**
     * Tampilkan daftar semua pengaduan.
     */
    public function index(Request $request)
    {
        $query = Pengaduan::with('user')->latest();

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Pencarian berdasarkan nomor tiket atau deskripsi
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_tiket', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('nim', 'like', "%{$search}%");
                    });
            });
        }

        $pengaduans = $query->paginate(10);
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    /**
     * Tampilkan detail pengaduan.
     */
    public function show(Pengaduan $pengaduan)
    {
        $pengaduan = Pengaduan::with(['comments.user'])->findOrFail($pengaduan->id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Tambah komentar pada pengaduan.
     */
    public function addComment(Request $request, Pengaduan $pengaduan)
    {
        // Admin bisa selalu berkomentar
        $request->validate(['comment' => 'required|string|max:1000']);

        $pengaduan->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    /**
     * Perbarui status pengaduan.
     */
    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        // Ambil status lama
        $oldStatus = $pengaduan->status;

        // Validasi input
        $request->validate([
            'status' => 'required|in:dikirim,diproses,selesai',
            'catatan' => 'nullable|string|max:1000',
        ]);

        // Update status pengaduan
        $pengaduan->status = $request->status;
        $pengaduan->save();

        PengaduanStatusLog::create([
            'pengaduan_id' => $pengaduan->id,
            'user_id' => auth()->id(),
            'old_status' => $oldStatus,
            'new_status' => $pengaduan->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
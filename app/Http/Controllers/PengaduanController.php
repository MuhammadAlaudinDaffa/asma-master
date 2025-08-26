<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Notifications\AspirasiNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PengaduanController extends Controller
{
    /**
     * Tampilkan formulir untuk membuat pengaduan baru.
     */
    public function create()
    {
        return view('mahasiswa.pengaduan.create');
    }

    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Validasi input dari form admin
        $request->validate([
            'status_baru' => 'required|string',
            'komentar_admin' => 'nullable|string'
        ]);

        // Simpan status lama untuk perbandingan
        $statusLama = $pengaduan->status;

        // Perbarui status pengaduan
        $pengaduan->status = $request->input('status_baru');
        $pengaduan->komentar_admin = $request->input('komentar_admin');
        $pengaduan->save();

        // Periksa apakah status benar-benar berubah
        if ($pengaduan->status !== $statusLama) {
            // Dapatkan user terkait (misalnya, user yang membuat pengaduan)
            // Asumsi model Pengaduan memiliki relasi 'user'
            $user = $pengaduan->user;

            // Pastikan user ada dan memiliki email
            if ($user && $user->email) {
                // Kirim notifikasi email ke user
                $user->notify(new AspirasiNotification($pengaduan, $pengaduan->status, $request->input('komentar_admin')));
            }
        }

        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui!');
    }


    /**
     * Tampilkan riwayat pengaduan.
     */
    public function history()
    {
        $pengaduans = Auth::user()->pengaduans()->latest()->get();
        return view('mahasiswa.pengaduan.history', compact('pengaduans'));
    }

    /**
     * Simpan pengaduan baru ke database.
     */
    public function store(Request $request)
    {
        $submissionLimit = 3;
        $userId = Auth::id();

        $todaySubmissions = Pengaduan::where('user_id', $userId)
            ->whereDate('created_at', Carbon::today())
            ->count();

        if ($todaySubmissions >= $submissionLimit) {
            return redirect()->back()
                ->with('error', 'Anda telah mencapai batas maksimal pengiriman pengaduan (' . $submissionLimit . ') per hari.')
                ->withInput();
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:Akademik,Fasilitas,Administrasi,Keamanan,Lainnya',
            'deskripsi' => 'required|string|min:10',
            'prioritas' => 'required|string|in:Rendah,Sedang,Tinggi',
            'lampiran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'anonim' => 'nullable|boolean',
        ]);

        $filePath = null;
        if ($request->hasFile('lampiran')) {
            $filePath = $request->file('lampiran')->store('bukti_pengaduan', 'public');
        }

        $nomor_tiket = 'TK' . Str::upper(Str::random(8));

        // ✅ langsung convert jadi true/false
        $isAnonim = $request->has('anonim');

        Pengaduan::create([
            'user_id' => $userId,
            'nomor_tiket' => $nomor_tiket,
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'bukti' => $filePath,
            'prioritas' => $request->prioritas,
            'anonim' => $request->has('anonim'),
            'status' => 'dikirim',
        ]);

        return redirect()->route('pengaduan.history')
            ->with('success', 'Pengaduan berhasil diajukan dengan nomor tiket: ' . $nomor_tiket);
    }


    /**
     * Tampilkan detail pengaduan.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('mahasiswa.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Endpoint untuk menampilkan bukti (gambar/file) pengaduan.
     */
    public function lihatBukti($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if (!$pengaduan->bukti) {
            return response()->json(['error' => 'Bukti tidak ditemukan'], 404);
        }

        $path = storage_path('app/public/' . $pengaduan->bukti);

        if (!file_exists($path)) {
            return response()->json(['error' => 'File tidak ada di server'], 404);
        }

        return response()->file($path);
    }


    /**
     * Simpan rating pengaduan dari mahasiswa.
     */
    public function submitRating(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if (Auth::id() !== $pengaduan->user_id) {
            return back()->with('error', 'Akses Ditolak.');
        }

        if ($pengaduan->status !== 'selesai') {
            return back()->with('error', 'Anda hanya dapat memberikan rating pada pengaduan yang sudah selesai.');
        }

        if ($pengaduan->rating !== null) {
            return back()->with('error', 'Anda sudah memberikan rating pada pengaduan ini.');
        }

        $pengaduan->update([
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Rating Anda berhasil disimpan.');
    }

    public function addComment(Request $request, Pengaduan $pengaduan)
    {
        // Pastikan hanya pemilik pengaduan yang bisa berkomentar
        if (Auth::id() != $pengaduan->user_id) {
            abort(403);
        }

        $request->validate(['comment' => 'required|string|max:1000']);

        $pengaduan->comments()->create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}

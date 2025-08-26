<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'user_id',
        'nomor_tiket',
        'kategori',
        'deskripsi',
        'bukti',
        'prioritas',
        'status',
        'rating',
        'anonim',
    ];

    protected $casts = [
        'anonim' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(PengaduanComment::class);
    }

    public function statusLogs()
    {
        return $this->hasMany(PengaduanStatusLog::class);
    }
    
}
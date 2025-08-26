<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanStatusLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'old_status',
        'new_status',
        'catatan',
    ];

    /**
     * Get the user that made the status change.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the complaint that the status log belongs to.
     */
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
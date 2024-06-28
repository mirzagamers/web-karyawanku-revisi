<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';

    protected $guarded = [];

    protected $fillable = [
        'id_karyawan', 'tanggal_mulai', 'tanggal_selesai', 'keterangan',
    ];

    /**
     * Get the karyawan that owns the cuti.
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}

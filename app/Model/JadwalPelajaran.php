<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    protected $fillable = ['mata_pelajaran_id', 'hari_id', 'start', 'end'];

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class);
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    public function jadwal_pelajaran()
    {
        return $this->belongsTo(JadwalPelajaran::class, 'id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = ['siswa_id', 'keterangan', 'alasan', 'tanggal', 'bulan', 'tahun', 'photo'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function hadir()
    {
        $absensi = Absensi::where('siswa_id', $this->siswa_id)->where('keterangan', 'hadir')->count();
        return $absensi ? $absensi : 0;
    }

    public function izin()
    {
        $absensi = Absensi::where('siswa_id', $this->siswa_id)->where('keterangan', 'izin')->count();
        return $absensi ? $absensi : 0;
    }

    public function sakit()
    {
        $absensi = Absensi::where('siswa_id', $this->siswa_id)->where('keterangan', 'sakit')->count();
        return $absensi;
    }

    public function alfa()
    {
        $absensi = Absensi::where('siswa_id', $this->siswa_id)->where('keterangan', 'alfa')->count();
        return $absensi;
    }
}

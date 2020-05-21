<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama', 'email', 'nik', 'nisn', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_telepon', 'photo'];

    public function hadir()
    {
        $absen = Absensi::where('siswa_id', $this->id)->where('keterangan', 'hadir')->count();
        return $absen;
    }

    public function izin()
    {
        $absen = Absensi::where('siswa_id', $this->id)->where('keterangan', 'izin')->count();
        return $absen;
    }

    public function sakit()
    {
        $absen = Absensi::where('siswa_id', $this->id)->where('keterangan', 'sakit')->count();
        return $absen;
    }

    public function alfa()
    {
        $absen = Absensi::where('siswa_id', $this->id)->where('keterangan', 'alfa')->count();
        return $absen;
    }

    public function absensi()
    {
        $absen = Absensi::where('siswa_id', $this->id)->get();
        return $absen;
    }
}

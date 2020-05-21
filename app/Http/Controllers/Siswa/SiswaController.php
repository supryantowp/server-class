<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Model\Berkas;
use App\Model\Guru;
use App\Model\JadwalPelajaran;
use App\Model\JadwalPiket;
use App\Model\MataPelajaran;
use App\Model\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan Dashboard Siswa
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index');
    }

    /**
     * Menampilkan List guru
     *
     * @return \Illuminate\Http\Response
     */
    public function list_guru()
    {
        $gurus = Guru::all();
        return view('siswa.list_guru', compact('gurus'));
    }

    /**
     * Menampilkan Jadwal Pelajara
     *
     * @return \Illuminate\Http\Response
     */
    public function jadwal_pelajaran()
    {
        $jadwal_pelajarans = JadwalPelajaran::all();
        $hari_senin = JadwalPelajaran::where('hari_id', 1)->get();
        $hari_selasa = JadwalPelajaran::where('hari_id', 2)->get();
        $hari_rabu = JadwalPelajaran::where('hari_id', 3)->get();
        $hari_kamis = JadwalPelajaran::where('hari_id', 4)->get();
        $hari_jumat = JadwalPelajaran::where('hari_id', 5)->get();
        return view('admin.jadwal_pelajaran.index', compact('jadwal_pelajarans', 'hari_senin', 'hari_selasa', 'hari_rabu', 'hari_kamis', 'hari_jumat'));
    }

    /**
     * Menampilkan Jadwal Piket
     *
     * @return \Illuminate\Http\Response
     */
    public function jadwal_piket()
    {
        $hari_senin = JadwalPiket::where('hari_id', 1)->get();
        $hari_selasa = JadwalPiket::where('hari_id', 2)->get();
        $hari_rabu = JadwalPiket::where('hari_id', 3)->get();
        $hari_kamis = JadwalPiket::where('hari_id', 4)->get();
        $hari_jumat = JadwalPiket::where('hari_id', 5)->get();
        return view('admin.jadwal_piket.index', compact('hari_senin', 'hari_selasa', 'hari_rabu', 'hari_kamis', 'hari_jumat'));
    }

    /**
     * Menampilkan Mata Pelajaran
     *
     * @return \Illuminate\Http\Response
     */
    public function mata_pelajaran()
    {
        $mata_pelajarans = MataPelajaran::all();
        return view('siswa.mata_pelajaran', compact('mata_pelajarans'));
    }

    /**
     * Menampilkan File berkas
     *
     * @return \Illuminate\Http\Response
     */
    public function berkas()
    {
        $berkass = Berkas::all();
        return view('siswa.berkas', compact('berkass'));
    }
}

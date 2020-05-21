<?php

namespace App\Http\Controllers\Admin;

use App\Model\Absensi;
use App\Charts\AbsensiChart;
use App\Http\Controllers\Controller;
use App\Model\Siswa;
use Illuminate\Http\Request;

class DaftarAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hadir = Absensi::where('keterangan', 'hadir')->count();
        $sakit = Absensi::where('keterangan', 'sakit')->count();
        $izin = Absensi::where('keterangan', 'izin')->count();
        $alfa = Absensi::where('keterangan', 'alfa')->count();

        $data = [
            $hadir,
            $izin,
            $sakit,
            $alfa
        ];

        $chart = new AbsensiChart;
        $chart->labels(['hadir', 'izin', ' sakit', 'alfa']);
        $chart->dataset('absensi', 'pie', $data)->color('white')->backgroundColor($colors = [
            '#44D673', '#1BAED6', "#F4A90E", "#E93C58"
        ]);

        $absensis = Absensi::all();
        $siswas = Siswa::all();

        return view('admin.absensi.index', compact('chart', 'absensis', 'siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswas = Siswa::all();

        return view('admin.absensi.create', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa' => 'required',
            'keterangan' => 'required',
            'alasan' => 'required',
            'photo' => 'required'
        ]);

        $berkasStore = $this->_upload($request);

        $absensi = Absensi::create([
            'siswa_id' => $request->siswa,
            'keterangan' => $request->keterangan,
            'alasan' => $request->alasan,
            'photo' => $berkasStore,
            'tanggal' => Date('d'),
            'bulan' => Date('m'),
            'tahun' => Date('Y')
        ]);

        session()->flash('success', 'menambah absensi');
        return redirect()->route('daftar_absensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::whereId($id)->first();
        $absensis = $siswa->absensi();

        if (!$siswa && !$absensis) {
            return redirect()->route('admin');
        }

        return view('admin.absensi.show', compact('siswa', 'absensis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswas = Siswa::all();
        $absensi = Absensi::whereId($id)->first();
        return view('admin.absensi.edit', compact('absensi', 'siswas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa' => 'required',
            'keterangan' => 'required',
            'alasan' => 'required',
        ]);

        $absensi = Absensi::whereId($id)->first();

        $absensi->siswa_id = $request->siswa;
        $absensi->keterangan = $request->keterangan;
        $absensi->alasan = $request->alasan;

        if ($request->file('photo')) {
            $absensi->photo = $this->_upload($request);
        }

        $absensi->save();
        session()->flash('success', 'menghubah');
        return redirect()->route('daftar_absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absensi = Absensi::whereId($id)->first();
        $absensi->delete();

        session()->flash('success', 'mengahpus absensi');
        return redirect()->route('daftar_absensi.index');
    }

    /**
     * Upload file
     *
     * 
     * @return \Illuminate\Http\Response
     */
    private function _upload(Request $request)
    {
        $namaBerkasWithExt = $request->file('photo')->getClientOriginalName();
        $namaBerkas = pathinfo($namaBerkasWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $berkasStore = $namaBerkas . '.' . time() . '.' . $extension;
        $path = $request->file('photo')->storeAs('public/absensi/', $berkasStore);

        return $berkasStore;
    }
}

<?php

namespace App\Http\Controllers\Siswa;

use App\Charts\AbsensiChart;
use App\Http\Controllers\Controller;
use App\Model\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->siswa->id;
        $abensiss = Absensi::where('siswa_id', $id)->get();

        $hadir = Absensi::where('siswa_id', $id)->where('keterangan', 'hadir')->count();
        $izin = Absensi::where('siswa_id', $id)->where('keterangan', 'izin')->count();
        $sakit = Absensi::where('siswa_id', $id)->where('keterangan', 'sakit')->count();
        $alfa = Absensi::where('siswa_id', $id)->where('keterangan', 'alfa')->count();

        $data = [
            $hadir,
            $izin,
            $sakit,
            $alfa
        ];

        $colors = [
            '#44D673', '#1BAED6', "#F4A90E", "#E93C58"
        ];

        $chart = new AbsensiChart;
        $chart->labels(['hadir', 'izin', 'sakit', 'alfa']);
        $chart->dataset('Absensi', 'bar', $data)->color('white')->backgroundColor($colors);
        return view('siswa.absensi', compact('abensiss', 'chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'photo' => 'required',
            'keterangan' => 'required',
            'alasan' => 'required'
        ]);

        Absensi::create([
            'siswa_id' => auth()->user()->siswa->id,
            'keterangan' => $request->keterangan,
            'alasan' => $request->alasan,
            'tanggal' => Date('d'),
            'bulan' => Date('m'),
            'tahun' => Date('Y'),
            'photo' => $this->_upload($request)
        ]);

        session()->flash('success', 'absensi tunggu besok lagi');
        return redirect()->route('absensi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function _upload(Request $request)
    {
        $namaBerkasWithExt = $request->file('photo')->getClientOriginalName();
        $namaBerkas = pathinfo($namaBerkasWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $berkasStore = $namaBerkas . '.' . time() . '.' . $extension;
        $path = $request->file('photo')->storeAs('public/absensi', $berkasStore);

        return $berkasStore;
    }
}

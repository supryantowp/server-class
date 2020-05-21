<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Hari;
use App\Model\JadwalPelajaran;
use App\Model\JadwalPiket;
use App\Model\Siswa;
use Illuminate\Http\Request;

class JadwalPiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hari_senin = JadwalPiket::where('hari_id', 1)->get();
        $hari_selasa = JadwalPiket::where('hari_id', 2)->get();
        $hari_rabu = JadwalPiket::where('hari_id', 3)->get();
        $hari_kamis = JadwalPiket::where('hari_id', 4)->get();
        $hari_jumat = JadwalPiket::where('hari_id', 5)->get();
        return view('admin.jadwal_piket.index', compact('hari_senin', 'hari_selasa', 'hari_rabu', 'hari_kamis', 'hari_jumat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $haris = Hari::all();
        $siswas = Siswa::all();
        return view('admin.jadwal_piket.create', compact('haris', 'siswas'));
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
            'hari'  => 'required',
            'siswa' => 'required'
        ]);

        JadwalPiket::create([
            'hari_id'   => $request->hari,
            'siswa_id'  => $request->siswa
        ]);

        session()->flash('success', 'menambah jadwal piket');
        return redirect()->route('jadwal_piket.index');
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
        $piket = JadwalPiket::whereId($id)->first();
        $haris = Hari::all();
        $siswas = Siswa::all();
        return view('admin.jadwal_piket.edit', compact('haris', 'siswas', 'piket'));
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
            'hari'  => 'required',
            'siswa' => 'required'
        ]);

        $piket = JadwalPiket::whereId($id)->first();
        $piket->hari_id = $request->hari;
        $piket->siswa_id = $request->siswa;
        $piket->save();

        session()->flash('success', 'mengubah jadwal piket');
        return redirect()->route('jadwal_piket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piket = JadwalPiket::whereId($id)->first();
        $piket->delete();
        session()->flash('success', 'hapus jadwal piket');
        return redirect()->route('jadwal_piket.index');
    }
}

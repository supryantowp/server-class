<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Hari;
use App\Model\JadwalPelajaran;
use App\Model\MataPelajaran;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $haris = Hari::all();
        $mata_pelajarans = MataPelajaran::all();

        return view('admin.jadwal_pelajaran.create', compact('haris', 'mata_pelajarans'));
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
            'hari' => 'required',
            'mata_pelajaran' => 'required',
            'start'   => 'required',
            'end'   => 'required'
        ]);

        JadwalPelajaran::create([
            'mata_pelajaran_id' => $request->mata_pelajaran,
            'hari_id'   => $request->hari,
            'start' => $request->start,
            'end'   => $request->end
        ]);

        session()->flash('success', 'menambah jadwal pelajaran');
        return redirect()->route('jadwal_pelajaran.index');
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
        $haris = Hari::all();
        $mata_pelajarans = MataPelajaran::all();
        $jadwal_pelajaran = JadwalPelajaran::whereId($id)->first();
        return view('admin.jadwal_pelajaran.edit', compact('jadwal_pelajaran', 'haris', 'mata_pelajarans'));
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
            'hari' => 'required',
            'mata_pelajaran' => 'required',
            'start'   => 'required',
            'end'   => 'required'
        ]);

        $jadwal_pelajaran = JadwalPelajaran::whereId($id)->first();
        $jadwal_pelajaran->hari_id = $request->hari;
        $jadwal_pelajaran->mata_pelajaran_id = $request->mata_pelajaran;
        $jadwal_pelajaran->start = $request->start;
        $jadwal_pelajaran->end = $request->end;
        $jadwal_pelajaran->save();

        session()->flash('success', 'mengubah jadwal pelajaran');
        return redirect()->route('jadwal_pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = JadwalPelajaran::whereId($id)->first();
        $mapel->delete();
        session()->flash('success', 'mengapus mapel');
        return redirect()->route('jadwal_pelajaran.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkas = Berkas::all();
        return view('admin.berkas.index', compact('berkas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.berkas.create');
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'type'  => 'required',
            'filename' => 'required'
        ]);

        $berkasStore = $this->_upload($request);

        $berkas = Berkas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'type'  => $request->type,
            'filename' => $berkasStore
        ]);

        session()->flash('success', 'mengupload berkas');
        return redirect()->route('berkas.index');
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
        $berkas = Berkas::whereId($id)->first();
        return view('admin.berkas.edit', compact('berkas'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'type' => 'required'
        ]);

        $berkas = Berkas::whereId($id)->first();

        $berkas->nama = $request->nama;
        $berkas->deskripsi = $request->deskripsi;
        $berkas->type = $request->type;

        $berkasStore = $this->_upload($request);

        if ($request->file('filename')) {
            $berkas->filename = $berkasStore;
        }

        $berkas->save();
        session()->flash('success', 'mengubah berkas');
        return redirect()->route('berkas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berkas = Berkas::whereId($id)->first();
        $berkas->delete();

        session()->flash('success', 'menghapus berkas');
        return redirect()->route('berkas.index');
    }

    private function _upload(Request $request)
    {
        $namaBerkasWithExt = $request->file('filename')->getClientOriginalName();
        $namaBerkas = pathinfo($namaBerkasWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filename')->getClientOriginalExtension();
        $berkasStore = $namaBerkas . '.' . time() . '.' . $extension;
        $path = $request->file('filename')->storeAs('public/berkas', $berkasStore);

        return $berkasStore;
    }
}

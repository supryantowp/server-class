<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Imports\UserImport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.setting.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('admin.setting.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole($request->role);

        session()->flash('success', 'data added ' . $request->name);
        return redirect()->route('user_setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.setting.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::whereId($id)->first();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin');
        }

        $roles = DB::table('roles')->get();
        return view('admin.setting.users.edit', compact('user', 'roles'));
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
            'nik' => 'required',
            'name'  => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user = User::whereId($id)->first();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->syncRoles([$user->roles[0]->name, $request->role]);

        $user->save();
        session()->flash('success', 'success edit');
        // return redirect()->route('user_setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::whereId($id)->first();
        $user->delete();
        session()->flash('success', 'delete ' . $user->name);
        return redirect()->route('user_setting.index');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = time() . $file->getClientOriginalName();
        $file->move('file_user', $nama_file);
        Excel::import(new UserImport, public_path('/file_user/' . $nama_file));

        session()->flash('success', 'berhasil');
        return redirect()->route('user_setting.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        $profile = User::whereId(auth()->user()->id)->first();
        return view('admin.profile', compact('profile'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required'
        ]);

        $user = User::whereId($id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        session()->flash('success', 'update profile');
        return redirect()->back();
    }

    public function password()
    {
        $profile = User::whereId(auth()->user()->id)->first();
        return view('admin.password', compact('profile'));
    }

    public function passwordUpdate(Request $request, $id)
    {
        $request->validate([
            'password' => 'required'
        ]);

        $user = User::whereId($id)->first();

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        session()->flash('success', 'update password');
        return redirect()->back();
    }
}

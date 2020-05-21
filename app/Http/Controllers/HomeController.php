<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show profile .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function me()
    {
        $profile = User::whereId(Auth::user()->id)->first();
        return view('home.profile', compact('profile'));
    }

    /**
     * Update profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile_update(Request $request, $id)
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

    /**
     * Show Change password .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function password()
    {
        $profile = User::whereId(Auth::user()->id)->first();
        return view('home.password', compact('profile'));
    }

    /**
     * Update password .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function password_update(Request $request, $id)
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

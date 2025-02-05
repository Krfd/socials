<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('posts', Post::orderByDesc('created_at')->get());
    }

    public function editprofile() {
        return view('updateprofile');
    }
    public function updateprofile(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('home');
    }


}

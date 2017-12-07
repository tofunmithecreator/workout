<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_id = auth()->user('id');
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);->with('posts' , $user->posts)
        return view('dashboard');
    }
    //
    // public function Tedex()
    // {
    //   $users = App\User::all();
    //
    //     return view('tex');
    // }
}

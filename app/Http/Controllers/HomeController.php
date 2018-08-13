<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function signup(Request $request)
    { 
        $request->validate([
            'name' =>'required',
            'email' => 'required',
            'password' => 'required'

        ]);

        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return Response()->json(['success' => 'Done!'], 201);
        }

        public function signin(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');

            if (\Auth::attempt($credentials)) {
                // Authentication passed...
                return  'successful';
            }
           
        }
    }

  
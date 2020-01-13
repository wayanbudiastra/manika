<?php

namespace App\Http\Controllers;

 use Auth;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function postlogin(Request $request){
       // dd($request->all());
       if(Auth::attempt($request->only('email','password'))){
           return redirect('/dashboard');
          // return 'login berhasil';
       }
       return redirect('/');
    }

    public function postlokasi(Request $request)
    {
        // dd($request->all());
        $request->session()->put('id_lokasi', $request->id_lokasi);

        if ($request->session()->has('id_lokasi')) {
            return redirect('/dashboard');
            // $data = Session::all();
            // dd($data);
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

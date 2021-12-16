<?php

namespace App\Http\Controllers;

use App\Price;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LoginController extends Controller

{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('login');
    }

    public function login(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!auth()->attempt(['email' =>$request->email,'password' => $request->password])){
            return back()->with('status','Invalid credentials');
        }

        return redirect()->route('products');
    }
}

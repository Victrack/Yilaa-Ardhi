<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordonnee;

class WelcomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $coordonnee=Coordonnee::all();
        return view('welcome',[
            'coordonnee'=>$coordonnee,
        ]);
    }
}

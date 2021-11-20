<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RechercheController extends Controller
{
    //
    /**
     * Show the result of research.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $coordonnee=Coordonnee::all();
        return view('welcome',[
            'coordonnee'=>$coordonnee,
        ]);
    }

    /**
     * Show the result of research Coordonnées.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function researchCoord(Request $request)
    {
        $coordonnee=Coordonnee::all();
        return view('welcome',[
            'coordonnee'=>$coordonnee,
        ]);
    }

//    /**
//     * Show the result of research Projects.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
//    public function researchProjets(Request $request)
//    {
//
//        return view('welcome');
//    }
//
//    /**
//     * Show the result of research.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
//    public function researchLands(Request $request)
//    {
//
//        return view('welcome');
//    }
}

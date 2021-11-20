<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Models\EtatProjet;
use App\Models\Projet;
use App\Models\Promoteur;
use App\Models\TerrainProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    //

    /**
     * Show the projects.
     *
     * @return void
     */
    public function index()
    {
//        $projets=Projet::all();
        $projets=Projet::where('fini','<>',1)
            ->where('valide','=',1)
            ->paginate(10);
        return view('projets',[
            'projets'=>$projets,
        ]);
    }

    /**
     * Show the projects finished.
     *
     * @return void
     */
    public function finish()
    {
        $projets=Projet::where('fini','=',1)
            ->where('valide','=',1)
            ->paginate(10);
        return view('projets',[
            'projets'=>$projets,
        ]);
    }

    public function details($id)
    {
        $projets=Projet::where('id','=',$id)->get();
        foreach ($projets as $projet) {
            $project=$projet;
        }
        $terrainProjets= DB::table('terrain_projets')
            ->join('projets', 'projets.id', '=', 'terrain_projets.projet')
            ->join('terrains', 'terrains.id', '=', 'terrain_projets.terrain')
            ->join('croquis', 'croquis.terrain', '=', 'terrains.id')
            ->join('hameaus', 'hameaus.id', '=', 'terrains.hameau')
            ->join('villages', 'villages.id', '=', 'hameaus.village')
            ->join('arrondissements', 'arrondissements.id', '=', 'villages.arrondissement')
            ->join('communes', 'communes.id', '=', 'arrondissements.commune')
            ->join('departements', 'departements.id', '=', 'communes.departement')
            ->join('etats', 'etats.id', '=', 'departements.etat')
            ->join('pays', 'pays.id', '=', 'etats.pay')
            ->select('terrain_projets.*', 'terrains.*', 'projets.*','croquis.*',
                'hameaus.nom AS hameau',
                'villages.nom AS village',
                'arrondissements.nom AS arrondissement',
                'communes.nom AS commune',
                'departements.nom AS departement',
                'etats.nom AS etat',
                'pays.nom AS pays')
            ->where('terrain_projets.projet','=',$id)
            ->get();
        $coordonnee= DB::table('terrain_projets')
            ->join('projets', 'projets.id', '=', 'terrain_projets.projet')
            ->join('terrains', 'terrains.id', '=', 'terrain_projets.terrain')
            ->join('coordonnees', 'coordonnees.terrain', '=', 'terrains.id')
            ->select('coordonnees.*')
            ->where('terrain_projets.projet','=',$id)
            ->get();
//        TerrainProjet::where('projet','=',$id)->get();
        $etapeProjets=EtatProjet::join('etapes', 'etapes.id', '=', 'etat_projets.etape')
            ->select('etat_projets.*', 'etapes.*')
            ->where('projet','=',$id)
            ->get();

        $promoteurs=Promoteur::where('projet','=',$id)->get();
//        $projets=$projets->paginate(30);
        return view('projets_details',[
            'projet'=>$project,
            'terrainProjets'=>$terrainProjets,
            'etapeProjets'=>$etapeProjets,
            'promoteurs'=>$promoteurs,
            'coordonnee'=>$coordonnee,
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function getProjetForm()
    {
        return view('formProjet',[
            'nom'=>"",
            'datedebutprevu'=>"",
            'datefinprevu'=>"",
            'budgetPrevu'=>"",
            'description'=>"Description",
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function addProjetForm(Request $request)
    {
        $projet = new Projet();
        $projet->nom = $request->nom;
        $projet->datedebutprevu = $request->datedebutprevu;
        $projet->datefinprevu = $request->datefinprevu;
        $projet->description = $request->description;
        $projet->save();
        $promoteurs=Promoteur::where('projet','=',$projet->id)
            ->get();
        return view('formPromoteur',[
            'projet' => $projet->id,
            'promoteurs' => $promoteurs,
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function addPromoteur(Request $request)
    {
        $promoteur = new Promoteur();
        $promoteur->denomination = $request->nom;
        $promoteur->role = $request->role;
        $promoteur->projet = $request->projet;
        $promoteur->save();
        $promoteurs=Promoteur::where('projet','=',$request->projet)
            ->get();
        return view('formPromoteur',[
            'projet' => $request->projet,
            'promoteurs' => $promoteurs,
        ]);
    }
}

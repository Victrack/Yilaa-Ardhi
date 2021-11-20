<?php

namespace App\Http\Controllers;

use App\Models\Coordonnee;
use App\Models\Croqui;
use App\Models\Hameau;
use App\Models\Proprietaire;
use App\Models\Terrain;
use App\Models\TerrainProjet;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class TerrainsController extends Controller
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
        $listter=TerrainProjet::select('terrains.id')
            ->join('projets', 'projets.id', '=', 'terrain_projets.projet')
            ->join('terrains', 'terrains.id', '=', 'terrain_projets.terrain')
            ->where('projets.fini', '<>', 1)->get();
//        echo $listter;
//        $listter=array_map('intval', $listter);
        $terrains=Terrain::select('proprietaires.*', 'terrains.*')
            ->join('proprietaires', 'proprietaires.id', '=', 'terrains.proprietaire')
            ->where('valide','=',1)
//            ->whereNotIn('terrains.id',$listter)
            ->paginate(10);
        return view('terrains',[
            'terrains'=>$terrains
        ]);
    }

    /**
     * Show the projects.
     *
     * @return void
     */
    public function terrain_exploitation()
    {
//        $projets=Projet::all();
        $listter=TerrainProjet::select('terrains.id')
            ->join('projets', 'projets.id', '=', 'terrain_projets.projet')
            ->join('terrains', 'terrains.id', '=', 'terrain_projets.terrain')
            ->where('projets.fini', '<>', 1)->get();
        $terrains=Terrain::select('proprietaires.*', 'terrains.*')
            ->join('proprietaires', 'proprietaires.id', '=', 'terrains.proprietaire')
            ->where('valide','=',1)
            ->paginate(10);
        return view('terrains',[
            'terrains'=>$terrains
        ]);
    }

    /**
 * Show details of project
 *
 * @parameters id
 * @return \Illuminate\Http\Response
 */
    public function details($id)
    {
        $terrains=Terrain::where('terrains.id','=',$id)
            ->join('proprietaires','proprietaires.id','terrains.proprietaire')
            ->select('terrains.*','proprietaires.nom','proprietaires.prenom')
            ->get();
        foreach ($terrains as $terrain) {
            $project=$terrain;
        }
        $coordonnee=Coordonnee::where('terrain','=',$id)
            ->orderBy('id', 'ASC')
            ->get();
        $croquis=Croqui::where('terrain','=',$id)->get();
        $terrainProjets= DB::table('terrain_projets')
            ->join('projets', 'projets.id', '=', 'terrain_projets.projet')
            ->join('terrains', 'terrains.id', '=', 'terrain_projets.terrain')
            ->select('terrain_projets.*', 'terrains.*', 'projets.*')
            ->where('terrain_projets.terrain','=',$id)
            ->get();

        return view('terrain_details',[
            'terrain'=>$project,
            'terrainProjets'=>$terrainProjets,
            'croquis'=>$croquis,
            'coordonnee'=>$coordonnee,
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function getOwner()
    {
        return view('formProprietaire',[
            'nom'=>"",
            'prenom'=>"",
            'tel'=>"",
            'email'=>"",
            'dateNai'=>"",
            'lieuNai'=>"",
            'photo'=>"",
            'projet'=>"",
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function getCroquis()
    {
        return view('formCroquis',[
            'croquis'=>"",
            'terrain'=>"",
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function addLand(Request $request)
    {
        $terrain=new Terrain();
        $terrain->superficie = $request->area;
        $terrain->lot = $request->lot;
        $terrain->numTerrain = $request->land;
        $terrain->numEtatLieu = $request->state;
        $terrain->obs = $request->obs;

        $file = $request->file('temoin');
        $file->move(public_path().'\\storage\\terrains\\',$request->land.$request->proprietaire.'.jpg');

        $terrain->photo = '\\terrains\\'.$request->land.$request->proprietaire.'.jpg';
        $terrain->batie = $request->batie;
        $terrain->proprietaire = $request->proprietaire;
        $terrain->hameau = $request->hameau;
        $terrain->save();
        if ($request->projet!=""){
            $terrainProjet = new TerrainProjet();
            $terrainProjet->projet=$request->projet;
            $terrainProjet->terrain=$terrain->id;
            $terrainProjet->details=$request->details;
            $terrainProjet->save();
        }
        return view('formCroquis',[
            'terrain'=>$terrain->id,
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function addOwner(Request $request)
    {
        $filename = $request->file('temoin');
        $owner=new Proprietaire();
        $owner->nom = $request->nom;
        $owner->prenom = $request->prenom;
        $owner->tel = $request->tel;
        $owner->email = $request->email;
        $owner->dateNai = $request->dateNai;
        $owner->lieuNai = $request->lieuNai;
        $file = $request->file('temoin');
        $file->move(public_path().'\\storage\\proprietaires\\',$request->nom.$request->tel.'.jpg');
        $owner->cheminPhoto = '\\proprietaires\\'.$request->nom.$request->tel.'.jpg';
//        $owner->lieuNai = $request->lieuNai;
        $owner->save();
        $hameau=Hameau::join('villages', 'villages.id', '=', 'hameaus.village')
            ->join('arrondissements', 'arrondissements.id', '=', 'villages.arrondissement')
            ->join('communes', 'communes.id', '=', 'arrondissements.commune')
            ->join('departements', 'departements.id', '=', 'communes.departement')
            ->join('etats', 'etats.id', '=', 'departements.etat')
            ->join('pays', 'pays.id', '=', 'etats.pay')
            ->select('hameaus.*',
                'villages.nom AS village',
                'arrondissements.nom AS arrondissement',
                'communes.nom AS commune',
                'departements.nom AS departement',
                'etats.nom AS etat',
                'pays.nom AS pay')
            ->get();
        return view('formTerrain',[
            'hameau'=>$hameau,
            'numTerrain'=>"",
            'proprietaire'=>$owner,
            'numEtat'=>"",
            'lot'=>"",
            'superficie'=>"",
            'obs'=>"Observation *",
            'description'=>"",
            'photo'=>"",
            'projetId'=>"",
        ]);
    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function addCroquis(Request $request)
    {
        $croquis = new Croqui();
        $croquis->nom = $request->nom;
//        dd($request->photo);
        $file = $request->file('photo');
        $file->move(public_path().'\\storage\\croquis\\',$request->nom.$request->terrain.'.jpg');
//        Storage::put(
//            'images/'.$request->nom.$request->terrain,
//            file_get_contents($request->file('photo')->getRealPath())
//        );
        $croquis->croquis = '\\croquis\\'.$request->nom.$request->terrain.'.jpg';
        $croquis->terrain = $request->terrain;
        $croquis->save();
        if ($request->typeSub == 1){
            return view('formCroquis',[
                'terrain' => $request->terrain,
            ]);
        }else if ($request->typeSub == 2){
            $coordonnee=Coordonnee::where('terrain','=',$request->terrain)->get();
            return view('formCoordonnee',[
                'terrain' => $request->terrain,
                'coordonnee'=>$coordonnee,
            ]);
        }

    }

    /**
     * Show details of project
     *
     * @return \Illuminate\Http\Response
     */
    public function addCoordonnee(Request $request)
    {
        $ncoordonne = new Coordonnee();
        $ncoordonne->latitude   = $request->longitude;
        $ncoordonne->longitude  = $request->latitude;
        $ncoordonne->terrain    = $request->terrain;
        $ncoordonne->save();
        $coordonnee=Coordonnee::where('terrain','=',$request->terrain)->get();
        if ($request->typeSub == 1){
            return view('formCoordonnee',[
                'terrain' => $request->terrain,
                'coordonnee'=>$coordonnee,
            ]);
        }else if ($request->typeSub == 2){
            $coordonnee=Coordonnee::all();
            return view('welcome',[
                'coordonnee'=>$coordonnee,
            ]);
        }

    }
}

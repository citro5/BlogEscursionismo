<?php

namespace App\Http\Controllers;

use App\Models\Tipologia;
use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
class EscursioneController extends Controller
{
    public function index(){
        session_start();
        $dl=new DataLayer();                                 //array di escursioni
        $excursions_list =$dl->listExcursions();                 //invoca la vista con l'array
        $images=$dl->listExcursionImages();
        if(isset($_SESSION['loggedName'])){
            return view("escursione.index")->with("excursions_list", $excursions_list)->with('logged',true)->with('loggedName',$_SESSION['loggedName'])->with('images',$images); 
        } else {
            return view("escursione.index")->with("excursions_list", $excursions_list)->with('logged',false)->with('loggedName',"")->with('images',$images); 
        }
    }
    public function create(){
        $dl=new DataLayer();
        $tipology_list =$dl->listTipology();
        $group_list =$dl->listMountainGroup();
        return view("escursione.editExcursion")->with("tipology_list", $tipology_list)->with("group_list", $group_list)->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
    }

    public function store(Request $req){
        $dl = new DataLayer();
        $dl->addExcursion($req->input('titolo'),$req->input('tipology_id'),$req->input('difficulty'),$req->input('data'), $req->input('altitudine'),$req->input('tempistica'),$req->input('group_id'),$req->input('descrizione'),$req->file('images'),$_SESSION["user_id"]);
        return Redirect::to(route('escursione.index'));
    }
    public function edit($id)
    {
        $dl = new DataLayer();
        $excursions_list = $dl->listExcursions();
        $excursion = $dl->findExcursionById($id);
        $tipology_list= $dl->listTipology();
        $group_list= $dl->listMountainGroup();
        return view('escursione.editExcursion')->with('excursionList', $excursions_list)->with('excursion', $excursion)->with('tipology_list', $tipology_list)->with('group_list', $group_list)->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
    }
    public function update(Request $request, $id)
    {
        $dl = new DataLayer();
        $dl-> editExcursion($id, $request->input('titolo'), $request->input('tipology_id'),$request->input('difficulty'), $request->input('group_id'),$request->input('data'),$request->input('altitudine'),$request->input('tempistica'),$request->input('descrizione'),$request->file('images'));
        return Redirect::to(route('escursione.index'));
    }
    public function destroy($id)
    {
        $dl = new DataLayer();
        $excursion = $dl->findExcursionById($id);
        if ($excursion !== null) {
            $dl->deleteExcursion($id);                       //crea metodo all'interno del dataLAyer
            return Redirect::to(route('escursione.index'));
        } else {
            return view('escursione.deleteErrorPage');
        }   
    }
    public function confirmDestroy($id)
    {
        $dl = new DataLayer();
        $excursion = $dl->findExcursionById($id);
        if ($excursion !== null) {
            return view('escursione.deleteExcursion')->with('excursion', $excursion)->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
        } else {
            return view('escursione.deleteErrorPage')->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
        }
    }
    public function info($id){
        session_start();
        $dl=new DataLayer();
        $excursion=$dl->findExcursionById($id);

        $images=$dl->getExcursionImages($id);
        if(isset($_SESSION['loggedName'])){
            return view('escursione.info')->with("images",$images)->with("excursion",$excursion)->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
        } else {
            return view('escursione.info')->with("images",$images)->with("excursion",$excursion)->with('logged', false)->with('loggedName', "");
        }
    }

    public function difficulty(){    
        if(isset($_SESSION['loggedName'])){
            return view("escursione.difficoltà")->with('logged',true)->with('loggedName',$_SESSION['loggedName']);
        } else {
            return view("escursione.difficoltà")->with('logged',false)->with('loggedName',"");
        }
    }

    public function getDifficolta(Request $request)
    {
        $dl=new DataLayer();
        $risultato= $dl->getDifficulty($request->input('tipologia'));
        
        $response = [
            'difficolta' => $risultato
        ];
        
        return response()->json($response);
        
    }
}


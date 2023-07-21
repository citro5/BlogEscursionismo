<?php

namespace App\Http\Controllers;

use App\Models\Commenti;
use App\Models\Tipologia;
use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\DateTime;
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
        $user_id= $dl->findUserByExcursionId($id);
        $tipology_list= $dl->listTipology();
        $group_list= $dl->listMountainGroup();
        if($user_id == $_SESSION['user_id'] && $excursion !== null ){
        return view('escursione.editExcursion')->with('excursionList', $excursions_list)->with('excursion', $excursion)->with('tipology_list', $tipology_list)->with('group_list', $group_list)->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
    }else {
        return view('escursione.editErrorPage')->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
    }
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
        $user_id = $dl -> findUserByExcursionId($id);
        if ($excursion !== null && $user_id == $_SESSION['user_id']) {
            return view('escursione.deleteExcursion')->with('excursion', $excursion)->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
        } else {
            return view('escursione.deleteErrorPage')->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
        }
    }
    public function info($id){
        session_start();
        $dl=new DataLayer();
        $excursion=$dl->findExcursionById($id);
        if ($excursion !== null) {
            $images=$dl->getExcursionImages($id);
            $comments=$dl->getExcursionComment($id);
            if(isset($_SESSION['loggedName'])){
                return view('escursione.info')->with("images",$images)->with("comments",$comments)->with("excursion",$excursion)->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);
            } else {
                return view('escursione.info')->with("images",$images)->with("comments",$comments)->with("excursion",$excursion)->with('logged', false)->with('loggedName', "");
            }
        } else {
            if(isset($_SESSION['loggedName'])){
                return view('escursione.infoErrorPage')->with('logged', true)->with('loggedName', $_SESSION["loggedName"]);   
            }else{
                return view('escursione.infoErrorPage')->with('logged', false);   
            }
        }
    }

    public function difficulty(){    
        session_start();
        if(isset($_SESSION['loggedName'])){
            return view("difficoltà")->with('logged',true)->with('loggedName',$_SESSION['loggedName']);
        } else {
            return view("difficoltà")->with('logged',false)->with('loggedName',"");
        }
    }

    public function viewMap(){  
        session_start();
        if(isset($_SESSION['loggedName'])){
            return view("mappa")->with('logged',true)->with('loggedName',$_SESSION['loggedName']);
        } else {
            return view("mappa")->with('logged',false)->with('loggedName',"");
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
    

    public function filterSort(Request $req){     //metodo per filtrare e ordinare escursioni
        session_start();
        $type=$req->input('filterBy');
        $order=$req->input('sortBy');
        $dl=new DataLayer();
        $excursions_list_sort_filter= $dl->filterSort($type, $order);
        $images=$dl->listExcursionImages();
        if(isset($_SESSION['loggedName'])){
            return view("escursione.index")->with("excursions_list", $excursions_list_sort_filter)->with('logged',true)->with('loggedName',$_SESSION['loggedName'])->with('images',$images)->with('type',$type)->with('order',$order); 
        } else {
            return view("escursione.index")->with("excursions_list", $excursions_list_sort_filter)->with('logged',false)->with('loggedName',"")->with('images',$images)->with('type',$type)->with('order',$order); 
        }
    }
    public function addCommento(Request $request) {
        date_default_timezone_set('Europe/Rome');
        $now = new DateTime();
        $data = $now->format('Y-m-d H:i:s'); 
        $dl=new DataLayer();
        $dl-> addComment($request->input('escursione_id'),$request->input('commento'),$_SESSION['loggedName'],$data);
        return redirect()->back()->with('success', 'Commento aggiunto con successo.');
    }
    public function removeCommento($id){
        $dl=new DataLayer();
        $dl-> removeComment($id);
        return redirect()->back()->with('success', 'Commento rimosso con successo.');
    }
}


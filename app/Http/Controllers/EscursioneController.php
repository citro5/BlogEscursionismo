<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;
class EscursioneController extends Controller
{
    public function index(){
        $dl=new DataLayer();                                 //array di escursioni
        $excursions_list =$dl->listExcursions();                 //invoca la vista con l'array
        return view("escursione.index")->with("excursions_list", $excursions_list); 
    }
    public function create(){
        $dl=new DataLayer();
        $tipology_list =$dl->listTipology();
        $group_list =$dl->listMountainGroup();
        return view("escursione.editExcursion")->with("tipology_list", $tipology_list)->with("group_list", $group_list);
    }

    public function store(Request $req){
        $dl = new DataLayer();
        $dl->addExcursion($req->input('title'),$req->input('tipology_id'),$req->input('data'), $req->input('altitudine'),$req->input('tempistica'),$req->input('group_id'));
        return Redirect::to(route('escursione.index'));
    }
}

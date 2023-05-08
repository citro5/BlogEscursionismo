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
        $dl->addExcursion($req->input('titolo'),$req->input('tipology_id'),$req->input('data'), $req->input('altitudine'),$req->input('tempistica'),$req->input('group_id'));
        return Redirect::to(route('escursione.index'));
    }
    public function edit($id)
    {
        $dl = new DataLayer();
        $excursions_list = $dl->listExcursions();
        $excursion = $dl->findExcursionById($id);
        $tipology_list= $dl->listTipology();
        $group_list= $dl->listMountainGroup();
        return view('escursione.editExcursion')->with('excursionList', $excursions_list)->with('excursion', $excursion)->with('tipology_list', $tipology_list)->with('group_list', $group_list);
    }
    public function update(Request $request, $id)
    {
        $dl = new DataLayer();
        $dl-> editExcursion($id, $request->input('titolo'), $request->input('tipology_id'), $request->input('group_id'),$request->input('data'),$request->input('altitudine'),$request->input('tempistica'));
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
            return view('escursione.deleteExcursion')->with('excursion', $excursion);
        } else {
            return view('escursione.deleteErrorPage');
        }
    }
}


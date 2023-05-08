<?php
namespace App\Models;
use App\Models\Escursione;

class DataLayer {

    public function listExcursions(){
        return Escursione::orderBy('data','asc')->get();
    }
    public function listTipology(){
        return Tipologia::orderBy('id','asc')->get();
    }
    public function listMountainGroup(){
        return GruppoMontuoso::orderBy('id','asc')->get();
    }
    public function findExcursionById($id) {
        return Escursione::find($id);
    }
    public function addExcursion($titolo, $tipologia_id, $data, $altitudine, $tempistica, $gruppo_id){
        $excursion = new Escursione;
        $excursion -> titolo = $titolo;
        $excursion -> tipologia_id = $tipologia_id;
        $excursion -> data = $data;
        $excursion -> altitudine = $altitudine;
        $excursion -> tempistica = $tempistica;
        $excursion -> gruppo_id = $gruppo_id;
        $excursion -> save();
    }

    public function editExcursion($id,$titolo, $tipologia_id,$gruppo_id, $data, $altitudine, $tempistica) {
        $excursion = Escursione::find($id);
        $excursion -> titolo = $titolo;
        $excursion -> tipologia_id = $tipologia_id;
        $excursion -> gruppo_id = $gruppo_id;
        $excursion -> data = $data;
        $excursion -> altitudine = $altitudine;
        $excursion -> tempistica = $tempistica;
        $excursion -> save();
    }
    
    public function deleteExcursion($id) {
        $excursion = Escursione::find($id) -> delete();
    }
};
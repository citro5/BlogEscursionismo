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

    public function listExcursionImages()
    {
        return Immagini::orderBy('id','asc')->get();
    }
    public function findExcursionById($id) {
        return Escursione::find($id);
    }
    public function addExcursion($titolo, $tipologia_id,$difficoltà, $data, $altitudine, $tempistica, $gruppo_id,$descrizione,$img,$user_id){
        $excursion = new Escursione;
        $excursion -> titolo = $titolo;
        $excursion -> tipologia_id = $tipologia_id;
        $excursion -> difficoltà = $difficoltà;
        $excursion -> data = $data;
        $excursion -> altitudine = $altitudine;
        $excursion -> tempistica = $tempistica;
        $excursion -> gruppo_id = $gruppo_id;
        $excursion -> descrizione = $descrizione;
        $excursion -> user_id = $user_id;
        $excursion -> save();

        if (isset($img)){
            foreach($img as $i){
                $this->uploadImage($i,$excursion);
            }
        }
        
    }
    public function editExcursion($id,$titolo, $tipologia_id,$difficoltà,$gruppo_id, $data, $altitudine, $tempistica,$descrizione,$img) {
        $excursion = Escursione::find($id);
        $excursion -> titolo = $titolo;
        $excursion -> tipologia_id = $tipologia_id;
        $excursion -> difficoltà = $difficoltà;
        $excursion -> gruppo_id = $gruppo_id;
        $excursion -> data = $data;
        $excursion -> altitudine = $altitudine;
        $excursion -> tempistica = $tempistica;
        $excursion -> descrizione = $descrizione;
       
        if (isset($img)){
            foreach($img as $i){
                $this->uploadImage($i,$excursion);
            }
        }
        $excursion -> save();
    }
    public function getExcursionImages($id)
    {
        $img = Immagini::where('escursione_id',$id)->get();
        return $img;
    }
    
    
    public function deleteExcursion($id) {
        $excursion = Escursione::find($id);
        $img = Immagini::where('escursione_id',$id)->delete();
        $excursion-> delete();
    }

    public function validUser($username,$password){
        $users = User::where('email',$username)->get(['password']);
        if(count($users)==0){
            return false;
        }
        return (md5($password) == ($users[0]->password));
    }
    public function getUserName($email){
        $users = User::where('email',$email)->get();
        return $users[0]->name;
    }
    public function getUserID($username) {
        $users = User::where('email',$username)->get(['id']);
        return $users[0]->id;
    }

    public function addUser($username, $password, $email) {
        $user = new User();
        $user->name = $username;
        $user->password = md5($password);
        $user->email = $email;
        $user->save();
    }

    public function checkEmail($email) {
        $users = User::where('email',$email)->get();
        if (count($users) == 0) {
            return false;
        } else {
            return true;
        }
    }
    public function checkUsername($username) {
        $users = User::where('name',$username)->get();
        if (count($users) == 0) {
            return false;
        } else {
            return true;
        }
    }
    public function uploadImage($image,$excursion):void{
        $v = Immagini::count()+1;
        $i=new Immagini();
        $i->path='/img/upload/'.$excursion->id.$v.'.png';
        $i->escursione_id=$excursion->id;
        $i->save();

        $image->storeAs('public/img/upload',$excursion->id.$v.'.png');
    }

    public function getDifficulty($tipologia){
       $difficulty= Difficoltà::where('tipologia_id',$tipologia)->get('grado_difficoltà');
       return $difficulty;
    }
    
};
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
    
};
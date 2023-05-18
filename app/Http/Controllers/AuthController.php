<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function authentication(){
        return view('auth.auth');
    }
    public function login(Request $req){                  //request passato dalla form
        session_start();
        $dl = new DataLayer();
        if($dl->validUser($req->input('email'),$req->input('password'))){
            $_SESSION['logged']=true;
            $_SESSION['loggedName']=$dl->getUserName($req->input('email'));
            $_SESSION['email']=$req->input('email');
            return Redirect::to(route('escursione.index'));
        }
        return view('auth.authErrorPage');
    }
    
    public function logout(){
        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }

    public function registration(Request $req) {
        $dl = new DataLayer();
        $dl->addUser($req->input('username'), $req->input('password'), $req->input('email'));
        return Redirect::to(route('user.login'));
    }

    public function registrationCheckForEmail(Request $req) {
        $dl = new DataLayer();
        
        if($dl-> checkEmail($req->input('email')))
        {
            $response = array('found'=>true);
        } else {
            $response = array('found'=>false);
        }
        return response()->json($response);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    protected $user;
    public function __construct(){
        $this->middleware('checklogin');
        $this->user = Auth::user();
    }
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $validate = Validator::make(Input::all(), [
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if($validate){
            $user = User::where('username' , $username)->first();
            if($user){
                if(Hash::check($password, $user->password)){
                    Auth::login($user);
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

}

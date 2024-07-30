<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AuthController extends Controller
{


    public function loginPage(){
        return view('login');
    }
    public function login (AuthRequest $request){

        $data = $request->validated();
        $user = User::where('email',$data['emailOrName'])->first();
        if($user==null){
            $user = User::where('name',$data['emailOrName'])->first();
        }
        if ($user == null ){
            return back()->withErrors(['emailOrName'=>'Invalid Username or Email']);
        }
        $check = Hash::check($data['password'],$user->password);
        if ($check){
            Auth::login($user);
        //    return to_route('login_page');
        }
        else{
            return back()->withErrors(['password'=>'Incorrect Password']);
        }
    }

    public function logout (Request $request){
        $user = $request->user();
        Auth::logout();
      //  return to_route('login_page');
    }
}

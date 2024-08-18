<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        if (!$check){
            return back()->withErrors(['password'=>'Incorrect Password']);
        }
        Auth::login($user);
        return to_route('after_login');
    }
    public function registerPage(){
        return view('register');
    }
    public function register (Request $request){

        $request ->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|same:confirmPassword'
        ]);
        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->except('_token'));
        Auth::login($user);

        return to_route('after_login');
    }
    public function logout (Request $request){
        $user = $request->user();
        Auth::logout();
      return to_route('login_page');
    }
}

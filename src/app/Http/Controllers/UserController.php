<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        $user=$request->only(['name', 'email', 'password']);
        $user['password']=Hash::make($user['password']);
        User::create($user);
        return view('auth.login');
    }
    public function login(LoginRequest $request){
        $user=$request->only(['email', 'password']);
        if(Auth::attempt($user)){
            return redirect()->intended('/admin');
        }
        return redirect('/login')->withErrors([
            'email'=>'メールアドレスまたはパスワードが間違っています'
        ]);
    }
    public function admin(){
        $contacts=Contact::with('category')->get();
        $contacts=Contact::Paginate(7);
        return view('auth.admin', compact('contacts'));
    }
}

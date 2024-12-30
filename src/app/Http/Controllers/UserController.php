<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Category;
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
        $categories=Category::all();
        return view('auth.admin', compact('contacts', 'categories'));
    }
    public function search(Request $request){
        $query=Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CreatedSearch($request->created_at);
        $contacts=$query->Paginate(7)->appends($request->all());;
        $categories=Category::all();
        return view('auth.admin', compact('contacts', 'categories'));
    }
}

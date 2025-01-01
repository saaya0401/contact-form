<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
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
    public function export(Request $request){
        $query=Contact::with('category');
        if($request->category_id){
            $query->CategorySearch($request->category_id);
        }
        if ($request->keyword) {
        $query->KeywordSearch($request->keyword);
        }
        if ($request->gender) {
        $query->GenderSearch($request->gender);
        }
        if ($request->created_at) {
        $query->CreatedSearch($request->created_at);
        }
        $contacts=$query->get();
        $csvHeader=[
            'ID', 'first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail'
        ];
        $temps=[];
        array_push($temps, $csvHeader);
        foreach($contacts as $contact){
            $temp=[
                $contact->id,
                $contact->first_name,
                $contact->last_name,
                $contact->gender,
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category_id,
                $contact->detail
            ];
            array_push($temps, $temp);
        }
        $stream=fopen('php://temp', 'r+b');
        foreach($temps as $temp){
            fputcsv($stream, $temp);
        }
        rewind($stream);
        $csv=str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv=mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        $filename="お問い合わせ一覧.csv";
        $headers=array(
            'Content-Type'=>'text/csv',
            'Content-Disposition'=>'attachment; filename=' .$filename,
        );
        return Response::make($csv, 200, $headers);
    }
}

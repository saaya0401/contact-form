<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('index', compact('categories'));
    }
    public function confirm(ContactRequest $request){
        $contact=$request->only(['first_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        $tel_parts=$request->input('tel');
        $tel=implode('', $tel_parts);
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $full_name=$first_name . ' ' . $last_name;
        $category=Category::find($contact['category_id']);
        return view('confirm', compact('contact', 'tel', 'full_name', 'category'));
    }
    public function thanks(){
        
        return view('thanks');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUser;

class ContactUserController extends Controller
{
    public function index(){
        $contact_users=ContactUser::all();
        return view('contact_user', compact('contact_users'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ContactUser;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['category_id', 'contact_user_id', 'content'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function contactUser(){
        return $this->belongsTo(ContactUser::class);
    }
}

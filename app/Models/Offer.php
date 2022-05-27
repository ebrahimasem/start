<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table="offers";
    protected $fillable=['id','name_ar','name_en','price','details_ar','details_en','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];  
    // لو عايز اخلي created_at , updated_at null 
    // نكتب الكود ده
   public $timestamps=false;

}

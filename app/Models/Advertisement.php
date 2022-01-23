<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;

use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use App\Models\User;

use DB;

use Cohensive\OEmbed\Facades\OEmbed;

class Advertisement extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->hasOne(Category::class,'id','category_id'); 
    }

    public function childcategory(){
        return $this->hasOne(Childcategory::class,'id','childcategory_id'); 
    }

    public function subcategory(){
        return $this->hasOne(Subcategory::class,'id','subcategory_id'); 
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }

    //this is for embed package
    public function videolink(){

        $embed = OEmbed::get($this->link);
        if ($embed) {
           // return $embed->html();
            return $embed->html(['width' => 500]);
            //return $embed->data();

        }else{
            return;
        }

    }

    //save ads relation
    public function userads(){
        return $this->belongsToMany(User::class);
    }

    //check if user alreads save the ads
    public function didUserSavedAd(){
        return DB::table('advertisement_user')
                ->where('user_id', auth()->user()->id)
                ->where('advertisement_id', $this->id)
                ->first();
    }



}

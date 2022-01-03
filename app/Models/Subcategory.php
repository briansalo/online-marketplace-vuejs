<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Advertisement;
class Subcategory extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function childcategory(){
        return $this->hasMany(Childcategory::class);
    }

    public function getRouteKeyName(){ //to asssign slug is an unique key
        return 'slug'; 
    }
    public function ads(){
        return $this->hasMany(Advertisement::class);
    }
}


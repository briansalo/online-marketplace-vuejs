<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','image'];

    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }

    public function getRouteKeyName(){ //to asssign slug is an unique key
        return 'slug'; 
    }
    public function ads(){
        return $this->hasMany(Advertisement::class);
    }

    //scope
    public function scopeCategoryCar($query){
        return $query->where('name','cars')->first();
    }
}

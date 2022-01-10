<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Message extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $appends=['chatBelongToAuth'];

    // to avoid error in protected appends you need to create a function with the first word is get followed by the append name then the attribute word.
    //you can see the value of this attribue when you return a value from messenger model in your controller
    //its only use in javascript. because you can't see this if you die dump
    public function getchatBelongToAuthAttribute(){
        //if the user_id == auth id then chatbelongtoauth field equals to true.
        return $this->user_id == auth()->user()->id; 
    }

    public function sender(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');   
    }

    public function ads(){
        return $this->belongsTo(Advertisement::class,'ad_id');      
    }
}

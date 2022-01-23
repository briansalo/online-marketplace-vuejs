<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraud extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function complinant_user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function reported_user(){
        return $this->belongsTo(User::class,'report_user_id');
    }


}

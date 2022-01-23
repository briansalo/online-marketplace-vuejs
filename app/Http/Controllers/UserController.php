<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Advertisement;

class UserController extends Controller
{
    //
    public function AllUser(){

            $users = User::where('isadmin','0')->latest()->paginate(10);
        return view('admin.content.user.all_user',compact('users'));
    }

    public function ActivateUser($id){
        User::where('id',$id)->update(['status'=>1]);
        return back();
    }

    public function DeactivateUser($id){
        User::where('id',$id)->update(['status'=>0]);
        return back();
    }


    public function UserProfile($id){
        $user=User::find($id);
        

        $ads=Advertisement::where('user_id', $id)->get();

        return view('backend.profile.profile_show',compact('ads','user'));      
    }

}


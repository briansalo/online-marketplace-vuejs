<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Advertisement;

class AdminAdsController extends Controller
{
    //
    public function AdminAllAds(){

        $alldata = Advertisement::where('published', 1)->latest()->paginate(10);
        return view('admin.content.advertisement.admin_advertisement', compact('alldata'));
    }

    public function AdminPendingAds(){

        $alldata = Advertisement::where('published', 0)->latest()->paginate(10);
        return view('admin.content.advertisement.admin_pending_advertisement', compact('alldata'));
    }

    public function AdminPendingConfirm($id){
        Advertisement::find($id)->update(['published'=> 1]);
        return back();
    }

    public function AdminDeleteAds($id){
         Advertisement::find($id)->delete();
        return redirect()->route('admin.all_ads')->with('message','Advertisement deleted successfully');

    }

}

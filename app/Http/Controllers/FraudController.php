<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fraud;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class FraudController extends Controller
{
    //
    public function ReportUser(Request $request){
         Fraud::create([
            'user_id' => auth::id(),
            'report_user_id' => $request->reportUserId,
            'reason' => $request->selectedReason,
            'message' => $request->messageReport,
        ]);
       
    }

    public function ViewReportedUser(){

            $allfraud = Fraud::latest()->paginate(10);
        return view('admin.content.report.reported_user',compact('allfraud'));
    }
    

    public function ReportedConfirm($id){


        $fraud = Fraud::find($id);

        $user = User::find($fraud->report_user_id);
       
        User::where('id',$fraud->report_user_id)->update(['count_penalty'=>$user->count_penalty+1]);

        $fraud->delete();

        return back();

    }

    public function ReportedIgnore($id){
        Fraud::find($id)->delete();
        return back();
    }
}

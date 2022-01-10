<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Advertisement;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function MessageSend(Request $request){
   //dd($request->all());
       // Advertisement::find($request->receiverId);
        //$message = new Message();
        //$message->user_id = $request->userId;
        //$message->receiver_id =$request->receiverId;
        //$message->ad_id = $request->advertisementId;
      //  $message->body = $request->body
     //   $message->save();
                Message::create([
            'user_id' => $request->userId,
            'receiver_id' => $request->receiverId,
            'ad_id' => $request->advertisementId,
            'body' => $request->body,
        ]);
       

    }

    public function MessageView(){
        return view('backend..advertisement.content.message.message_view');
    }


    public function ChatWithUser(){
        $conversation = Message::where('user_id', auth::id())
        ->orwhere('receiver_id', auth::id())
        ->orderBy('id','DESC')
        ->get();


        // map function. get all user who had conversation for this auth user
        $users = $conversation->map(function($conversation){
            if($conversation->user_id == auth::id()){
                return $conversation->receiver; // the reciever method here came from message model
            }
                return $conversation->sender; // the reciever method here came from message model
        })->unique();

            //count how many unread message each user from this authenticated user
        $unread=[];
        foreach($users as $row){
            $unread[] = Message::where('user_id', $row->id)
            ->where('receiver_id', auth::id())
            ->where('read_at', null)
            ->count();
            }

        return response()->json(['users'=>$users, 'unread'=>$unread]);

     }

     public function ShowMessage(Request $request, $id){

        $message = Message::with('user','ads')
        ->where('receiver_id', auth::id())
        ->where('user_id', $id)
        ->orwhere('user_id', auth::id())
        ->where('receiver_id', $id)
        ->get();
        //dd($message);
        return $message;

     }


     public function StartConversation(Request $request){
        $message = Message::create([
            'user_id'=>Auth::user()->id,
            'receiver_id'=>$request->receiverId,
            'body'=>$request->body
        ]);
        return $message->load('user');// we need to add user from model. in able to read the user attributes
     }

    public function SetAsReadMessage($id){
                $today = Carbon::now();

                $read = Message::where('user_id', $id)
                ->where('receiver_id',auth::id())
                ->where('read_at', null)
                ->update(['read_at' => $today]);


    }

    
}

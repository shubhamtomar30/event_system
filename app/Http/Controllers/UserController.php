<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\invite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function addevent(){
        $data = event::where('user_id' , Auth::user()->id)->get();
        return view('admin.addevent.add_event' , compact('data'));
    }

    public function event(){
        $data = event::latest()->get();
        return view('admin.totalevent.totalevent' , compact('data'));
    }

    public function store_event(Request $a){
        $data = new event();
        $data->user_id = $a->id;
        $data->event_title = $a->title;
        $data->event_description = $a->des;
        $data->save();
        return redirect()->back();
    }

    public function invite($id){
        $event_id = $id;
        $log_id = Auth::user()->id;
        $data = User::where('id' , '!=' , $log_id)->get();
        // dd($data);
        // die;

        return view('admin.invite.invite' , compact('data' , 'event_id'));
    }

    public function storeinvite(Request $a){
        // echo '<pre>';
        // print_r($a);
        // dd($a->check);
        $id = Auth::user()->id;
        foreach($a->check as $data){
            // echo $data;
            $store = new invite();
            $store->event_id = $a->event_id;
            $store->invite_to = $data;
            $store->invite_by = Auth::user()->id;
            $store->save();
        }
        return redirect()->back();
    }

    public function list_of_users_invited($id){

        $data = DB::select('select * from invites LEFT JOIN events ON invites.event_id = events.id LEFT JOIN users ON invites.invite_to = users.id WHERE invites.invite_by ='.$id);
        // dd($data);\
        if($data){
            return response()->json([
                'success'=>true,
                'message'=>'event_details and users invited',
                'data'=>$data
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'message'=>'no user invited',

            ]);
        }



    }
}

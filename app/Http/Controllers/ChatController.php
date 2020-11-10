<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function store(Request $request)
    {
        //
    }
    
    public function getUsers()
    {
        return response()->json(User::where('name','!=','Admin')->get(),200);
    }
    public function getChats($id)
    {   
        if(count(Chat::where('sender_id',Auth::user()->id)->where('receiver_id',$id)->get()) != 0){            
            if(Auth::user()->id === 1){
                return response()->json(Chat::where('sender_id',Auth::user()->id)
                                            ->where('receiver_id',$id)
                                            ->orWhere('sender_id',$id)
                                            ->get(),200);
            }else{
                return response()->json(Chat::where('sender_id',Auth::user()->id)
                                             ->where('receiver_id',$id)
                                             ->orWhere('receiver_id',Auth::user()->id)
                                             ->get(),200);
            }
        }else{
            return response()->json('None',200);
        }

    }
}
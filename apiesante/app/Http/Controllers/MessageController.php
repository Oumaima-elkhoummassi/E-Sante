<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function index(Request $request)
    {
        $message = Message::Where('idp','=',$request->idl)->where('idm','=',$request->idr)->where('idurgence','=',$request->idu)->get() ;
        return response()->json(['msg' =>  $message  ]);
    }

    public function sendMessage(Request $request)
    {

        $message = new Message();
        $message->idp = $request->idl;
        $message->idm = $request->idr;
        $message->idurgence = $request->idu;
        $message->msgpar = $request->idp;
        $message->msg = $request->msg;
        $message->save();

        // Broadcast the message to all connected WebSocket clients


        return response()->json(['status' => 'success']);
    }
}

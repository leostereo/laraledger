<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    //
    public function send (Request $request){

        $validated = $request->validate([

            'connection_id' => 'required',
            'message' => 'required',

        ]);

        $conn_id = $request->connection_id;
        $message = $request->message;
        $agent = $request->agent;
        
        $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/connections/'.$conn_id.'/send-message';

        $response = Http::post($url, ['content'=>$message]);

        if($response->failed()){

            return redirect()->back()
            ->with( 'last_op', true )
            ->with( 'result', false )
            ->with( 'message', $response->body());

        }
        
        $response_arr =  json_decode($response->body(),TRUE);

        return redirect()->route('dashboard')
        ->with( 'last_op', true )
        ->with( 'result', true )
        ->with( 'message', 'message sent OK')
        ->with( 'next_oper', false);
    }
}

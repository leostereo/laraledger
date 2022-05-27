<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ConnectionController extends Controller
{

    //
    public function remove (Request $request){

        $conn_id = $request->id;
        $agent = $request->agent;
        $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/connections/'.$conn_id;

        $response = Http::delete($url);

        if($response->failed()){

            return redirect()->back()
            ->with( 'last_op', true )
            ->with( 'result', false )
            ->with( 'message', $response->body());

        }

        return redirect()->route('dashboard')
        ->with( 'last_op', true )
        ->with( 'result', true )
        ->with( 'message', 'conexion eliminada OK');
    }

    public function invitation_create (Request $request){

        $validated = $request->validate([

            'alias' => 'required',

        ]);

         $alias = $request->alias;
         $agent = $request->agent;

        
         $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/connections/create-invitation?alias='.$alias;

        $response = 
        Http::post($url, [
                'name' => 'Miller Juma',
                'role' => 'Laravel Contributor',
        ]);


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
        ->with( 'message', 'invitation created OK')
        ->with( 'invite_str', json_encode($response_arr['invitation'],JSON_UNESCAPED_SLASHES));

    }
    public function invitation_receive (Request $request){

        $validated = $request->validate([

            'invitation_data' => 'required',

        ]);

        $agent = $request->agent;
        $json_str = $request->invitation_data;
         //dd($json_str);

        
         $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/connections/receive-invitation';

        $response = Http::post($url, json_decode($json_str,true));

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
        ->with( 'message', 'invitation created OK')
        ->with( 'invite_confirm', $response_arr['connection_id']);
    }
    public function invitation_accept (Request $request){

        $validated = $request->validate([

            'conn_id' => 'required',

        ]);

        $conn_id = $request->conn_id;
        $agent = $request->agent;
        
        $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/connections/'.$conn_id.'/accept-invitation';

        $response = Http::post($url, []);

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
        ->with( 'message', 'invitation created OK')
        ->with( 'request_accept', $response_arr['connection_id']);
    }
    public function request_accept (Request $request){

        $validated = $request->validate([

            'conn_id' => 'required',

        ]);

        $conn_id = $request->conn_id;
        $agent = $request->agent;
        
        $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/connections/'.$conn_id.'/accept-request';

        $response = Http::post($url, []);

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
        ->with( 'message', 'invitation created OK')
        ->with( 'next_oper', $response_arr['connection_id']);
    }

}

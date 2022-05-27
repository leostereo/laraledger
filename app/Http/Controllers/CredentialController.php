<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CredentialController extends Controller
{
    //
    public function issue (Request $request){

        $validated = $request->validate([

            'name' => 'required',
            'degree' => 'required',

        ]);

        $conn_id = $request->connection_id;
        $agent = $request->agent;
        $name = $request->name;
        $degree = $request->degree;

        
        $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/issue-credential-2.0/send';

        $json_str ='
        {
            "auto_remove": true,
            "comment": "string",
            "connection_id": "35316d4a-4ef1-45a7-b6c9-3a4c7e4b5361",
            "credential_preview": {
              "@type": "issue-credential/2.0/credential-preview",
              "attributes": [
                {
                    "name": "name",
                    "value": "'.$name.'"
                  },
                  {
                    "name": "timestamp",
                    "value": "1234567890"
                  },
                  {
                    "name": "date",
                    "value": "2018-05-28"
                  },
                  {
                    "name": "degree",
                    "value": "'.$degree.'"
                  },
                  {
                    "name": "birthdate_dateint",
                    "value": "19640101"
                  }
              ]
            },
            "filter": {
              "indy": {
                "cred_def_id": "J6kHpyr2VRXXnucxjZRByQ:3:CL:133627:faber.agent.degree_schema",
                "issuer_did": "J6kHpyr2VRXXnucxjZRByQ",
                "schema_id": "J6kHpyr2VRXXnucxjZRByQ:2:degree schema:59.73.43",
                "schema_issuer_did": "J6kHpyr2VRXXnucxjZRByQ",
                "schema_name": "degree schema",
                "schema_version": "59.73.43"
              }
            },
            "trace": true
          }';

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
        ->with( 'message', 'Credential issued OK')
        ->with( 'next_oper', false);
    }

    public function remove (Request $request){


        $record_id = $request->id;
        $agent = $request->agent;
        
        $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'/issue-credential-2.0/records/'.$record_id;

        $response = Http::delete($url, []);

        if($response->failed()){

            return redirect()->back()
            ->with( 'last_op', true )
            ->with( 'result', false )
            ->with( 'message', $response->body());

        }
        
        return redirect()->route('dashboard')
        ->with( 'last_op', true )
        ->with( 'result', true )
        ->with( 'message', 'Record removed OK')
        ->with( 'next_oper', false);
    }
    
    public function store (Request $request){

        
        $validated = $request->validate([

            'pix' => 'required',

        ]);

        $record_id = $request->id;
        $agent = $request->agent;
        
        $url = 'http://'.$this->ip[$agent].':'.$this->port[$agent].'issue-credential-2.0/records/'.$record_id;

        $response = Http::delete($url, []);

        if($response->failed()){

            return redirect()->back()
            ->with( 'last_op', true )
            ->with( 'result', false )
            ->with( 'message', $response->body());

        }
        
        return redirect()->route('dashboard')
        ->with( 'last_op', true )
        ->with( 'result', true )
        ->with( 'message', 'Record removed OK')
        ->with( 'next_oper', false);
    }

}

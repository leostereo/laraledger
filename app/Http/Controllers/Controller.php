<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $port;
    protected $ip;


    public function __construct()
    {
        $this->port['faber'] = env('FABER_PORT');
        $this->ip['faber'] = env('FABER_IP');
        $this->port['alice'] = env('ALICE_PORT');
        $this->ip['alice'] = env('ALICE_IP');
    }

    public  function  get_data (){

        $url = 'http://'.$this->ip['alice'].':'.$this->port['alice'].'/connections';
        $response = Http::get($url);
        $data['alice']['connections'] = $response->json();
        $data['alice']['records'] = $this->get_records($this->ip['alice'],$this->port['alice']);

        $url = 'http://'.$this->ip['faber'].':'.$this->port['faber'].'/connections';
        $response = Http::get($url);
        $data['faber']['connections'] = $response->json();
        $data['faber']['records'] = $this->get_records($this->ip['faber'],$this->port['faber']);
        $data['faber']['public_did'] = $this->get_public_did();
        $data['faber']['schemas'] = $this->get_schemas();
        $data['faber']['cred_defs'] = $this->get_cred_defs();

        return $data;

    }

    public function get_records ($ip,$port){
        $url = 'http://'.$ip.':'.$port.'/issue-credential-2.0/records';
        $response = Http::get($url);
        return $response->json()['results'];

    }

    public  function  get_public_did (){

        $url = 'http://'.$this->ip['faber'].':'.$this->port['faber'].'/wallet/did/public';
        $response = Http::get($url);
        return $response->json()['result'];

    }

    public  function  get_schemas (){

        $url = 'http://'.$this->ip['faber'].':'.$this->port['faber'].'/schemas/created';
        $response = Http::get($url);
        return $response->json();

    }

    public  function  get_cred_defs (){

        $url = 'http://'.$this->ip['faber'].':'.$this->port['faber'].'/credential-definitions/created';
        $response = Http::get($url);
        return $response->json();

    }

    

}

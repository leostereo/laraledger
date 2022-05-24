<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    //
    public function  index (Request $request){

        $faber_port = env('FABER_PORT');
        $faber_ip = env('FABER_IP');
        $alice_port = env('ALICE_PORT');
        $alice_ip = env('ALICE_IP');
 
        $response = Http::get('http://'.$alice_ip.':'.$alice_port.'/connections');
        $data['alice']['connections'] = $response->json();

        $response = Http::get('http://'.$faber_ip.':'.$faber_port.'/connections');
        $data['faber']['connections'] = $response->json();


        return view('theme::dashboard.index', compact('data'));

    }

    public function  action (Request $request){

        return view('theme::action.pages.home');

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    //
    public function  index (Request $request){

        $data = $this->get_data();
        return view('theme::dashboard.index', compact('data'));

    }



}


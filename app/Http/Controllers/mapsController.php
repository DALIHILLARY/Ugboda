<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class mapsController extends Controller
{
        public function index(Request $request)
    {

        //get active reports from database
        //$activeCrimes =  DB::table("report")->where("progress","ACTIVE")->get();

        return view('map.index');
    }


}

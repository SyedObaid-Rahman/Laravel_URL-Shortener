<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserIpfilter extends Controller
{
    //

    function ipfiler(Request $req){
        
        return $req->input();
    }
}

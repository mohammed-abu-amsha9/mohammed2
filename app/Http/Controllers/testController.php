<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    function test(Request $request){
        return response()->json($request);
    }
}

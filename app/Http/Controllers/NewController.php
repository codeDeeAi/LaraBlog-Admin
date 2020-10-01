<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function index(){

        return view('new');
    }

    public function test(){
        return response()->json([
            'msg' => 'some err occured'
        ], 422);
    }
}

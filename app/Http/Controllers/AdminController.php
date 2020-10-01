<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addTag(Request $request){
        // Validation
        Tag::create([
            'name' => $request->name
        ]);
        
        // Redirect to page
        // return redirect('/admin-alltags');
    }
    public function getTag(){
        // Validation
        return Tag::all();
    }
}

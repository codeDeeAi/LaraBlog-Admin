<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addTag(Request $request){
        // Validation
        $this->validate($request, [
            'name' => 'required'
        ]);

        // Create new tag
        Tag::create([
            'name' => $request->name
        ]);
        
        // Redirect to page
        // return redirect('/admin-alltags');
    }
    public function getTag(){
        // Validation
        return Tag::orderBy('id', 'desc')->get();
    }

    public function editTag(Request $request){
        // Validation
        $this->validate($request, [
            'name' => 'required',
            'id' => 'required'
        ]);

        // Create new tag
        Tag::where('id', $request->id)->update([
            'name' => $request->name
        ]);
        
        // Redirect to page
        // return redirect('/admin-alltags');
    }
    public function deleteTag(){}
}

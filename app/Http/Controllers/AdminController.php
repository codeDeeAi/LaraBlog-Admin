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
        
    }
    public function getTag(){
        // Validation
        return Tag::orderBy('id', 'desc')->get();
    }

    public function editTag(Request $request){
        // Validation
        $this->validate($request, [
            'name' => 'required',
            'index' => 'required'
        ]);

        // Update tag
        Tag::where('id', $request->index)->update([
            'name' => $request->name
        ]);
        
    }
    public function deleteTag(Request $request){
         // Validation
         $this->validate($request, [
            'id' => 'required'
        ]);
         return Tag::where('id', $request->id)->delete();
    }
}

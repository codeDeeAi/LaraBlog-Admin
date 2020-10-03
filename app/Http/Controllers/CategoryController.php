<?php

namespace App\Http\Controllers;

use App\Category;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function upload(Request $request){
       
        if($request->hasFile('image')){
            // Validation starts
            if($request->file('image')->isValid()){
                // Required fields
                $validated = $request->validate([
                    'category'=>'string|max:50',
                    'image'=>'mimes:jpeg,png,jpg|max:8000',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['category'].".".$extension);
                $url = Storage::url($validated['category'].".".$extension);

                Category::create([
                    'categoryName'=>$request->category, 
                    'iconImage'=>$url,
                ]);
                
            }
        }
        else {
            abort(500, 'Could not upload image :(');
        }
    }

    public function viewCategories(){
        return Category::all();
    }

    public function editCategory(Request $request){
        $this->validate($request, [
            'category' => 'required',
            'id' => 'required'
        ]);

        // Update Category Name
        Category::where('id', $request->id)->update([
            'categoryName' => $request->category
        ]);

        // Return data after update
        // return Category::all();
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request){

        // Validation
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required|unique:users',
            'phone' => 'required|min:6|unique:users',            
            'email' => 'required|email|unique:users',
            'userType' => 'required',
            'password' => 'required|min:6',
            'password2' => 'required',
        ]);

        $password = bcrypt($request->pasword);

        $user = User::create([
            'email' => $request->email,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'password' => $password,
            'phone' => $request->phone,
            'userType' => $request->userType,
            'username' => $request->username
        ]);

    }

    protected function viewUsers(){
        return User::all();
    }

    public function editUsers(Request $request){
         // Validation
         $this->validate($request, [
            'lastName' => 'bail',
            'username' => "bail|unique:users,id,$request->id",
            'phone' => "bail|min:6|unique:users,id,$request->id",            
            'email' => "bail|email|unique:users,id,$request->id",
            'userType' => 'bail',
            'password' => 'bail|min:6',
            'password2' => 'bail',
        ]);

        // encryt password
        $password = bcrypt($request->pasword);
        // Update user
        User::where('id', $request->id)->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'email' => $request->email,
            'userType' => $request->userType,
            'password' => $password
        ]);

      
 }


 public function deleteUser(Request $request){
    $this->validate($request, [
        'id' => 'required',            
        'email' => 'required',
        'phone' => 'required',
        'username' => 'required',
    ]);

    
     User::where('id', $request->id)->delete();
 }




}
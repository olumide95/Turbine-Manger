<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserController extends Controller
{
     


    public function index()
    {
    	$users = User::get();

    	return view('users',compact('users'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data['name'] = $request->firstname.' '.$request->lastname;
            $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        ]);
        $role_user =  \App\Models\RoleUser::insert(['user_id'=>$user->id,'role_id'=>$data['role']]);
        return redirect()->back()->with('message','User added succesfully');
    }



}

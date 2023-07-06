<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

       $roles = Role::all();

        return view('user.index' , compact('users','roles'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $validatedata = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string',
        ]);

        $users= new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();
        return redirect()->route('users.index')->with('success','User created successfully');


    }

    public function edit($id){

      $users = User::findOrFail($id);   
        return view('user.edit',compact('users'));

    }

    public function update(User $user,Request $request){
        $validatedata= $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index')->with('success','User updated successfully');


    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');

    }

   
}

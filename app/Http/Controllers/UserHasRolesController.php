<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserHasRoles;
use Illuminate\Http\Request;

class UserHasRolesController extends Controller
{
    public function store(Request $request){

        $userhasroles= UserHasRoles::where('user_id', $request->user_id)->delete();

        if(is_array($request->roles)){
      
            foreach ($request->roles as $role) {
             $userhasroles=new UserHasRoles();
             $userhasroles->user_id=$request->user_id;
                $userhasroles->role_id=$role;
                $userhasroles->save();
                  
            }
            return redirect()->route('users.index')->with('success','User has role Updated!');
        }
        return redirect()->route('users.index')->with('success','User has role Updated!');
    }

    public function getUserRoles(User $user){
        $userhasroles=$user->roles->pluck('id')->toArray();
        return response()->json($userhasroles);
    }
}

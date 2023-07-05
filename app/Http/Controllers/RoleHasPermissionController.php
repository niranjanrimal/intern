<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\RoleHasPermission;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



    $roles= RoleHasPermission::where('role_id', $request->role_id)->delete();

            foreach ($request->permissions as $permission) {
                $rolehaspermission= RoleHasPermission::where('role_id', $request->role_id)->where('permission_id', $permission)->first();
                if($rolehaspermission){
                    $rolehaspermission->delete();
                }
                $roleHasPermission = new RoleHasPermission();
                $roleHasPermission->role_id = $request->role_id;
                $roleHasPermission->permission_id = $permission;
                $roleHasPermission->save();
            
    }
        return redirect()->route('roles.index')->with('success','Role has permission added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleHasPermission $roleHasPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleHasPermission $roleHasPermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleHasPermission $roleHasPermission)
    {
//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleHasPermission $roleHasPermission)
    {
        //
    }


    public function getRolePermissions(Role $role){
        $permissions = $role->permissions->pluck('id')->toArray();
        return response()->json($permissions);
    }

    
}
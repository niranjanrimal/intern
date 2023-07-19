<?php

namespace App\Http\Controllers;

use App\Models\permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware(['permission:read_post'])->only('index');
        $this->middleware(['permission:create_role'])->only('create');
        $this->middleware(['permission:update_role'])->only('edit');
        $this->middleware(['permission:delete_role'])->only('destroy');
    }
    public function index()
    {
        $roles=Role::all();
        $permissions=Permission::all();
        return view('role.index',compact('roles','permissions'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate= $request->validate([
            'title'=>'required',
            'name'=>'required'
        ]);

        
    

        $roles = new Role();
        $roles->title = $request->title;
        $roles->name = $request->name;
    
        

        $roles->save();

        return redirect()->route('roles.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'title'=>'required',
            'name'=>'required'
        ]);

        
        $role->title = $request->title;
        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success','Role deleted successfully');
    }
}

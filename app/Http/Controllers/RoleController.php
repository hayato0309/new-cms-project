<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Permission;
use App\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(){

        $roles = DB::table('roles')->paginate(10);

        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function store(){

        request()->validate([

            'name' => 'required|unique:roles'

        ]);

        Role::create([

            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
            // 'slug' => Str::slug(Str::lower(request('name')), '-')
            // この書き方も可（公式ドキュメントはこの表記法）
        ]);

        $role = Role::latest('created_at')->first();

        session()->flash('role-created-message', 'Role was created : ' . $role->name);

        return back();
    }

    public function edit(Role $role){

        $permissions = Permission::all();

        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=>$permissions
            ]);
    }

    public function update(Role $role){

        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');


        if($role->isDirty('name')){

            session()->flash('role-updated-message', 'Role was updated : ' . $role->name);
            $role->save();

        } else {

            session()->flash('role-not-updated-message', 'Nothing has been updated.');

        }

        return back();
    }

    public function attach_permission(Role $role){

        $role->permissions()->attach(request('permission'));

        return back();
    }

    public function detach_permission(Role $role){

        $role->permissions()->detach(request('permission'));

        return back();
    }

    public function destroy(Role $role){

        $role->delete();

        session()->flash('role-deleted-message', 'Role was deleted : ' . $role->name);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index(){

        $permissions = DB::table('permissions')->paginate(10);

        return view('admin.permissions.index', ['permissions'=>$permissions]);
    }

    public function store(Permission $permission){

        request()->validate([

            'name' => 'required|unique:permissions'

        ]);

        Permission::create([

            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
            // 'slug' => Str::slug(Str::lower(request('name')), '-')
            // この書き方も可（公式ドキュメントはこの表記法）
        ]);

        $permission = Permission::latest('created_at')->first();

        session()->flash('permission-created-message', 'Permission was created : ' . $permission->name);

        return back();
    }

    public function edit(Permission $permission){

        return view('admin.permissions.edit', ['permission'=>$permission]);
    }

    public function update(Permission $permission){

        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-');

        if($permission->isDirty('name')){

            session()->flash('permission-updated-message', 'Permission was updated : ' . $permission->name);
            $permission->save();

        } else {

            session()->flash('permission-not-updated-message', 'Nothing has been updated.');

        }

        return back();
    }

    public function destroy(Permission $permission){

        $permission->delete();

        return back();
    }
}

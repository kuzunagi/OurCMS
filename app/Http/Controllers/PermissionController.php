<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function create()
    {
        return view();
    }

    public function store(PermissionRequest $request)
    {
        $name = $request->only('name');
        Permission::create([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);
    }

    public function edit($id)
    {
        return view();
    }

    public function update(PermissionRequest $request, $id)
    {
        $name = $request->only('name');
        $permission = Permission::find($id);
        $permission->name = $name;
        $permission->slug = Str::slug($name);
    }

    public function softDelete($id)
    {
        $permission = Permission::find($id);
        $permissionName = $permission->name;
        $permission->trashed();

        return back()->withSuccess($permissionName . ' has been trashed');
    }

    public function permDelete($id)
    {
        $permission = Permission::find($id);
        $permissionName = $permission->name;
        $permission->forceDelete();

        return back()->withSuccess($permissionName . ' has been permanenty delete');
    }
}

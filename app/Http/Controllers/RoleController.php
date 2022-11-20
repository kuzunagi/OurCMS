<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function create()
    {
        return view();
    }

    public function store(RoleRequest $request)
    {
        $name = $request->only('name');
        Role::create([
            'name' => $name,
            'slug' => Str::slug($name)
        ]);
    }

    public function edit($id)
    {
        return view();
    }

    public function update(RoleRequest $request, $id)
    {
        $name = $request->only('name');
        $role = Role::find($id);
        $role->name = $name;
        $role->slug = Str::slug($name);
    }

    public function softDelete($id)
    {
        $role = Role::find($id);
        $roleName = $role->name;
        $role->trashed();

        return back()->withSuccess($roleName . ' has been trashed');
    }

    public function permDelete($id)
    {
        $role = Role::find($id);
        $roleName = $role->name;
        $role->forceDelete();

        return back()->withSuccess($roleName . ' has been permanenty delete');
    }
}

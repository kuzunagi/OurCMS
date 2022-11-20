<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view();
    }

    public function store(UserStoreRequest $request)
    {

        User::create([
            'name' => $request->only('name'),
            'username' => $request->only('username'),
            'email' => $request->only('email'),
            'role_id' => $request->only('role_id'),
            'password' => Str::random(12),
            'image' => 'default'
        ]);
    }

    public function edit($id)
    {
        return view();
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $name = $request->only('name');
        $user = User::find($id);
        $user->name = $name;
        $user->slug = Str::slug($name);
    }

    public function softDelete($id)
    {
        $user = User::find($id);
        $username = $user->name;
        $user->trashed();

        return back()->withSuccess($username . ' has been trashed');
    }

    public function permDelete($id)
    {
        $user = User::find($id);
        $username = $user->username;
        $user->forceDelete();

        return back()->withSuccess($username . ' has been permanenty delete');
    }
}

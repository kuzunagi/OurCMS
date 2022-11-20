<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterNewUser extends Controller
{
    public function create()
    {
        return view();
    }

    public function store(RegisterRequest $request)
    {
        Auth::login($request->store);

        return redirect($this->site_settings->select('value')->where('name', 'defaultRedirect')->get());
    }
}

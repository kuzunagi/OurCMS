<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'countUserRegistered' => User::all()->count(),
            'dayUniqueUser' => User::where('created_at', today())->count()
        ];
        return view('', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('layouts.admin.home', compact('user'));
    }
}

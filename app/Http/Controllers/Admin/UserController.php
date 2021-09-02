<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('role', 'user')->get();

        return view('layouts.admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('layouts.admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'      => 'required',
                'email'     => 'required|unique:users',
                'password'  => 'required',
            ],
            [
                'name.required'         => 'Enter Username',
                'email.required'        => 'Enter Email',
                'email.unique'          => 'Email Sudah Ada',
                'password.required'     => 'Enter Password',
            ]
        );

        $user = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = Hash::make($request->password);
        $user->role         = 'user';
        $user->save();

        Session::flash('message', 'User created successfully');
        return redirect('/admin/user');
    }

    public function edit($id)
    {
        $user         = User::where('id', $id)->get();

        return view('layouts.admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name'      => 'required',
            ],
            [
                'name.required'         => 'Enter Username',
            ]
        );

        User::where('id', $id)->update([
            'name'   => $request->name,
        ]);

        Session::flash('message', 'User updated successfully');
        return redirect('/admin/user');
    }

    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();

        Session::flash('delete-message', 'User deleted successfully');
        return redirect('/admin/user');
    }
}

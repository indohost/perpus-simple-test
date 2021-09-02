<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\RegistrationBook;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('layouts.user.home', compact('user'));
    }

    public function books()
    {
        $books      = Book::orderBy('id', 'DESC')->get();
        $regBooks   = RegistrationBook::orderBy('id', 'DESC')->get();

        return view('layouts.user.books.index', compact('books', 'regBooks'));
    }
}

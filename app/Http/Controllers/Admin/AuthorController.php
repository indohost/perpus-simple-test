<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Session;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('id', 'DESC')->get();

        return view('layouts.admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('layouts.admin.authors.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'a_name'        => 'required',
                'a_address'     => 'required',
                'a_telpn'       => 'required',
            ],
            [
                'a_name.required'       => 'Enter Name',
                'a_address.required'    => 'Enter Address',
                'a_telpn.required'      => 'Enter Telpn',
            ]
        );

        $author = new Author();
        $author->a_name       = $request->a_name;
        $author->a_address    = $request->a_address;
        $author->a_telpn      = $request->a_telpn;
        $author->save();

        Session::flash('message', 'Author created successfully');
        return redirect('/admin/author');
    }

    public function edit($id)
    {
        $author         = Author::where('id', $id)->get();

        return view('layouts.admin.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'a_name'        => 'required',
                'a_address'     => 'required',
                'a_telpn'       => 'required',
            ],
            [
                'a_name.required'       => 'Enter Name',
                'a_address.required'    => 'Enter Address',
                'a_telpn.required'      => 'Enter Telpn',
            ]
        );

        Author::where('id', $id)->update([
            'a_name'    => $request->a_name,
            'a_address' => $request->a_address,
            'a_telpn'   => $request->a_telpn,
        ]);

        Session::flash('message', 'Author updated successfully');
        return redirect('/admin/author');
    }

    public function destroy($id)
    {
        Author::where('id', $id)->delete();

        Session::flash('delete-message', 'Author deleted successfully');
        return redirect('/admin/author');
    }
}

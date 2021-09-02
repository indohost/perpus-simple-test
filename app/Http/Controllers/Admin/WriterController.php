<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;
use Session;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::orderBy('id', 'DESC')->get();

        return view('layouts.admin.writers.index', compact('writers'));
    }

    public function create()
    {
        return view('layouts.admin.writers.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'w_name'        => 'required',
                'w_address'     => 'required',
                'w_telpn'       => 'required',
            ],
            [
                'w_name.required'       => 'Enter Name',
                'w_address.required'    => 'Enter Address',
                'w_telpn.required'      => 'Enter Telpn',
            ]
        );

        $writer = new Writer();
        $writer->w_name       = $request->w_name;
        $writer->w_address    = $request->w_address;
        $writer->w_telpn      = $request->w_telpn;
        $writer->save();

        Session::flash('message', 'Writer created successfully');
        return redirect('/admin/writer');
    }

    public function edit($id)
    {
        $writer         = Writer::where('id', $id)->get();

        return view('layouts.admin.writers.edit', compact('writer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'w_name'        => 'required',
                'w_address'     => 'required',
                'w_telpn'       => 'required',
            ],
            [
                'w_name.required'       => 'Enter Name',
                'w_address.required'    => 'Enter Address',
                'w_telpn.required'      => 'Enter Telpn',
            ]
        );

        Writer::where('id', $id)->update([
            'w_name'    => $request->w_name,
            'w_address' => $request->w_address,
            'w_telpn'   => $request->w_telpn,
        ]);

        Session::flash('message', 'Writer updated successfully');
        return redirect('/admin/writer');
    }

    public function destroy($id)
    {
        Writer::where('id', $id)->delete();

        Session::flash('delete-message', 'Writer deleted successfully');
        return redirect('/admin/writer');
    }
}

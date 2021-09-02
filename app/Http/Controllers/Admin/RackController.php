<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rack;
use Illuminate\Http\Request;
use Session;

class RackController extends Controller
{
    public function index()
    {
        $racks = Rack::orderBy('id', 'DESC')->get();

        return view('layouts.admin.racks.index', compact('racks'));
    }

    public function create()
    {
        $data_kode = Rack::max('r_kode');
        
        $no_transaksi = $data_kode;
        $kode      = (int) substr($no_transaksi, 4, 4);
        $kode++;

        $kd_first  = "RK";
        $no_transaksi = $kd_first . sprintf("%04s", $kode);

        return view('layouts.admin.racks.create', compact('no_transaksi'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'r_location'    => 'required',
            ],
            [
                'r_location.required'   => 'Enter Location',
            ]
        );

        $data_kode = Rack::max('r_kode');
        $no_transaksi = $data_kode;
        $kode      = (int) substr($no_transaksi, 4, 4);
        $kode++;

        $kd_first  = "RK";
        $no_transaksi = $kd_first . sprintf("%04s", $kode);

        $rack = new Rack();
        $rack->r_kode       = $no_transaksi;
        $rack->r_location   = $request->r_location;
        $rack->save();

        Session::flash('message', 'Rack created successfully');
        return redirect('/admin/rack');
    }

    public function edit($id)
    {
        $rack         = Rack::where('id', $id)->get();

        return view('layouts.admin.racks.edit', compact('rack'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'r_location'    => 'required',
            ],
            [
                'r_location.required'   => 'Enter Location',
            ]
        );

        Rack::where('id', $id)->update([
            'r_location'    => $request->r_location,
        ]);

        Session::flash('message', 'Rack updated successfully');
        return redirect('/admin/rack');
    }

    public function destroy($id)
    {
        Rack::where('id', $id)->delete();

        Session::flash('delete-message', 'Rack deleted successfully');
        return redirect('/admin/rack');
    }
}

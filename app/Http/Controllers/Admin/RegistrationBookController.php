<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Rack;
use App\Models\RegistrationBook;
use Illuminate\Http\Request;

use Auth;
use Session;

class RegistrationBookController extends Controller
{
    public function index()
    {
        $regBooks = RegistrationBook::orderBy('id', 'DESC')->get();

        return view('layouts.admin.regBook.index', compact('regBooks'));
    }

    public function create()
    {
        $books     = Book::orderBy('b_title', 'ASC')->get();
        $racks     = Rack::orderBy('r_kode', 'ASC')->get();
        
        $data_kode = RegistrationBook::max('r_kode');
        
        $no_transaksi = $data_kode;
        $kode      = (int) substr($no_transaksi, 4, 4);
        $kode++;

        $kd_first  = "RB";
        $no_transaksi = $kd_first . sprintf("%04s", $kode);
        
        return view('layouts.admin.regBook.create', compact('books', 'racks', 'no_transaksi'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'book_id'   => 'required',
                'rack_id'   => 'required',
            ],
            [
                'book_id.required'  => 'Enter Buku',
                'rack_id.required'  => 'Enter Rak',
            ]
        );

        $data_kode = RegistrationBook::max('r_kode');
        
        $no_transaksi = $data_kode;
        $kode      = (int) substr($no_transaksi, 4, 4);
        $kode++;

        $kd_first  = "RB";
        $no_transaksi = $kd_first . sprintf("%04s", $kode);

        $regBook = new RegistrationBook();
        $regBook->user_id      = Auth::id();
        $regBook->r_kode       = $no_transaksi;
        $regBook->book_id      = $request->book_id;
        $regBook->rack_id      = $request->rack_id;
        $regBook->save();

        Session::flash('message', 'Registrasi Book created successfully');
        return redirect('/admin/regBook');
    }

    public function edit($id)
    {
        $regBook    = RegistrationBook::where('id', $id)->get();
        $books      = Book::orderBy('b_title', 'ASC')->get();
        $racks      = Rack::orderBy('r_kode', 'ASC')->get();

        return view('layouts.admin.regBook.edit', compact('regBook', 'books', 'racks'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'book_id'   => 'required',
                'rack_id'   => 'required',
            ],
            [
                'book_id.required'  => 'Enter Buku',
                'rack_id.required'  => 'Enter Rak',
            ]
        );

        RegistrationBook::where('id', $id)->update([
            'book_id'   => $request->book_id,
            'rack_id'   => $request->rack_id,
        ]);

        Session::flash('message', 'Registrasi Book updated successfully');
        return redirect('/admin/regBook');
    }

    public function destroy($id)
    {
        RegistrationBook::where('id', $id)->delete();

        Session::flash('delete-message', 'Registrasi Book deleted successfully');
        return redirect('/admin/regBook');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Image;
use Session;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();

        return view('layouts.admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::orderBy('a_name', 'ASC')->get();
        $writers = Writer::orderBy('w_name', 'ASC')->get();

        return view('layouts.admin.books.create', compact('authors', 'writers'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'b_title'               => 'required|unique:books',
                'b_year'                => 'required',
                'b_qty'                 => 'required',
                'b_date_procurement'    => 'required',
                'author_id'             => 'required',
                'writer_id'             => 'required',
                'images'                => 'required|mimes:jpg,jpeg,png|max:5240',
            ],
            [
                'b_title.required'              => 'Enter Judul',
                'b_title.unique'                => 'Judul Sudah ada',
                'b_year.required'               => 'Enter Tahun Terbit',
                'b_qty.required'                => 'Enter Jumlah Buku',
                'b_date_procurement.required'   => 'Enter Tanggal Pengadaan',
                'author_id.required'            => 'Enter Pengarang',
                'writer_id.required'            => 'Enter Penulis',
                'images.required'               => 'Enter Image Cover',
                'images.max'                    => 'Maximal Size 5 Mb',
            ]
        );

        if ($request->hasFile('images')) {
            $resorce                    = $request->file('images');
            $file_name                  = time() . '.' . $resorce->extension();

            $filePath       = public_path('storage/books');

            $book = new Book();
            $book->user_id                  = Auth::id();
            $book->b_title                  = $request->b_title;
            $book->b_year                   = $request->b_year;
            $book->b_qty                    = $request->b_qty;
            $book->b_date_procurement       = $request->b_date_procurement;
            $book->author_id                = $request->author_id;
            $book->writer_id                = $request->writer_id;
            $book->b_image                  = $file_name;
            $save = $book->save();

            if ($save) {
                // Image
                $resized_img  = Image::make($resorce);
                $resized_img->resize(310, 600);
                $resized_img->save($filePath . '/' . $file_name);

                Session::flash('message', 'Book created successfully');
                return redirect('/admin/book');
            }
           
        } else {
            return back();
        }
    }

    public function edit($id)
    {
        $book       = Book::where('id', $id)->get();
        $authors    = Author::orderBy('a_name', 'ASC')->get();
        $writers    = Writer::orderBy('w_name', 'ASC')->get();

        return view('layouts.admin.books.edit', compact('book', 'authors', 'writers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'b_year'                => 'required',
                'b_qty'                 => 'required',
                'b_date_procurement'    => 'required',
            ],
            [
                'b_year.required'               => 'Enter Tahun Terbit',
                'b_qty.required'                => 'Enter Jumlah Buku',
                'b_date_procurement.required'   => 'Enter Tanggal Pengadaan',
            ]
        );

        Book::where('id', $id)->update([
            'b_year'                => $request->b_year,
            'b_qty'                 => $request->b_qty,
            'b_date_procurement'    => $request->b_date_procurement,
            'author_id'             => $request->author_id,
            'writer_id'             => $request->writer_id,
        ]);

        Session::flash('message', 'Book updated successfully');
        return redirect('/admin/book');
    }

    public function destroy($id)
    {
        Book::where('id', $id)->delete();

        Session::flash('delete-message', 'Book deleted successfully');
        return redirect('/admin/book');
    }
}

@extends('layouts.app')

@section('stylesheets')
    <!-- Custom styles for this page -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection()

@section('navbar')
    @include('layouts.admin.navbar');
@endsection()

@section('title')
    Buku
@endsection()

@section('content')
    <div class="container">
        <!-- DataTables -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                <a href="{{ url('admin/book/create') }}" class="btn btn-sm btn-primary float-right"><i
                        class="fa fa-plus"></i>
                    Tambah Baru</a>
            </div>
            <div class="card-body">

                {{-- Alert --}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xl-12">
                        @if (Session::has('message'))
                            <div class="alert alert-success background-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>{{ Session('message') }}</strong>
                            </div>
                        @endif

                        @if (Session::has('delete-message'))
                            <div class="alert alert-danger background-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>{{ Session('delete-message') }}</strong>
                                </br>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- Table --}}
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cover</th>
                                <th>Judul</th>
                                <th>Tahun Terbit </th>
                                <th>Jumlah Buku</th>
                                <th>Tanggal Pengadaan</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Dibuat Oleh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Cover</th>
                                <th>Judul</th>
                                <th>Tahun Terbit </th>
                                <th>Jumlah Buku</th>
                                <th>Tanggal Pengadaan</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Dibuat Oleh</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ asset('storage/books/' . $book->b_image) }}" alt=""
                                            class="___class_+?17___" style="width:160px; height:220px;">
                                    </td>
                                    <td>{{ $book->b_title }}</td>
                                    <td>{{ $book->b_year }}</td>
                                    <td>{{ $book->b_qty }}</td>
                                    <td>{{ $book->b_date_procurement }}</td>
                                    <td>{{ $book->author->a_name }}</td>
                                    <td>{{ $book->writer->w_name }}</td>
                                    <td>{{ $book->user->name }}</td>
                                    <td>
                                        <a href="/admin/book/edit/{{ $book->id }}" type="button"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                        <a href="/admin/book/delete/{{ $book->id }}" type="button"
                                            class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection()

@section('js')
    <!-- Page custom scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $('#dataTable').DataTable();
    </script>
@endsection()

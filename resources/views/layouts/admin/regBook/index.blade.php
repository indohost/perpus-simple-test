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
    Registrasi Buku
@endsection()

@section('content')
    <div class="container">
        <!-- DataTables -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Registrasi Buku</h6>
                <a href="{{ url('admin/regBook/create') }}" class="btn btn-sm btn-primary float-right"><i
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
                                <th>Kode Registrasi</th>
                                <th>Buku</th>
                                <th>Rak</th>
                                <th>Dibuat Oleh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Kode Registrasi</th>
                                <th>Buku</th>
                                <th>Rak</th>
                                <th>Dibuat Oleh</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($regBooks as $regBook)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $regBook->r_kode }}</td>
                                    <td>{{ $regBook->book->b_title }}</td>
                                    <td>{{ $regBook->rack->r_kode }}</td>
                                    <td>{{ $regBook->user->name }}</td>
                                    <td>
                                        <a href="/admin/regBook/edit/{{ $regBook->id }}" type="button"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>

                                        <a href="/admin/regBook/delete/{{ $regBook->id }}" type="button"
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

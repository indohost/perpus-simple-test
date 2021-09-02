@extends('layouts.app')

@section('title')
    Buku
@endsection()

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Buku</h6>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    @foreach ($book as $d)
                        <form role="form" action="/admin/book/update/{{ $d->id }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" id="" disabled name="b_title" value="{{ $d->b_title }}" required="required"
                                    class="form-control" placeholder="Enter Judul">
                                @if ($errors->has('b_title'))
                                    <span class="help-block text-danger">{!! $errors->first('b_title') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="text" id="" name="b_year" value="{{ $d->b_year }}" required="required"
                                    class="form-control" placeholder="Enter Tahun Terbit">
                                @if ($errors->has('b_year'))
                                    <span class="help-block text-danger">{!! $errors->first('b_year') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Jumlah Buku</label>
                                <input type="number" id="" name="b_qty" value="{{ $d->b_qty }}" required="required"
                                    class="form-control" placeholder="Enter Jumlah Buku">
                                @if ($errors->has('b_qty'))
                                    <span class="help-block text-danger">{!! $errors->first('b_qty') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pengadaan</label>
                                <input type="date" id="" name="b_date_procurement" value="{{ $d->b_date_procurement }}"
                                    required="required" class="form-control" placeholder="Enter Tanggal Pengadaan">
                                @if ($errors->has('b_date_procurement'))
                                    <span class="help-block text-danger">{!! $errors->first('b_date_procurement') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <select class="form-control" name="author_id" id="exampleFormControlSelect1"
                                    required="required">
                                    <option hidden value="{{ $d->author_id }}">-- Pilih Pengarang --</option>
                                    @foreach ($authors as $d)
                                        <option value="{{ $d->id }}">{{ $d->a_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('a_name'))
                                    <span class="help-block text-danger">{!! $errors->first('a_name') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <select class="form-control" name="writer_id" id="exampleFormControlSelect1"
                                    required="required">
                                    <option hidden value="{{ $d->writer_id }}">-- Pilih Penulis --</option>
                                    @foreach ($writers as $d)
                                        <option value="{{ $d->id }}">{{ $d->w_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('w_name'))
                                    <span class="help-block text-danger">{!! $errors->first('w_name') !!}</span>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/book" class="btn btn-primary" type="button">Cancel</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection()

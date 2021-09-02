@extends('layouts.app')

@section('title')
    Registrasi Buku
@endsection()

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Registrasi Buku</h6>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <form role="form" action="/admin/regBook/store" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Kode Registrasi</label>
                            <input type="text" id="" disabled name="r_kode" value="{{ $no_transaksi }}" required="required"
                                class="form-control" placeholder="Enter Kode Registrasi">
                            @if ($errors->has('r_kode'))
                                <span class="help-block text-danger">{!! $errors->first('r_kode') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Buku</label>
                            <select class="form-control" name="book_id" id="exampleFormControlSelect1"
                                required="required">
                                <option hidden>-- Pilih Buku --</option>
                                @foreach ($books as $d)
                                    <option value="{{ $d->id }}">{{ $d->b_title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('b_title'))
                                <span class="help-block text-danger">{!! $errors->first('b_title') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Rak</label>
                            <select class="form-control" name="rack_id" id="exampleFormControlSelect1"
                                required="required">
                                <option hidden>-- Pilih Rak --</option>
                                @foreach ($racks as $d)
                                    <option value="{{ $d->id }}">{{ $d->r_kode }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('rack_id'))
                                <span class="help-block text-danger">{!! $errors->first('rack_id') !!}</span>
                            @endif
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="/admin/regBook" class="btn btn-primary" type="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()

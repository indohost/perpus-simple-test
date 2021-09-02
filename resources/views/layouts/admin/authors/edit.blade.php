@extends('layouts.app')

@section('title')
    Pengarang
@endsection()

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pengarang</h6>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    @foreach ($author as $d)
                        <form role="form" action="/admin/author/update/{{ $d->id }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="" name="a_name" value="{{ $d->a_name }}" required="required"
                                    class="form-control" placeholder="Enter Name">
                                @if ($errors->has('a_name'))
                                    <span class="help-block text-danger">{!! $errors->first('a_name') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" id="" name="a_address" value="{{ $d->a_address }}" required="required"
                                    class="form-control" placeholder="Enter Name">
                                @if ($errors->has('a_address'))
                                    <span class="help-block text-danger">{!! $errors->first('a_address') !!}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" id="" name="a_telpn" value="{{ $d->a_telpn }}" required="required"
                                    class="form-control" placeholder="Enter Nomor Telepon">
                                @if ($errors->has('a_telpn'))
                                    <span class="help-block text-danger">{!! $errors->first('a_telpn') !!}</span>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/author" class="btn btn-primary" type="button">Cancel</a>
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

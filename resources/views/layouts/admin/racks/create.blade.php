@extends('layouts.app')

@section('title')
    Rak
@endsection()

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Rak</h6>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <form role="form" action="/admin/rack/store" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Kode Rak</label>
                            <input type="text" id="" disabled name="r_kode" value="{{ $no_transaksi }}" required="required"
                                class="form-control" placeholder="Enter Kode">
                            @if ($errors->has('r_kode'))
                                <span class="help-block text-danger">{!! $errors->first('r_kode') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" id="" name="r_location" value="{{ old('r_location') }}" required="required"
                                class="form-control" placeholder="Enter Lokasi">
                            @if ($errors->has('r_location'))
                                <span class="help-block text-danger">{!! $errors->first('r_location') !!}</span>
                            @endif
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="/admin/rack" class="btn btn-primary" type="button">Cancel</a>
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

@extends('layouts.app')

@section('title')
    User
@endsection()

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    @foreach ($user as $d)
                        <form role="form" action="/admin/user/update/{{ $d->id }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" id="" name="name" value="{{ $d->name }}" required="required"
                                    class="form-control" placeholder="Enter Name">
                                @if ($errors->has('name'))
                                    <span class="help-block text-danger">{!! $errors->first('name') !!}</span>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/user" class="btn btn-primary" type="button">Cancel</a>
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

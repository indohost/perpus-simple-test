@extends('layouts.app')

@section('title')
    User
@endsection()

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <form role="form" action="/admin/user/store" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="" name="name" value="{{ old('name') }}" required="required"
                                class="form-control" placeholder="Enter Title">
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">{!! $errors->first('name') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" id="" name="email" value="{{ old('email') }}" required="required"
                                class="form-control" placeholder="Enter Email">
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">{!! $errors->first('email') !!}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" id="" name="password" value="{{ old('password') }}" required="required"
                                class="form-control" placeholder="Enter Level Password">
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">{!! $errors->first('password') !!}</span>
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
                </div>
            </div>
        </div>
    </div>
@endsection()

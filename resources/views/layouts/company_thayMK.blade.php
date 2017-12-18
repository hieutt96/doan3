@extends('layouts.company_site_layout')

@section('left-nav')
    <div class="row" style="margin-left: 20px">
        <h3><a href="{{URL::previous()}}"><div class="glyphicon glyphicon-arrow-left"></div>&nbsp;Trở lại</a></h3>
    </div>
@endsection

@section('content')
    <div class="row col-lg-offset-1 ">
        <b><h2 class="heading" style="margin-left:100px;">Đổi Mật Khẩu</h2></b>
    </div>
    <hr style="border-width: 2px;" class="col-lg-offset-1 ">
    <div>
        <form class="form-info" method="POST" action="/{{$userType}}/thay-mk">
            {{ csrf_field() }}
            <div>
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-4">
                        @if(session('thongbao'))
                            <div style="width:325px;" class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label">Tài khoản:</label>
                            <input type="email" name="email" disabled class="form-control"
                                   value="{!!Auth::user()->email!!}"/>
                        </div>
                        <div class="form-group {{$errors->has('old_password')?'has-error' :''}} ">
                            <label class="control-label">Mật khẩu cũ:</label>
                            <input type="password" name="old_password" class="form-control">
                            @if ($errors->has('old_password') && Hash::check(Input::get('old_password'),Auth::user()->password))
                                <span class="help-block">
	                                <strong>{{ $errors->first('old_password') }}</strong>
	                            </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('new_password')?'has-error' :''}} ">
                            <label class="control-label">Mật khẩu mới:</label>
                            <input type="password" name="new_password" class="form-control">
                            @if ($errors->has('new_password'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('new_password') }}</strong>
	                            </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('re_password')?'has-error' :''}}">
                            <label class="control-label">Nhập lại mật khẩu :</label>
                            <input type="password" name="re_password" class="form-control">
                            @if ($errors->has('re_password'))
                                <span class="help-block">
	                                <strong>{{ $errors->first('re_password') }}</strong>
	                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <button type="submit" style="margin-left:105px;" class="col-lg-offset-1 btn btn-success  ">Thay
                        đổi
                    </button>
                    <button type="reset" class="btn btn-outline-danger">Làm mới</button>
                </div>
                <br>
            </div>
        </form>
    </div>
@endsection
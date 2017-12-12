@extends('layouts.company_site_layout')

@section('top-nav')
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, {{$userType}}'s name <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/{{$userType}}/thong-bao">Thông báo</a></li>
                        <li><a href="#">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section('left-nav')
    {{--<h2><b>Chi Tiết Thông Báo</b></h2>--}}
@endsection

@section('content')
    <div class="row">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <h1><b>{{$noti->ten_tb}}</b></h1>
                </div>
                <div class="row">
                    <h4><i>{{date('d M Y', strtotime($noti->created_at))}} - Người gửi: {{$noti->user->name}}</i></h4>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <br>
            {{$noti->noi_dung}}
        </div>

    </div>
@endsection
@extends('layouts.company_site_layout')

@section('top-nav')
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, {{Auth::user()->name}} <b
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
    <h2><b>Thông Báo</b></h2>
@endsection

@section('content')
    @foreach($notices as $noti)
        <div class="row" style="padding-bottom: 10px">
            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <div class="datePost">
                            {{date('d', strtotime($noti->created_at))}}</div>
                        </div>
                    <div class="row">
                        <div class="monthPost">
                            {{date('M Y', strtotime($noti->created_at))}}</div>
                        </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <h4><b>{{$noti->ten_tb}}</b></h4>
                    </div>
                    <div class="row">
                        <h5>Người gửi: {{$noti->user->name}}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>{{substr($noti->noi_dung,0,200)}} ...
                        <a href="/{{$userType}}/thong-bao/{{$noti->id}}/chi-tiet"><b><u>Xem Tiếp</u></b></a>
                    </p>
                </div>

            </div>
        </div>
    @endforeach
@endsection
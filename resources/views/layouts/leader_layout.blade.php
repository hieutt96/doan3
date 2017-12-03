@extends('layouts.company_site_layout')

@section('top-nav')
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, {{Auth::user()->name}} <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/leader/thong-bao">Thông báo</a></li>
                        <li><a href="/dang-xuat">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section('left-nav')
    <ul class="nav nav-pills nav-stacked" style="background-color: #e7e7e7">
        <li role="presentation"><h3>Dash Board</h3></li>
        <li role="presentation"
            @if($tab == 1 or $tab == 11 or $tab == 12 or $tab == 13)
            class="active"
                @endif><a href="/leader/sv">Sinh Viên</a></li>
        <li role="presentation"
            @if($tab == 2)
            class="active"
                @endif><a href="/leader/tao-cong-viec">Tạo Công Việc</a></li>
        <li role="presentation"
            @if($tab == 3)
            class="active"
                @endif><a href="/leader/danh-gia-sv">Đánh Giá Sinh Viên</a></li>
        <li role="presentation"
            @if($tab == 4)
            class="active"
                @endif><a href="/leader/gui-thong-bao">Gửi Thông báo</a></li>

    </ul>
@endsection
@extends('layouts.company_site_layout')

@section('top-nav')
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, PM's name <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/pm/thong-bao">Thông báo</a></li>
                        <li><a href="#">Đăng xuất</a></li>
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
                @endif><a href="/pm/sv">Sinh Viên</a></li>
        <li role="presentation"
            @if($tab == 2 or $tab == 21 or $tab == 22)
            class="active"
                @endif><a href="/pm/nv">Nhân Viên</a></li>
        {{--<li role="presentation"--}}
        {{--@if($tab == 3)--}}
        {{--class="active"--}}
        {{--@endif><a href="/pm/3">Bài viết</a></li>--}}
        <li role="presentation"
            @if($tab == 3)
            class="active"
                @endif><a href="/pm/phan-cong-leader">Phân công Leader</a>
        </li>
        <li role="presentation"
            @if($tab == 4)
            class="active"
                @endif><a href="/pm/gui-thong-bao">Gửi Thông báo</a></li>


    </ul>
@endsection
@extends('layouts.company_site_layout')

@section('left-nav')
    <ul class="nav nav-pills nav-stacked menu1">
        <li role="presentation"><h3>Dash Board</h3></li>
        <li role="presentation"
            @if($tab == 1 or $tab == 11 or $tab == 12 or $tab == 13)
            class="active"
                @endif><a href="/pm/sv">Sinh Viên</a></li>
        <li role="presentation"
            @if($tab == 2 or $tab == 21 or $tab == 22)
            class="active"
                @endif><a href="/pm/nv">Nhân Viên</a></li>
        <li role="presentation"
            @if($tab == 3)
            class="active"
                @endif><a href="/pm/phan-cong-leader">Phân công Leader</a>
        </li>
        <li role="presentation"
            @if($tab == 4)
            class="active"
                @endif><a href="/pm/thong-bao">Thông Báo</a></li>
        <li role="presentation"
            @if($tab == 5)
            class="active"
                @endif><a href="/pm/gui-thong-bao">Gửi Thông Báo</a></li>


    </ul>
@endsection
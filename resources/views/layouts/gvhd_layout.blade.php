@extends('layouts.company_site_layout')

@section('left-nav')
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><h3>Dash Board</h3></li>
        <li role="presentation"
            @if($tab == 1 or $tab == 11 or $tab == 12 or $tab == 13)
            class="active"
                @endif><a href="/gvhd/sv">Sinh Viên</a></li>
        <li role="presentation"
            @if($tab == 2)
            class="active"
                @endif><a href="/gvhd/danh-gia-thuc-tap">Đánh Giá Thực Tập</a></li>
        <li role="presentation"
            @if($tab == 3)
            class="active"
                @endif><a href="/gvhd/thong-bao">Thông Báo</a></li>
        <li role="presentation"
            @if($tab == 4)
            class="active"
                @endif><a href="/gvhd/gui-thong-bao">Gửi Thông Báo</a></li>
    </ul>
@endsection
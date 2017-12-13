@extends('layouts.company_site_layout')

@section('left-nav')
    <ul class="nav nav-pills nav-stacked">
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
                @endif><a href="/leader/thong-bao">Thông Báo</a></li>
        <li role="presentation"
            @if($tab == 5)
            class="active"
                @endif><a href="/leader/gui-thong-bao">Gửi Thông Báo</a></li>

    </ul>
@endsection
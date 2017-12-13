@extends('layouts.'.$userType.'_layout')

@section('content')

    <div class="row" style="margin-left: 10px">

        <div class="panel-body">
            <div class="row">

                <a href="{{URL::previous()}}"><div class="glyphicon glyphicon-arrow-left"></div> &nbsp; &nbsp;Trở lại</a>
            </div>
            <h2>{!! $noti->tieu_de !!}</h2>
            <p><i style="color:#aaaaaa">Đăng bởi:{{$noti->user->name}} | Ngày
                    đăng: {{$noti->created_at->format('d/m/Y')}}</i></p>
            <div class="content-notice">{!! $noti->noi_dung !!}</div>
        </div>
    </div>

@endsection
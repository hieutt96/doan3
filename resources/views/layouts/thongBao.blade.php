<style>
    .col-md-2 {
        text-align: center;
        padding-top: 10px;
    }

    .col-md-10 {
        border-left: 1px solid #dddddd;
    }

    h3 {
        padding-top: 0px;
    }

    .time-notice {
        font-size: 65px;
    }
</style>
@extends('layouts.'.$userType.'_layout')
@section('content')
    <div class="panel-heading" style="background-color:#263c65; color:white;">
        <h3 style="margin-top:0px; margin-bottom:0px;">Thông Báo Đến</h3>
    </div>

    <div class="panel-body">
        @foreach($revNotices as $revNoti)
            <div class="row-item row">

                <div class="border-right">
                    <div class="col-md-2">
                        <h1 class="time-notice">{{$revNoti->created_at->format('d')}}</h1>
                        <p>
                        <h4 style="margin-left:10px;">{{$revNoti->created_at->format('F')}}</h4>
                        </p>
                    </div>
                    <div class="col-md-10">
                        <h3>{{$revNoti->tieu_de}}</h3>
                        <p><i style="color:#aaaaaa">Đăng bởi:{{$revNoti->user->name}} </i></p>
                        <a class="btn btn-primary" href="/{{$userType}}/thong-bao/{{$revNoti->id}}/chi-tiet">Chi
                            tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>

                <div class="break"></div>
            </div>
            <hr>
        @endforeach

    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            {!! $revNotices->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
    <br>
    <div class="panel-heading" style="background-color:#263c65; color:white;">
        <h3 style="margin-top:0px; margin-bottom:0px;">Thông Báo Đã Gửi</h3>
    </div>

    <div class="panel-body">
        @foreach($sendNotices as $sendNoti)
            <div class="row-item row">

                <div class="border-right">
                    <div class="col-md-2">
                        <h1 class="time-notice">{{$sendNoti->created_at->format('d')}}</h1>
                        <p>
                        <h4 style="margin-left:10px;">{{$sendNoti->created_at->format('F')}}</h4>
                        </p>
                    </div>
                    <div class="col-md-10">
                        <h3>{{$sendNoti->tieu_de}}</h3>
                        <p><i style="color:#aaaaaa">Đăng bởi:{{$sendNoti->user->name}} </i></p>
                        <a class="btn btn-primary" href="/{{$userType}}/thong-bao/{{$sendNoti->id}}/chi-tiet">Chi
                            tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>

                <div class="break"></div>
            </div>
            <hr>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            {!! $sendNotices->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
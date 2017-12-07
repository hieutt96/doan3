@extends('layouts.'.$userType.'_layout')

@section('content')
    <div class="row" style="margin-left: 10px">
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
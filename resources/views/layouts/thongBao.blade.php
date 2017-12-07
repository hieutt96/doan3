@extends('layouts.'.$userType.'_layout')

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
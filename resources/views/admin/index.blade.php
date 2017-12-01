@extends('layouts.admin')
@section('content_right')
    <div class="row col-lg-12">
        <div class="col-lg-offset-8 col-lg-2">
            <select class="form-control" id="hocky">
                <option value="">--Select--</option>
                @foreach($hockys as $value)
                    <option value="{{$value->ten_hoc_ki}}">{{$value->ten_hoc_ki}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <button class="btn btn-info form-control" id="loc">Lọc</button>
        </div>
    </div>
    <div class="row alert alert-default col-lg-12">
        <strong>Học kì hiện tại là :{{$hocky_current}}</strong>
    </div>
    <div class="row col-lg-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tabs1" data-toggle="tab">Danh sách công ty liên kết </a></li>
            <li><a href="#tabs2" data-toggle="tab">Danh sách công ty yêu cầu</a></li>
        </ul>
    </div><br><br>
    <div class="row col-lg-12 tab-content" style="margin-bottom: 10px;" id="hienthi">
       <div class="tab-pane fade in active hienthi1" id="tabs1">
            <br>
       </div>
       <div class="tab-pane fade hienthi2" id="tabs2">
           <br>
       </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/js/admin/index.js')}}"></script>
@endsection
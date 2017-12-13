@extends('layouts.admin')
@section('content_right')
	<div id="error">
		
	</div>
	<div class="row col-lg-12">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control">
				<option value="">--Select--</option>
				@foreach($hockys as $hocky)
					<option value="{{$hocky->ten_hoc_ki}}">{{$hocky->ten_hoc_ki}}</option>
				@endforeach
			</select>
		</div>
		<hr>
		<div class="col-lg-12">
			<div class="col-lg-5">
				<button class="btn btn-default alert alert-info"><span class="glyphicon glyphicon-star"></span> Đang trong thời gian của học kỳ :{{$hocky_current}}</button>
			</div>
			<div class="col-lg-5 col-lg-offset-2">
				<button class="form-control btn btn-info"><a href="/admin/phan-cong-giang-vien/{{$hocky_current}}">Phân công giảng viên cho kỳ:{{$hocky_current}}</a></button>
			</div>
		</div>
		<hr>
		<div class="row col-lg-12">
			<ul class="nav nav-tabs">
				<li><a href="#tabs1" data-toggle="tab">Thêm tài khoản giảng viên</a></li>
				<li><a href="#tabs2" data-toggle="tab">Danh sách giảng viên phụ trách thực tập</a></li>
			</ul>
		</div>
		<div class="row col-lg-12 tab-content">
			<div class="tab-pane fade in active hienthi1" id="tabs1">
				
			</div>
			<div class="tab-pane fade hienthi2" id="tabs2">
				
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('/js/admin/addlecturer.js')}}"></script>
@endsection

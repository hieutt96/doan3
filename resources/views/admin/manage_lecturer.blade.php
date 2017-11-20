@extends('layouts.admin')
@section('content_right')
	<div class="row col-lg-12">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control">
				<option value="">--Select--</option>
				@foreach($hockys as $hocky)
					<option value="{{$hocky->hocky}}">{{$hocky->hocky}}</option>
				@endforeach
			</select>
		</div>
		<div class="row col-lg-12">
			<ul class="nav nav-tabs">
				<li><a href="#tabs1" data-toggle="tab">Thêm tài khoản giảng viên quản lí</a></li>
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
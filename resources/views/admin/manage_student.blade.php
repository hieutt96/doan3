@extends('layouts.admin')
@section('content_right')
	<div id="error">
		
	</div>
	<div class="row">
		<div class="col-lg-6 alert alert-default">
			<strong>Học kỳ hiện tại là : {{$hocky_current}}</strong>
		</div>
		<div class="col-lg-6">
			<button class="btn btn-default"><a href="/admin/assignment_student/{{$hocky_current}}">Đi tới trang phân công sinh viên cho học kì hiện tại</a><span class="glyphicon glyphicon-arrow-right"></span></button>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control hocky" name="hocky" >
				<option value="">
					--Select--
				</option>
				@foreach($hockys as $hocky)
					<option value="{{$hocky->id}}">
						{{$hocky->ten_hoc_ki}}
					</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row col-lg-12">
		<ul class="nav nav-tabs">
			<li><a href="#tabs1" data-toggle="tab">
				Kết quả sinh viên theo học kỳ
			</a></li>
			<li><a href="#tabs3" data-toggle="tab">
				Danh sách sinh viên thực tập theo học kỳ 
			</a></li>
			<li><a href="#tabs2" data-toggle="tab">
				Danh sách sinh viên đăng ký theo học kỳ
			</a></li>
		</ul>
	</div>
	<div class="row col-lg-12 tab-content">
		<div class="tab-pane fade hienthi1" id="tabs1">
			 
		</div>
		<div class="tab-pane fade hienthi2" id="tabs2">
			
		</div>
		<div class="tab-pane fade hienthi3" id="tabs3">
			
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('/js/admin/manage_student.js')}}"></script>
@endsection
@extends('layouts.panel')
@section('content')
	<input type="hidden" name="semester_current" value="{{$hocky_current->id}}">

	<div class="row ">
		<div class=" col-lg-2">
			<div class="row"><a href="/lecturer/manage_student">Quản lí sinh viên</a></div><hr>
			<div class="row"><a href="/lecturer/receive">Thông báo</a></div><hr>
			<div class="row"><a href="/lecturer/gui-thong-bao">Gửi Thông Báo</a></div><hr>
		</div>
		<div class="col-lg-10 ">
			<div class="row">
				<div class="col-lg-offset-5 col-lg-5">
					<input type="" name="search" class="form-control">
				</div>
				<div class="col-lg-2">
					<button class="form-control">Tìm Kiếm</button>
				</div>
			</div><hr>
			<div class="row">
				<div class="col-lg-4">
					<span class="alert alert-info">Học Kỳ Hiện Tại :{{$hocky_current->ten_hoc_ki}}</span>
				</div>
				<div class="col-lg-offset-4 col-lg-4">
					<div class="row">
						<div class="col-lg-offset-4 col-lg-8">
<!-- 							<select class="form-control" id="hocky">
								@foreach($hockys as $hocky)
									<option value="{{$hocky->id}}"><a href="/lecturer/find-student-semester/{{$hocky->id}}">{{$hocky->ten_hoc_ki}}</a></option>
								@endforeach
							</select> -->
						</div>
					</div>
				</div>
			</div>
			@yield('content_right')
		</div>
	</div>
@endsection

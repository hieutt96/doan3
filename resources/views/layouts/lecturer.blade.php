@extends('layouts.panel')
@section('content')
	<div class="row ">
		<div class=" col-lg-2">
			<div class="row"><a href="/lecturer/manage_student">Sinh Viên Quản Lí</a></div><hr>
			<div class="row"><a href="">Doanh Nghiệp Liên Kết</a></div><hr>
			<div class="row"><a href="">Thông báo</a></div><hr>
			<div class="row"><a href="">Gửi Thông Báo</a></div><hr>
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
					<span class="alert alert-info">Học Kỳ Hiện Tại :{{$hocky_current}}</span>
				</div>
			</div>
			@yield('content_right')
		</div>
	</div>
@endsection

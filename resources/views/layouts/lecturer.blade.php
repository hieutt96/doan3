@extends('layouts.panel')
@section('content')

	<div class="row ">
		<div class=" col-lg-2">
			<div class="row"><a href="/lecturer/manage_student">Quản lí sinh viên</a></div><hr>
			<div class="row"><a href="/lecturer/receive">Thông báo</a></div><hr>
			<div class="row"><a href="/lecturer/gui-thong-bao">Gửi Thông Báo</a></div><hr>
		</div>
		<div class="col-lg-10 ">
			@yield('content_right')
		</div>
	</div>
@endsection

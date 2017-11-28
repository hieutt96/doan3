@extends("layouts.panel")
@section('content')
	<div class="row">
		<div class="col-lg-3 content_left">
			<div class="row">
				<a href="">Danh sách sinh viên đăng ký trên Sis</a> 
			</div><hr>
			<div class="row">
				<a href="">Quản Lí Sinh Viên</a>
			</div><hr>
			<div class="row active" id="dn">
				<a href="/admin-dashboard">Quản Lí Doanh Nghiệp</a>
			</div><hr>
			<div class="row">
				<a href="{{route('quan-li-giang-vien')}}">Quản Lí Giảng viên</a>
			</div><hr>
			<div class="row">
				<a href="{{route('thong-bao')}}">Gửi thông báo</a>
			</div><hr>
			<div class="row">
				<a href="/admin/tao-lich-dang-ky-hoc-ky">Danh Sách Học Kỳ</a>
			</div><hr>
		</div>
		<div class="col-lg-9">
			@yield('content_right')
		</div>
	</div>
@endsection
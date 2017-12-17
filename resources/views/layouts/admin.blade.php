@extends("layouts.panel")
@section('content')
	<div class="row">
		<div class="col-lg-2 content_left">
			<div class="row">
				<a href="">Danh sách sinh viên đăng ký trên Sis</a> 
			</div><hr>
			<div class="row">
				<a href="/admin/managestudent">Quản Lí Sinh Viên</a>
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
		<div class="col-lg-10">
			<div class="row col-lg-12" >
				<div class="col-lg-offset-3 col-lg-9 form-group">
					<div class="col-lg-7 col-lg-offset-2">
						<input type="" name="search" class="form-control" placeholder="Tìm Kiếm">
					</div>
					<button class="col-lg-3 btn btn-succes">Tìm Kiếm</button>
				</div>
			</div>
			@yield('content_right')
		</div>
	</div>
@endsection
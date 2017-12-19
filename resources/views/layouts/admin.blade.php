@extends("layouts.panel")
@section('content')
	<div class="row">
		<div class="col-lg-2 content_left">
			<div class="row">
				<a href="/admin/managestudent">Quản Lí Sinh Viên</a>
			</div><hr>
			<div class="row">
				<a href="/admin/phan-cong-sinh-vien-cho-cong-ty">Phân Công Sinh Viên</a>
			</div><hr>
			<div class="row active" id="dn">
				<a href="/admin-dashboard">Công Ty Liên Kết</a>
			</div><hr>
			<div class="row" id="dn">
				<a href="/admin/danh-sach-cong-ty-yeu-cau">Công Ty Yêu Cầu</a>
			</div><hr>
			<div class="row">
				<a href="/admin/addlecturer">Thêm Tài Khoản Giảng viên</a>
			</div><hr>
			<div class="row">
				<a href="{{route('quan-li-giang-vien')}}">Quản Lí Giảng viên</a>
			</div><hr>
			<div class="row">
				<a href="/admin/phan-cong-giang-vien">Phân Công Giảng Viên</a>
			</div><hr>
			<div class="row">
				<a href="{{route('thong-bao')}}">Gửi thông báo</a>
			</div><hr>
			<div class="row">
				<a href="/admin/tao-lich-dang-ky-hoc-ky">Danh Sách Học Kỳ</a>
			</div><hr>
		</div>
		<div class="col-lg-10">
			@yield('content_right')
		</div>
	</div>
@endsection
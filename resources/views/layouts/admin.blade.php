@extends("layouts.panel")
@section('content')
	<style type="text/css">
		.hr{
			border-width: 0px;
		}
		.a{
			margin-left: -30px;
		}
		.p{
			cursor: pointer;
		}
		.li{
			list-style-type: none;
		}
		.panel-heading{
			height: 50px
		}
	</style>
	<div class="row">
		<div class="col-lg-2 content_left">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default row">
					<div class="panel-heading">
						<div class="panel-title">
							<p data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="p">Sinh Viên</p>
						</div>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<ul class="">
							<li class="li"><a class="a" href="/admin/managestudent">Quản Lí Sinh Viên</a></li>
							<br>
							<li class="li"><a class="a" href="/admin/phan-cong-sinh-vien-cho-cong-ty">Phân Công Sinh Viên</a></li><br>
							<li class="li"><a class="a" href="/admin/dieu-chinh-phan-cong-sinh-vien-cho-cong-ty">Điều Chỉnh Phân Công</a></li>
						</ul>
			        </div>
				</div>
				<div class="panel panel-default row">
					<div class="panel-heading">
						<div class="panel-title">
							<p class="p" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Công Ty</p>
						</div>
					</div>
					<div id="collapse2" class="panel-collapse collapse ">
						<ul>
							<li class="li"><a class="a" href="/admin-dashboard">Công Ty Liên Kết</a></li>
							<br>
							<li class="li"><a class="a" href="/admin/danh-sach-cong-ty-yeu-cau">Công Ty Yêu Cầu</a></li>
						</ul>
			        </div>
				</div>
				<div class="panel panel-default row">
					<div class="panel-heading">
						<div class="panel-title">
							<p class="p" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Giảng Viên</p>
						</div>
					</div>
					<div id="collapse3" class="panel-collapse collapse ">
						<ul>
							<li class="li"><a class="a" href="/admin/addlecturer">Thêm Tài Khoản Giảng viên</a></li>
							<br>
							<li class="li"><a class="a" href="{{route('quan-li-giang-vien')}}">Quản Lí Giảng viên</a></li>
							<br>
							<li class="li"><a class="a" href="/admin/phan-cong-giang-vien">Phân Công Giảng Viên</a></li>
						</ul>
			        </div>
				</div>
				<div class="panel panel-default row">
					<div class="panel-heading">
						<div class="panel-title">
							<p class="p" data-toggle="collapse" data-parent="#accordion" href="#collapse4">Thông Báo</p>
						</div>
					</div>
					<div id="collapse4" class="panel-collapse collapse ">
						<br>
						<ul>
							<li class="li"><a class="a" href="{{route('thong-bao')}}">Gửi thông báo</a></li>
							<br>
							<li class="li"><a class="a" href="{{route('thong-bao-da-gui')}}">Thông Báo Đã Gửi</a></li>
						</ul>
			        </div>
				</div>
				<div class="panel panel-default row">
					<div class="panel-heading">
						<div class="panel-title">
							<p class="p" data-toggle="collapse" data-parent="#accordion" href="#collapse5">Học Kỳ</p>
						</div>
					</div>
					<div id="collapse5" class="panel-collapse collapse ">
						<br>
						<ul>
							<li class="li"><a class="a" href="/admin/tao-lich-dang-ky-hoc-ky">Danh Sách Học Kỳ</a></li>
						</ul>
			        </div>
				</div>
			</div>
		</div>
		<div class="col-lg-10">
			@yield('content_right')
		</div>
	</div>
@endsection
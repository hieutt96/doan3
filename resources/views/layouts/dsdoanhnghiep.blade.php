@extends('layouts.welcome');
@section('welcome')
	<div class="row container">
		<div class="row">
			<p style="font-size: 18px; color: red;"><span class="glyphicon glyphicon-refresh"></span>
				Danh sách doanh nghiệp liên kết với nhà trường :
			</p>
		</div>
		<div class="row">
			<div class="col-lg-2">
				
			</div>
			<div class="col-lg-10">
				@foreach($lists as $list)	
					<div class="row">
						<b><h4>Tên Công Ty :{{$list->name}}</h4></b>
					</div>
					<div class="row">
						<h5>Địa Chỉ :{{$list->diaChi}}</h5>
					</div>
					<div class="row">
						<h5>Lĩnh Vực Hoạt Động : {{$list->linhVucHoatDong}}</h5>
					</div>
					<div class="row">
						<h5>Công nghệ có thể đào tạo :{{$list->congNgheDaoTao}}</h5>
					</div>
					<div class="row">
						<h5>Mô tả ngắn về công ty :{{$list->moTa}}</h5>
					</div>
					<div class="row">
						<div class="col-lg-offset-10"><button class="btn btn-info">Xem Thêm</button></div>
					</div>
					<hr style="border-color: red;">
				@endforeach
			</div>
		</div>
	</div>
@endsection



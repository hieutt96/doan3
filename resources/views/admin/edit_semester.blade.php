@extends('layouts.admin')
@section('content_right')

	<div class="row">
		<h2>Chỉnh Sửa Lịch Đăng Ký Cho Học Kỳ :{{$hocky->ten_hoc_ki}}</h2>
	</div>
	<div class="row">
		@if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
	<div class="row">
		<form method="POST" action="/admin/chinh-sua-lich-dang-ky/{{$hocky->id}}">

			{{ csrf_field() }}
			<!-- <input type="" value="{{$hocky->id}}" name=""> -->
			<div class="row form-group ">
				<label class="control-label col-lg-5">
					Thời gian danh nghiệp bắt đầy đăng ký :
				</label>
				<input type="date" name="thoi_gian_dn_bat_dau_dk" value="{{$hocky->thoi_gian_dn_bat_dau_dk}}" class=" col-lg-3">
			</div>
			<div class="row form-group ">
				<label class="control-label col-lg-5">
					Thời gian danh nghiệp kết thúc đăng ký :
				</label>
				<input type="date" name="thoi_gian_dn_ket_thuc_dk" value="{{$hocky->thoi_gian_dn_ket_thuc_dk}}" class=" col-lg-3">
			</div>
			<div class="row form-group ">
				<label class="control-label col-lg-5">
					Thời gian sinh viên bắt đầu đăng ký :
				</label>
				<input type="date" name="thoi_gian_sv_bat_dau_dk" value="{{$hocky->thoi_gian_sv_bat_dau_dk}}" class=" col-lg-3">
			</div>
			<div class="row form-group ">
				<label class="control-label col-lg-5">
					Thời gian danh nghiệp kết thúc đăng ký :
				</label>
				<input type="date" name="thoi_gian_sv_ket_thuc_dk" value="{{$hocky->thoi_gian_sv_ket_thuc_dk}}" class=" col-lg-3">
			</div>
			<div class="row form-group ">
				<label class="control-label col-lg-5">
					Thời gian sinh viên bắt đầu thực tập:
				</label>
				<input type="date" name="thoi_gian_sv_bat_dau_thuc_tap" value="{{$hocky->thoi_gian_sv_bat_dau_thuc_tap}}" class=" col-lg-3">
			</div>
			<div class="row form-group ">
				<label class="control-label col-lg-5">
					Thời gian sinh viên kết thúc thực tập:
				</label>
				<input type="date" name="thoi_gian_sv_ket_thuc_thuc_tap" value="{{$hocky->thoi_gian_sv_ket_thuc_thuc_tap}}" class=" col-lg-3">
			</div>
			<div class="row">
				<button class="btn btn-default form-control">
					Submit
				</button>
			</div>
		</form>
	</div>

@endsection
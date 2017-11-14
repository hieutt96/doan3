@extends('layouts.admin')
@section('content_right')
	<div class="row">
		<div class="col-lg-offset-10 col-lg-2">
			<button class="btn btn-info">Tạo Mới</button>
		</div>
	</div><br>
	<div>
		<table class="table table-boder">
			<tbody>
				<th>Tên Học Kỳ</th>
				<th>Thời gian doanh nghiệp bắt đầu đăng ký</th>
				<th>Thời gian doanh nghiệp kết thúc đăng ký</th>
				<th>Thời gian sinh viên bắt đầu đăng ký</th>
				<th>Thời gian sinh viên kết thúc đăng ký</th>
				<th>Action</th>
			</tbody>
			<thead>
				@foreach($lists as $list)
					<tr>
						<td>{{$list->ten_hoc_ki}}</td>
						<td>{{$list->thoi_gian_dn_bat_dau_dk}}</td>
						<td>{{$list->thoi_gian_dn_ket_thuc_dk}}</td>
						<td>{{$list->thoi_gian_sv_bat_dau_dk}}</td>
						<td>{{$list->thoi_gian_sv_bat_dau_dk}}</td>
						<td><button class="btn btn-default"></button></td>
					</tr>
				@endforeach
			</thead>
		</table>
	</div>
@endsection
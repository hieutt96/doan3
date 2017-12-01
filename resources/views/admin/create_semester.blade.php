@extends('layouts.admin')
@section('content_right')
	<div class="row">
		<div class="col-lg-offset-10 col-lg-2 row">
			<button class="btn btn-info" data-toggle="modal" data-target="#mymodal">Tạo Mới</button>
		</div><br><br>
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
		<div class="alert alert-default">
			<strong>Học kỳ hiện tại là : {{$hocky_current}}</strong>
		</div>

		<div id="mymodal" class="modal fade" role="dialog">
			<div class="modal-dialog">
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Tạo Lịch Đăng Ký Cho Học Kỳ</h4>
			      </div>
					<form method="POST" action="{{route('tao-lich-dang-ky-hoc-ky.post')}}">
						{{ csrf_field() }}
			      		<div class="modal-body">
				       		<div class="row col-lg-offset-1">Tên Học Kỳ :
								<input type="text" name="name" placeholder="..." class="" required>
				       		</div><br>
				       		<div class="row">
				       			Thời gian doanh nghiệp bắt đầu đăng ký:<input type="date" name="thoi_gian_dn_bat_dau_dk" required>
				       		</div><br>
				       		<div class="row">
				       			Thời gian doanh nghiệp kết thúc đăng ký:<input type="date" name="thoi_gian_dn_ket_thuc_dk" required>
				       		</div><br>
				       		<div class="row">
				       			Thời gian sinh viên bắt đầu đăng ký:<input type="date" name="thoi_gian_sv_bat_dau_dk" required>
				       		</div><br>
				       		<div class="row">
				       			Thời gian sinh viên kết thúc đăng ký:<input type="date" name="thoi_gian_sv_ket_thuc_dk" required>
				       		</div><br>
				       		<div class="row">
				       			Thời gian sinh viên bắt đầu đi thực tập:<input type="date" name="thoi_gian_sv_ket_thuc_dk" required>
				       		</div><br>
				       		<div class="row">
				       			Thời gian sinh viên kết thúc thực tập:<input type="date" name="thoi_gian_sv_ket_thuc_dk" required>
				       		</div><br>
				       		<div>
				       			<button type="submit" class="btn btn-default form-control">Submit</button>
				       		</div>
				        </div>
					</form>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			 </div>
		</div>
	</div><br>
	<div>
		<table class="table table-boder">
			<thead>
				<th>Tên Học Kỳ</th>
				<th>Thời gian doanh nghiệp bắt đầu đăng ký</th>
				<th>Thời gian doanh nghiệp kết thúc đăng ký</th>
				<th>Thời gian sinh viên bắt đầu đăng ký</th>
				<th>Thời gian sinh viên kết thúc đăng ký</th>
				<th>Thời gian sinh viên bắt đầu thực tập</th>
				<th>Thời gian sinh viên kết thúc thực tập</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($lists as $list)
					<tr>
						<td>{{$list->ten_hoc_ki}}</td>
						<td>{{$list->thoi_gian_dn_bat_dau_dk}}</td>
						<td>{{$list->thoi_gian_dn_ket_thuc_dk}}</td>
						<td>{{$list->thoi_gian_sv_bat_dau_dk}}</td>
						<td>{{$list->thoi_gian_sv_ket_thuc_dk}}</td>
						<td>{{$list->thoi_gian_sv_bat_dau_thuc_tap}}</td>
						<td>{{$list->thoi_gian_sv_ket_thuc_thuc_tap}}</td>
						<td><a href="/admin/chinh-sua-lich-dang-ky/{{$list->id}}"><button class="btn btn-primary" >Edit</button></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
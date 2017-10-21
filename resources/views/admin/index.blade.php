@extends('layouts.panel')
@section('content')
	<div class="container">
		<div class="col-lg-2">
			<div class="row">
				<label class="label-control"><span class="glyphicon glyphicon-home"></span>   Dashboard</label>
			</div>
			<hr>
			<div class="row dropdown">
				<p class="dropdown-toggle " data-toggle ="dropdown">Quản lí công ty <span class="caret" style="cursor: pointer;"></span></p>
				<ul class="dropdown-menu"> 
					<li><a href="#">Xác nhận công ty</a></li>
					<li><a href="">Quản lí công ty</a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-10">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên Công Ty</th>
						<th>Địa Chỉ</th>
						<th>Email</th>
						<th>Số điện thoại </th>
						<th>Số lượng SV có thể nhận</th>
						<th>Hoạt Động</th>
					</tr>
				</thead>
				<tbody>
					@foreach($companys as $company)
						<tr>
							<td>{{$company->id}}</td>
							<td>{{$company->name}}</td>
							<td>{{$company->diaChi}}</td>
							<td>
								{{$company->emailnv}}
							</td>
							<td>{{$company->phone}}</td>
							<td>{{$company->soLuongSinhVienTT}}</td>
							<td>
								<button class="btn btn-default col-lg-6" id="accept">Accept</button>
								<input type="hidden" name="" value="{{$company->id}}">
								<button class="btn btn-info col-lg-5 col-lg-offset-1" id="cancel">Cancel</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('/js/admin/index.js')}}"></script>
@endsection
@extends('layouts.admin')
@section('content_right')
	<div id="error">
		
	</div>
	<hr style="border-width: 0px;">
	<form method="get" action="" id="myfilter">
		{{ csrf_field() }}
		<div class="row col-lg-offset-4">
			<div class="col-lg-6">
				<input type="text" name="search" class="form-control" 
				@if($search) value="{{$search}}" 
				@endif
				>	
			</div>
			<div class="col-lg-2">
				<button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
	</form>
	<div class="col-lg-12">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control" form="myfilter" name="semester_id" onchange="this.form.submit()">
				@foreach($semesters as $semester)
					<option value="{{$semester->id}}" @if($semester_id == $semester->id) selected @endif >
						{{$semester->ten_hoc_ki}}
					</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row col-lg-12">
		<table class="table table-striped">
			<thead>
				<th>MSSV</th>
				<th>Tên Sinh Viên</th>
				<th>Lớp</th>
				<th>Khóa</th>
				<th>Công Ty Thực Tập</th>
				<th>Điểm</th>
				<th>NX Nhà Trường</th>
				<th>NX Của Công Ty</th>
			</thead>
			<tbody>
				@foreach($students as $student)
					<tr>
						<td>{{$student->mssv}}</td>
						<td>{{$student->name}}</td>
						<td>{{$student->lop}}</td>
						<td>{{$student->grade}}</td>
						<td>{{$student->congty}}</td>
						<td>{{$student->diem}}</td>
						<td>{{$student->nhan_xet_nha_truong}}</td>
						<td>{{$student->danh_gia_cua_cong_ty}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection

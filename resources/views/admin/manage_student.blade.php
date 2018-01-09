@extends('layouts.admin')
@section('content_right')
	<div id="error">
		@if($khongdungthoidiem = Session::get('khongdungthoidiem'))
	      	<div class="alert alert-danger alert-dismissable">
		        <a  class="close" data-dismiss="alert" aria-label="close">×</a>
		        <strong>Error!</strong> {{$khongdungthoidiem}}
	        </div>
		@endif
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
				<th>Giảng viên hướng dẫn</th>
				<th>Điểm</th>
				<th>CHi tiết</th>
			</thead>
			<tbody>
				@foreach($students as $student)
					<tr>
						<td>{{$student->student->mssv}}</td>
						<td>{{$student->student->user->name}}</td>
						<td>{{$student->student->lop}}</td>
						<td>{{$student->student->grade}}</td>
						<td>{{$student->company->name}}</td>
						@if($student->lecturer)
							<td>{{$student->lecturer->user->name}}</td>
						@else
							<td>--</td>
						@endif
						<td>{{$student->result->diem}}</td>
						<td><button><a href="/student/chi-tiet-thuc-tap/{{$student->student->id}}">Chi Tiết</a></button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@endsection

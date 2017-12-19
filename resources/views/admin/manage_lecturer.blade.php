@extends('layouts.admin')
@section('content_right')
	<div id="error">
		
	</div>
	<div class="row ">
		<form method="GET" action="/admin/quan-li-giang-vien" id="myfilter">
			{{csrf_field()}}
			<div class="col-lg-offset-4 col-lg-6">
				<input type="text" name="search" class="form-control" placeholder="Tìm Kiếm Giảng Viên..." @if($search) value="{{$search}}" @endif>
			</div>
			<div class="col-lg-2">
				<button class="form-control"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</form>
	</div><hr style="border-width: 0px;">
	<div class="row col-lg-12">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control" name="semester_id" onchange="this.form.submit()" form="myfilter">
				@foreach($semesters as $semester)
					<option value="{{$semester->id}}"
						@if($semester_id == $semester->id) selected @endif
						>{{$semester->ten_hoc_ki}}</option>
				@endforeach
			</select>
		</div>
	</div><hr style="border-width: 0px;">
	<div class="row col-lg-offset-1">
		<table class="table table-striped">
			<thead>
				<th>STT</th>
				<th>Giảng Viên</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Công Ty Phụ Trách</th>
			</thead>
			<tbody>
				<?php $i=1; ?>
				@foreach($lecturers as $lecturer)
					<tr>
						<td><?php  echo $i;?></td>
						<td>{{$lecturer->name}}</td>
						<td>{{$lecturer->email}}</td>
						<td>{{$lecturer->phone}}</td>
						<td>{{$lecturer->tencongty}}</td>
					</tr>
					<?php $i++; ?>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@extends('layouts.admin')
@section('content_right')
	<div class="row">
		<div class="col-lg-4">
				<select class="form-control" id="giangvien">
					<option>--Chọn Giảng Viên--</option>
					@foreach($lecturers as $lecturer)
						<option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
					@endforeach
				</select>
				<script type="text/javascript">
					$("#giangvien").select2();
				</script>
		</div>
		<div class="col-lg-2">
			<button class="form-control btn btn-success" id="submit">Submit</button>
		</div>
	</div><hr>
	<div class="row">
		<table class="table table-border">
			<thead>
				<tr>
					<th>STT</th>
					<th></th>
					<th>Tên Công Ty</th>
					<th>Sinh viên đăng ký</th>
					<th>Giới hạn</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1 ?>
				@foreach($companies as $company)
					<tr>
						<td><?php echo $i++; ?></td>
						<td><input type="checkbox" name="" value="{{$company->id}}" class="idCongTy"></td>
						<td>{{$company->name}}</td>
						<td>{{$company->sosinhviendangky}}</td>
						<td>{{$company->gioihan}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<script type="text/javascript" src="{{asset('/js/admin/assignment_lecturer.js')}}"></script>
@endsection
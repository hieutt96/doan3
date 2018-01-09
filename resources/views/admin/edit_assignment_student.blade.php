@extends('layouts.admin')
@section('content_right')

	<div class="row col-lg-12 form-group" style="margin-top: 5px;font-size: 18px;">
		<input type="hidden" value="{{$semester_current->id}}" id="semester_id">
		<div class="col-lg-4 col-lg-offset-6">
			<select class="form-control select2">
				<option value="">-Chọn công ty-</option>
				@foreach($companys as $company)
					<option value="{{$company->id}}">{{$company->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-2">
			<button class="btn btn-warning btn-sm" id="dexuat">Submit</button>
		</div>
	</div>
	<div class="row col-lg-12">
		<table class="table table-bordered .table-striped">
			<tr>
				<?php $i=1; ?>
				<th>STT</th>
				<th></th>
				<th>Tên Sinh Viên</th>
				<th>Công Ty Đã Phân Công</th>
			</tr>
			@foreach($students as $student)
				<tr>
					<td><?php echo $i; $i++; ?></td>
					<td><input type="checkbox" name="choice[]" value="{{$student->student_id}}" class="idsinhvien"></td>
					<td>{{$student->student->user->name}}</td>
					<td class="company_name">{{$student->company->name}}</td>
				</tr>
			@endforeach
		</table>
	</div>
	<script type="text/javascript">
		$('.select2').select2();
	</script>
	<script type="text/javascript" src="{{asset('/js/admin/edit_assignment_student.js')}}"></script>
@endsection
@extends('layouts.lecturer')
@section('content_right')
	<input type="hidden" name="semester_current" value="{{$hocky_current->id}}">
	<div class="row">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control" id="hocky">
				<option value="">--Select--</option>
				@foreach($hockys as $hocky)
					<option value="{{$hocky->id}}"><a href="/lecturer/find-student-semester/{{$hocky->id}}">{{$hocky->ten_hoc_ki}}</a></option>
				@endforeach
			</select>
		</div>
	</div><hr>
	<div class="row content">
		<div class="">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>MSSV</th>
						<th>Tên</th>
						<th>Lớp</th>
						<th>Khóa</th>
						<th>Công Ty</th>
						<th>Điểm</th>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $student)
						<tr>
							<td>{{$student->mssv}}</td>
							<td>{{$student->ten}}</td>
							<td>{{$student->lop}}</td>
							<td>{{$student->grade}}</td>
							<td>{{$student->congty}}</td>
							@if($student->diem='')
								<input type="" name="diem">
								<button>Save</button>
							@else
								<td>{{$student->diem}}</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('/js/lecturer/manage_student.js')}}">
	</script>
	<script type="text/javascript">
		var semester_current = $("input[name='semester_current']").val();
		$("#hocky").val(semester_current);
	</script>
@endsection
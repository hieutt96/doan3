@extends('layouts.admin')
@section('content_right')
	<!-- <div class="row col-lg-12">
		<strong class="">Phân Công Sinh Viên Cho Học Kỳ : {{$hocky}}</strong>
	</div> -->
	<div class="row col-lg-12 form-group" style="margin-top: 5px;font-size: 18px;">
		<label class="label-control col-lg-6">Danh sách công ty thực tập kì :{{$hocky}}</label>
		<div class="col-lg-5">
			<select class="form-control select2">
				<option value="">-Choice-</option>
				@foreach($listCompany as $listCompany)
					<option value="{{$listCompany->id}}">{{$listCompany->name}}</option>
				@endforeach
			</select>
		</div>
		<button class="btn btn-warning col-lg-1" id="dexuat">Submit</button>
	</div>
	<div class="col-lg-12 row" style="margin-top: 20px;">
		<table class="table table-bordered .table-striped">
			<tr>
				<th>STT</th>
				<th></th>
				<th>Tên Sinh Viên</th>
				<th>Tên Công Ty Mong Muốn</th>
				<th>Action</th>
			</tr>
			<?php 
				$stt = 1;
			 ?>
			@foreach($listsv as $sv)
				<tr>
					<td><?php echo $stt; $stt++; ?></td>
					<td><input type="checkbox" name="choice[]" value="{{$sv->student_id}}" class="idsinhvien"></td>
					<td>{{$sv->tensinhvien}}</td>
					<td>{{$sv->tencongty}}</td>
					<td><button class="btn btn-danger" id="xoa">Delete</button></td>
				</tr>
			@endforeach
		</table>
	</div>

	<div class="row col-lg-offset-8 col-lg-4">
		{{ $listsv->links() }}
	</div>
	<script type="text/javascript">
		$('.select2').select2();
	</script>
	<script type="text/javascript" src="{{asset('/js/admin/assignment_student.js')}}"></script>
@endsection
@extends('layouts.admin')
@section('content_right')
	<!-- <div class="row col-lg-12">
		<strong class="">Phân Công Sinh Viên Cho Học Kỳ : {{$hocky}}</strong>
	</div> -->
	<div class="row col-lg-12 form-group" style="margin-top: 5px;font-size: 18px;">
		<label class="label-control col-lg-6">Danh sách công ty thực tập kì :{{$hocky}}</label>
		<input type="hidden" name="hocky" value="{{$hocky}}">
		<div class="col-lg-4">
			<select class="form-control select2">
				<option value="">-Chọn công ty-</option>
				@foreach($listCompany as $listCompany)
					<option value="{{$listCompany->id}}">{{$listCompany->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-2">
			<button class="btn btn-warning btn-sm" id="dexuat">Submit</button>
		</div>
	</div>
	<div class="col-lg-12 row">
		<ul class="nav nav-tabs">
			<li><a href="#tabs1" data-toggle="tab">Sinh Viện Có Nguyện Vọng</a></li>
			<li><a href="#tabs2" data-toggle="tab">Sinh viên đã có công ty</a></li>
			<li><a href="#tabs3" data-toggle="tab">Sinh viên chưa có công ty</a></li>
		</ul>
	</div>
	<div class="row col-lg-12 tab-content">
		<div class="tab-pane fade" id="tabs1" style="margin-top: 20px;">
			<table class="table table-bordered .table-striped">
				<tr>
					<th>STT</th>
					<th></th>
					<th>Tên Sinh Viên</th>
					<th>Tên Công Ty Mong Muốn</th>
				</tr>
				<?php 
					$stt = 1;
				 ?>
				@foreach($listsv1 as $sv)
					<tr>
						<td><?php echo $stt; $stt++; ?></td>
						<td><input type="checkbox" name="choice[]" value="{{$sv->student_id}}" class="idsinhvien"></td>
						<td>{{$sv->tensinhvien}}</td>
						<td>{{$sv->tencongty}}</td>
					</tr>
				@endforeach
			</table>
		</div>
		<div class="tab-pane fade" id="tabs2">
			<table class="table table-bordered .table-striped">
				<tr>
					<th>STT</th>
					<th></th>
					<th>Tên Sinh Viên</th>
					<th>Tên Công Ty Mong Muốn</th>
				</tr>
				<?php 
					$stt = 1;
				 ?>
				@foreach($listsv2 as $sv)
					<tr>
						<td><?php echo $stt; $stt++; ?></td>
						<td><input type="checkbox" name="choice[]" value="{{$sv->student_id}}" class="idsinhvien"></td>
						<td>{{$sv->tensinhvien}}</td>
						<td>{{$sv->tencongty}}</td>
					</tr>
				@endforeach
			</table>
		</div>
		<div class="tab-pane fade" id="tabs3">
			<table class="table table-bordered .table-striped">
				<tr>
					<th>STT</th>
					<th></th>
					<th>Tên Sinh Viên</th>					
				</tr>
				<?php 
					$stt = 1;
				 ?>
				@foreach($listsv3 as $sv)
					<tr>
						<td><?php echo $stt; $stt++; ?></td>
						<td><input type="checkbox" name="choice[]" value="{{$sv->student_id}}" class="idsinhvien"></td>
						<td>{{$sv->tensinhvien}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
	<script type="text/javascript">
		$('.select2').select2();
	</script>
	<script type="text/javascript" src="{{asset('/js/admin/assignment_student.js')}}"></script>
@endsection
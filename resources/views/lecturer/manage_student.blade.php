@extends('layouts.lecturer')
@section('content_right')
	<div class="row">
		@if($capnhapthongtin = Session::get('cap_nhap_thong_tin'))
			<div class="alert alert-success alert-dismissable">
	        	<a  class="close" data-dismiss="alert" aria-label="close">×</a>
	        	<strong>Success!</strong> {{$capnhapthongtin}}
	        </div>
		@endif
	</div><hr style="border-width: 0px;">
	<form action="/lecturer/manage_student" method="GET" id="myform" >
		{{csrf_field()}}
		    <div class="input-group col-lg-offset-4 col-lg-8">
		      <input type="text" class="form-control" placeholder="Tìm Kiếm Sinh Viên" name="search" @if(sizeof($search)) value="{{$search}}" @endif>
		      <div class="input-group-btn">
		        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		      </div>
		    </div>
	</form>
	<div class="row">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control" name="semester"
			form="myform" onchange="$('#myform').submit();">
				@foreach($semesters as $semesters)
					<option value="{{$semesters->id}}" @if($semester->id == $semesters->id)) selected @endif>{{$semesters->ten_hoc_ki}}</option>
				@endforeach
			</select>
		</div>
	</div><hr style="border-width: 0px;">
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
						<th>NX GV</th>
						<th>NX CT</th>
						<th>DG CT</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $student)
						<tr>
							<td>{{$student->student->mssv}}</td>
							<td>{{$student->student->user->name}}</td>
							<td>{{$student->student->lop}}</td>
							<td>{{$student->student->grade}}</td>
							<td>{{$student->company->name}}</td>
							<td class="diem">{{$student->result->diem}}</td>
							<td class="nhan_xet_nha_truong">{{$student->result->nhan_xet_nha_truong}}</td>
							<td>{{$student->result->nhan_xet_cong_ty}}</td>
							<td>{{$student->result->danh_gia_cua_cong_ty}}</td>
							<td><button class="edit" value="{{$student->result_id}}">Edit</button></td>
						</tr>
					@endforeach
					{{ $students->links() }}
				</tbody>
			</table>
		</div>
	</div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chỉnh Sửa Điểm</h4>
        </div>
        <div class="modal-body">
          	<div class="row">
          		<div class="col-lg-offset-2 col-lg-2">
          			<label>Điểm</label>
          		</div>
          		<div class="col-lg-7">
          			<input type="number" name="diem" min=0 max=10 step="any" class="form-control">
          		</div>
          	</div><hr style="border-width: 0px;">
          	<div class="row">
          		<div class="col-lg-offset-2 col-lg-2">
          			<label>Nhận Xét:</label>
          		</div>
          		<div class="col-lg-7">
          			<textarea class="form-control" name="nhan_xet_nha_truong" rows="3"></textarea>
          		</div>
          	</div><hr style="border-width: 0px;">
          	<div class="row">
          		<div class="col-lg-offset-3 col-lg-8">
          			<button id="save" class="form-control btn btn-default">Save And Close</button>
          		</div>
          	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('/js/lecturer/manage_student.js')}}">
	</script>
@endsection
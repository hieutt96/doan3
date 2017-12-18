@extends('layouts.lecturer')
@section('content_right')
	<input type="hidden" name="semester_current" value="{{$hocky_current->id}}">
	<div class="row">
		@if($capnhapthongtin = Session::get('cap_nhap_thong_tin'))
			<div class="alert alert-success alert-dismissable">
	        	<a  class="close" data-dismiss="alert" aria-label="close">×</a>
	        	<strong>Success!</strong> {{$capnhapthongtin}}
	        </div>
		@endif
	</div><hr style="border-width: 0px;">
	<div class="row">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control" id="hocky">
				@foreach($hockys as $hocky)
					<option value="{{$hocky->id}}"><a href="/lecturer/find-student-semester/{{$hocky->id}}">{{$hocky->ten_hoc_ki}}</a></option>
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
							<td>{{$student->mssv}}</td>
							<td>{{$student->ten}}</td>
							<td>{{$student->lop}}</td>
							<td>{{$student->grade}}</td>
							<td>{{$student->congty}}</td>
							<td class="diem">{{$student->diem}}</td>
							<td class="nhan_xet_nha_truong">{{$student->nhan_xet_nha_truong}}</td>
							<td>{{$student->nhan_xet_cong_ty}}</td>
							<td>{{$student->danh_gia_cua_cong_ty}}</td>
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
	<script type="text/javascript">
		var semester_current = $("input[name='semester_current']").val();
		$("#hocky").val(semester_current);
	</script>
@endsection
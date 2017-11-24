@extends('student.index_student') 
@section('content')
<style>
 thead {
     background-color: #cccccc;
 }
 .content{
     margin-bottom:300px;
 }
</style>
<div class="panel-layout">
    <h2 style="text-align:center;">Công việc  thực hiện</h2><br>
     <h4>Chú ý* : Sinh viên cập nhật trạng thái sau khi hoàn thành công việc</h4><br>
   <form  class="form-cvtt" method="POST" action="{{ url('student/change-password') }}">
   <input type="hidden" name="_token" value={!!csrf_token()!!}>
	 <table style="border:1px solid #dddddd;" class="table table-hover">
    <thead >
      <tr>
        <th>Mã</th>
        <th>Trạng thái</th>
        <th>Tên Công việc</th>
        <th>Nội Dung</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
      </tr>
    </thead>
    <tbody>
     <?php $trangthai_arr = [0=>'Chưa Làm',1=>'Hoàn Thành'] ?>
     @foreach($job_assignment as $jo)
      <tr>
        <td>{!!$jo->job->id!!}</td>
        <td>
		  	<select 
        @if(date("d/m/Y",strtotime($jo->job->thoi_gian_ket_thuc)) < date('d/m/Y'))
        {{"disabled"}}
        @endif
         style="width:130px;"name="trangthai" class="form-control" id="select_status" >
          @foreach($trangthai_arr as $key=> $val)
						<option 
						 @if($jo->trang_thai==$key)
						 {!!"selected"!!}
						 @endif
						 value="{{$key}}">{{$val}}
						</option>
					@endforeach
			</select>
        </td>
        <td>{!!$jo->job->ten_cong_viec!!}</td>
        <td>{!!$jo->job->Noi_Dung!!}</td>
        <td>{!!date("d/m/Y",strtotime($jo->job->thoi_gian_bat_dau))!!}</td>
        <td>{!!date("d/m/Y",strtotime($jo->job->thoi_gian_ket_thuc))!!}</td>
      </tr>
       @endforeach
    </tbody>
    <hr/>
  </table>
	<div class="row">
		<button type="submit" style="margin-left:550px;" 
        class="col-lg-offset-1 btn btn-success  ">Cập nhật</button>
	</div><br>
    </form>
</div>
@endsection
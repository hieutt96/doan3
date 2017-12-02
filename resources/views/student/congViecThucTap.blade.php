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
     @foreach($job_assignment as $jo)
      <tr>
        <td>{!!$jo->job->id!!}</td>
        <td>
						 @if($jo->trang_thai==0)
              Mới
             @elseif($jo->trang_thai==1)
             Hoàn Thành
             @elseif($jo->trang_thai==2)
             Quá Hạn
						 @endif
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
    </form>
</div>
@endsection
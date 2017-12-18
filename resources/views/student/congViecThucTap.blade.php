@extends('student.index_student')
@section('content')
    <style>
        thead {
            background-color: #cccccc;
        }

        .content {
            margin-bottom: 300px;
        }
    </style>
    <div class="panel-layout">
        <h2 style="text-align:center;">Công việc thực hiện</h2><br>
        <h3>Thực tập tại công ty <span>
            @if(sizeof($company) == 0)
                    -
                @else
                    {{$company->name}}
                @endif
        </span></h3>
        <p>-<b> Nhân viên hướng dẫn:</b>
            @if($student->tenNVPhuTrach == '')
                (Chưa có Leader)
            @else
                {{$student->tenNVPhuTrach}}
            @endif
        </p>
        <p>- Sinh viên <b>{{Auth::user()->name}}</b> cùng với nhóm thực hiện các công việc trong bảng dưới đây</p>
        <p><span class="glyphicon glyphicon-alert"></span> <span style="color:red;">Chú ý</span>: Sinh viên cần hoàn
            thành công việc đúng thời hạn và báo lại để Leader kiểm tra sau khi hoàn thành </p>
        <form class="form-cvtt" method="POST" action="{{ url('student/change-password') }}">
            <input type="hidden" name="_token" value={!!csrf_token()!!}>
            <table style="border:1px solid #dddddd;" class="table table-hover">
                <thead>
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
                        <td>{!!$jo->job->noi_dung_chi_tiet!!}</td>
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
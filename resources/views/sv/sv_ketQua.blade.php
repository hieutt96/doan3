@extends('layouts.'.$userType.'_layout')

@section('content')
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="/{{$userType}}/sv/{{$student->id}}/thong-tin">Thông tin chi tiết</a>
            </li>
            <li role="presentation"><a href="/{{$userType}}/sv/{{$student->id}}/cong-viec">Công
                    việc</a></li>
            <li role="presentation" class="active"><a href="/{{$userType}}/sv/{{$student->id}}/ket-qua">Kết quả
                    đánh giá</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <h3>Đánh giá phía doanh nghiệp</h3>
                <ul class="list-group">
                    <li class="list-group-item">Năng lực IT: <b>{{$result->nang_luc_it}}/5</b></li>
                    <li class="list-group-item">Phương pháp làm việc<b>{{$result->phuong_phap_lam_viec}}/5</b></li>
                    <li class="list-group-item">Năng lực nắm bắt công việc: <b>{{$result->nang_luc_nam_bat_cv	}}/5</b></li>
                    <li class="list-group-item">Năng lực quản lý: <b>{{$result->nang_luc_quan_li}}/5</b></li>
                    <li class="list-group-item">Năng lực tiếng anh: <b>{{$result->tieng_anh}}/5</b></li>
                    <li class="list-group-item">Năng lực làm việc nhóm: <b>{{$result->nang_luc_lam_viec_nhom}}/5</b></li>
                    {{--<li class="list-group-item">Điểm thưởng khác: <b>3/5</b></li>--}}
                    <li class="list-group-item">Xếp loại: <b>{{$result->danh_gia_cua_cong_ty}}</b></li>
                    <li class="list-group-item">Nhận xét: <b>{{$result->nhan_xet_cong_ty}}</b></li>
                </ul>
            </div>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            {{--<h3>Tài liệu đã nộp</h3>--}}
            {{--<div class="row">--}}
                {{--<div class="thumbnail">--}}
                    {{--<a href="http://ketoanthienung.net/pic/Service/images/mau%20bang%20cham%20cong%202017%20tr%C3%AAn%20Excel%20moi%20nhat.png">--}}
                        {{--<img src="http://ketoanthienung.net/pic/Service/images/mau%20bang%20cham%20cong%202017%20tr%C3%AAn%20Excel%20moi%20nhat.png"--}}
                             {{--alt="Lights" style="width:100%">--}}
                        {{--<div class="caption">--}}
                            {{--<p>Bảng chấm công</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection
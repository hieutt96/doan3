@extends('layouts.'.$userType.'_layout')

@section('content')
    <div class="panel-body">

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
        <div class="row" style="margin-left: 10px">
            <div class="col-md-6">
                <div class="row">
                    <h3>Đánh giá phía doanh nghiệp</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Năng lực IT: <b>{{$result->nang_luc_it}}/5</b></li>
                        <li class="list-group-item">Phương pháp làm việc<b>{{$result->phuong_phap_lam_viec}}/5</b></li>
                        <li class="list-group-item">Năng lực nắm bắt công việc: <b>{{$result->nang_luc_nam_bat_cv	}}
                                /5</b></li>
                        <li class="list-group-item">Năng lực quản lý: <b>{{$result->nang_luc_quan_li}}/5</b></li>
                        <li class="list-group-item">Năng lực tiếng anh: <b>{{$result->tieng_anh}}/5</b></li>
                        <li class="list-group-item">Năng lực làm việc nhóm: <b>{{$result->nang_luc_lam_viec_nhom}}/5</b>
                        </li>
                        {{--<li class="list-group-item">Điểm thưởng khác: <b>3/5</b></li>--}}
                        <li class="list-group-item">Xếp loại: <b>{{$result->danh_gia_cua_cong_ty}}</b></li>
                        <li class="list-group-item">Nhận xét: <b>{{$result->nhan_xet_cong_ty}}</b></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6">
                @if(Auth::user()->level == 5)
                    <h3>Đánh giá phía nhà trường</h3>
                    <ul class="list-group">
                        <li class="list-group-item">Điểm: <b>{{$result->diem}}</b></li>
                        <li class="list-group-item">Nhận xét: <b>{!! $result->nhan_xet_nha_truong !!}</b></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
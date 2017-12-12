@extends('layouts.'.$userType.'_layout')

@section('content')
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="/{{$userType}}/sv/{{$student->user_id}}/thong-tin">Thông tin chi tiết</a>
            </li>
            <li role="presentation"><a href="/{{$userType}}/sv/{{$student->user_id}}/cong-viec">Công
                    việc</a></li>
            <li role="presentation" class="active"><a href="/{{$userType}}/sv/{{$student->user_id}}/ket-qua">Kết quả
                    đánh giá</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <h3>Đánh giá phía doanh nghiệp</h3>
                <ul class="list-group">
                    <li class="list-group-item">Năng lực IT: <b>{{$result->nangLucIT}}/5</b></li>
                    <li class="list-group-item">Phương pháp làm việc<b>{{$result->ppLamViec}}/5</b></li>
                    <li class="list-group-item">Năng lực nắm bắt công việc: <b>{{$result->nangLucNamBatCV}}/5</b></li>
                    <li class="list-group-item">Năng lực quản lý: <b>{{$result->nangLucQuanLi}}/5</b></li>
                    <li class="list-group-item">Năng lực tiếng anh: <b>{{$result->tiengAnh}}/5</b></li>
                    <li class="list-group-item">Năng lực làm việc nhóm: <b>{{$result->nangLucLamViecNhom}}/5</b></li>
                    {{--<li class="list-group-item">Điểm thưởng khác: <b>3/5</b></li>--}}
                    <li class="list-group-item">Xếp loại: <b>-</b></li>
                    <li class="list-group-item">Nhận xét: <b>{{$result->nhanXetCongTy}}</b></li>
                </ul>
            </div>

            <p style="color: red"><i>Ở đây phải check kiểu user vì chỉ hiện form dưới cho gvhd, nhưng PM thì không.</i>
            </p>
            <div class="row">
                <h3>Đánh giá của giảng viên</h3>
                <div class="form-group">
                    <label for="xepLoai" class="control-label">Xếp loại :</label>
                    <select id="xepLoai" class="form-control" required>
                        <option value="4">A+</option>
                        <option value="4">A</option>
                        <option value="3.5">B+</option>
                        <option value="3">B</option>
                        <option value="2.5">C+</option>
                        <option value="2">C</option>
                        <option value="1.5">D+</option>
                        <option value="1">D</option>
                        <option value="0">F</option>
                    </select>
                    <label for="comment">Nhận xét:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                    <button type="submit" class="btn btn-success">Gửi</button>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h3>Tài liệu đã nộp</h3>
            <div class="row">
                <div class="thumbnail">
                    <a href="http://ketoanthienung.net/pic/Service/images/mau%20bang%20cham%20cong%202017%20tr%C3%AAn%20Excel%20moi%20nhat.png">
                        <img src="http://ketoanthienung.net/pic/Service/images/mau%20bang%20cham%20cong%202017%20tr%C3%AAn%20Excel%20moi%20nhat.png"
                             alt="Lights" style="width:100%">
                        <div class="caption">
                            <p>Bảng chấm công</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('pm.pm_layout')

@section('content')
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="/pm/21">Thông tin chi tiết</a></li>
            <li role="presentation"><a href="/pm/22">Sinh Viên Hướng Dẫn Thực Tập</a></li>
        </ul>
    </div>
    <div class="row" style="padding-top: 10px">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <div class="media-left">
                        <a href="#">
                            <img class="img-thumbnail" height="300"
                                 src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/21150313_1983255908612615_7984369144769509920_n.jpg?oh=e7d602814b22e5004923d1083533c9a5&oe=5A7B87B1">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <ul class="list-group">
                        <li class="list-group-item">Phòng ban: <b>Development</b></li>
                        <li class="list-group-item">Chức vụ: <b>Leader</b></li>
                        <li class="list-group-item">Lĩnh vực làm việc: <b>Lập trình IOS</b></li>
                        <li class="list-group-item">Họ tên: <b>Nene</b></li>
                        <li class="list-group-item">Giới tính: <b>Nữ</b></li>
                    </ul>
                </div>
            </div>
            <div class="row" style="padding-right: 15px">
                <ul class="list-group">
                    <li class="list-group-item">Ngày sinh: <b>22/01/1999</b></li>
                    <li class="list-group-item">Địa chỉ đang ở: <b>Yên lạc, Kim Ngưu, HBT, Hà Nội</b></li>
                    <li class="list-group-item">Sô điện thoại: <b>01235214523</b></li>
                    <li class="list-group-item">Tài khoản: <b>nene1234@gmail.com</b></li>

                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <ul class="list-group">
                    <li class="list-group-item">Laptop: <b>Có</b></li>
                    <li class="list-group-item">Thời gian làm việc: <b>Fulltime</b></li>
                    <li class="list-group-item">Ngày bắt đầu: <b>22/11/2011</b></li>
                    <li class="list-group-item">Ngày kết thúc: <b></b></li>
                    <li class="list-group-item">Số CMT: <b>123456789</b></li>
                    <li class="list-group-item">Ngày cấp: <b>11/22/2012</b></li>
                    <li class="list-group-item">Nơi cấp: <b>ThaiLand</b></li>
                    <li class="list-group-item">Mã bảo hiểm: <b>9869586235</b></li>
                    <li class="list-group-item">Mã thuế cá nhân: <b>12451263584</b></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button type="button" class="btn btn-primary">Sửa thông tin</button>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger">Xóa</button>
        </div>
    </div>
@endsection
<div class="row">
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="/{{$user_type}}/sv/info/{{$student->id}}">Thông tin chi tiết</a></li>
        <li role="presentation"><a href="/{{$user_type}}/12">Công việc</a></li>
        <li role="presentation"><a href="/{{$user_type}}/13">Kết quả đánh giá</a></li>
    </ul>
</div>
<div class="row" style="padding-top: 10px">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-5">
                <div class="thumbnail">
                    <a href="#">
                        <img class="portrait img-thumbnail" src="{{$student->avatar}}">
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <ul class="list-group">
                    <li class="list-group-item">Họ tên: <b>{{$student->hoTen}}</b></li>
                    <li class="list-group-item">Lớp: <b>{{$student->lop}}</b></li>
                    <li class="list-group-item">Số điện thoại: <b>{{$student->sdt}}</b></li>
                    <li class="list-group-item">Giới tính: <b>
                            @if($student->gioiTinh == 0)
                                Nữ
                            @else
                                Nam
                            @endif
                        </b></li>
                </ul>
            </div>
        </div>
        <div class="row" style="padding-right: 15px">
            <ul class="list-group">
                <li class="list-group-item">Email: <b>{{$student->email}}</b></li>
                <li class="list-group-item">Địa chỉ đang ở: <b>{{$student->diaChi}}</b></li>
                <li class="list-group-item">Tài khoản: <b>{{$student->email}}</b></li>
                <li class="list-group-item">Laptop: <b>
                        @if($student->laptop == 0)
                            Không
                        @else
                            Có
                        @endif
                    </b></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item">Bộ môn: <b>{{$student->boMon}}</b></li>
                <li class="list-group-item">Mã môn học: <b>IT4991</b></li>
                <li class="list-group-item">Điểm CPA: <b>{{$student->CPA}}</b></li>
                <li class="list-group-item">Khả năng tiếng anh: <b>{{$student->TA}}</b></li>
                <li class="list-group-item">Kỹ năng lập trình thành thạo: <b>{{$student->kTLTThanhThao}}</b></li>
                <li class="list-group-item">Kỹ năng lập trình có thể sử dụng: <b>Null</b></li>
                <li class="list-group-item">Kỹ năng làm chủ công nghệ: <b>Null</b></li>
                <li class="list-group-item">Kỹ năng khác: <b>{{$student->kyNangKhac}}</b></li>
                <li class="list-group-item">Lĩnh vực thực tập: <b>{{$student->nenTangMongMuon}}</b></li>
            </ul>
        </div>
    </div>

</div>
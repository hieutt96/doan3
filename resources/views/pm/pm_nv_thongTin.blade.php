@extends('layouts.pm_layout')

@section('content')
    @include('pm.pm_tabs', ['idLead' => $leader->id, 'tab' => 21])
    <div class="row" style="padding-top: 10px">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <div class="media-left">
                        <a href="#">
                            <img class="img-thumbnail" height="300"
                                 {{--src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/21150313_1983255908612615_7984369144769509920_n.jpg?oh=e7d602814b22e5004923d1083533c9a5&oe=5A7B87B1">--}}
                                src="{{$leader->user->picture}}">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <ul class="list-group">
                        <li class="list-group-item">Phòng ban: <b>{{$leader->phong_ban}}</b></li>
                        <li class="list-group-item">Chức vụ: <b>{{$leader->chuc_vu}}</b></li>
                        <li class="list-group-item">Lĩnh vực làm việc: <b>{{$leader->chuyenmon}}</b></li>
                        <li class="list-group-item">Họ tên: <b>{{$leader->user->name}}</b></li>
                    </ul>
                </div>
            </div>
            <div class="row" style="padding-right: 15px">
                <ul class="list-group">
                    <li class="list-group-item">Sô điện thoại: <b>{{$leader->phone}}</b></li>
                    <li class="list-group-item">Tài khoản: <b>{{$leader->user->email}}</b></li>

                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                {{--<ul class="list-group">--}}
                    {{--<li class="list-group-item">Laptop: <b>Có</b></li>--}}
                    {{--<li class="list-group-item">Thời gian làm việc: <b>Fulltime</b></li>--}}
                    {{--<li class="list-group-item">Ngày bắt đầu: <b>22/11/2011</b></li>--}}
                    {{--<li class="list-group-item">Ngày kết thúc: <b></b></li>--}}
                    {{--<li class="list-group-item">Số CMT: <b>123456789</b></li>--}}
                    {{--<li class="list-group-item">Ngày cấp: <b>11/22/2012</b></li>--}}
                    {{--<li class="list-group-item">Nơi cấp: <b>ThaiLand</b></li>--}}
                    {{--<li class="list-group-item">Mã bảo hiểm: <b>9869586235</b></li>--}}
                    {{--<li class="list-group-item">Mã thuế cá nhân: <b>12451263584</b></li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button data-target="#suaTT" data-toggle="modal" type="button" class="btn btn-primary">Sửa thông tin
            </button>
            {{--Modal--}}
            <div id="suaTT" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Sửa thông tin nhân viên</b></h4>
                        </div>
                        <div class="modal-body" style="padding-left: 30px; padding-right: 30px">
                            <form id="editForm" class="form-horizontal" action="/pm/sua-tk" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="ten">Tên Nhân Viên:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="name" id="ten" value="{{$leader->user->name}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="sdt">Số Điện Thoại:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="phone" id="sdt" value="{{$leader->phone}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="anh">Link ảnh đại diện:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="avatar" id="anh" value="{{$leader->user->picture}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="phongBan">Phòng Ban:</label>
                                    <div class="col-sm-8">
                                        <select id="phongBan" name="phongBan" class="form-control">
                                            <option value="IT">IT</option>
                                            <option value="Nhân Sự">Nhân Sự</option>
                                            <option value="Kế Toán">Kế Toán</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="chucVu">Chức Vụ:</label>
                                    <div class="col-sm-8">
                                        <select id="chucVu" name="chucVu" class="form-control">
                                            <option value="Trưởng phòng">Trưởng Phòng</option>
                                            <option value="Phó Phòng">Phó Phòng</option>
                                            <option value="Nhân Viên Thường">Nhân Viên Thường</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="major">Chuyên Môn:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="chuyenMon" id="major" value="{{$leader->chuyenmon}}">
                                    </div>
                                </div>
                                <input value="{{$leader->id}}" name="idLeader" type="hidden">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <fieldset form="editForm">
                                        <button form="editForm" type="submit" class="btn btn-success">Lưu</button>
                                    </fieldset>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <button data-target="#xoaNV" data-toggle="modal" type="button" class="btn btn-danger">Xóa</button>
            {{--Modal--}}
            <div id="xoaNV" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Xóa nhân viên</b></h4>
                        </div>
                        <div class="modal-body">
                            <p>Bạn chắc chắn xóa nhân viên <b>{{$leader->user->name}}</b> không?
                                Nếu xóa bạn sẽ không còn bất cứ thông tin nào liên quan
                                đến <b>{{$leader->user->name}}</b>.</p>
                        </div>
                        <div class="modal-footer">
                            <form action="/pm/xoa-tk" method="post">
                                {{ csrf_field() }}
                                <input name="idLeader" value="{{$leader->id}}" type="hidden">
                                <button type="submit" class="btn btn-danger">Xóa</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
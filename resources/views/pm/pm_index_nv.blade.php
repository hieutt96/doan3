@extends('layouts.pm_layout')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">PDF</button>
                <button type="button" class="btn btn-default">CSV</button>
            </div>
        </div>
        <div class="col-md-3">
            <form class="form-inline">
                <div class="form-group">
                    <label class="control-label" for="hocKy">Học kỳ:</label>
                    <select id="hocKy" class="form-control" required>
                        <option value="0">20163</option>
                        <option value="1">20171</option>
                        <option value="2">20172</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary">Tạo tài khoản NV</button>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Phòng ban</th>
                <th scope="col">Email</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>

            @for ($i = 0; $i < 10; $i++)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>Nguyễn Văn A</td>
                    <td>Trưởng phòng</td>
                    <td>{{$i}}</td>
                    <td>anv@gmail.com</td>
                    <td>Đang làm việc</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="...">
                            <button  type="button" class="btn btn-default"><a href="/pm/21">Chi tiết NV</a></button>
                            <button data-target="#xoaNV" data-toggle="modal" type="button" class="btn btn-default">Xóa NV</button>
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
                                            <p>Bạn chắc chắn xóa nhân viên [Tên nhân viên] không?
                                            Nếu xóa bạn sẽ không còn bất cứ thông tin nào liên quan
                                            đến nhân viên này.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" href="#">Xóa</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Hủy bỏ
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

@endsection
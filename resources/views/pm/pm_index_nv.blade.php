@extends('layouts.pm_layout')

@section('content')
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form action="/pm/nv" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="name"
                               placeholder="Tìm theo tên"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            </div>

            <div class="col-md-2">
                <button data-target="#taoTKNhanVien" data-toggle="modal" type="button" class="btn btn-primary">Tạo tài
                    khoản
                    Leader
                </button>
                {{--Modal--}}
                <div id="taoTKNhanVien" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>Tạo Tài Khoản cho Leader</b></h4>
                            </div>
                            <div class="modal-body">
                                <form id="taoTKForm" class="form-horizontal" action="/pm/tao-tk" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="ten">Tên Nhân Viên:</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="name" id="ten" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="email">Email:</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="matKhau">Password:</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password" id="matKhau"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="sdt">Số Điện Thoại:</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="phone" id="sdt" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="anh">Link ảnh đại diện:</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="avatar" id="anh" required>
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
                                            <input class="form-control" name="chuyenMon" id="major" required>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-3 ">
                                    <fieldset form="taoTKForm">
                                        <button type="submit" form="taoTKForm" class="btn btn-success">
                                            Tạo Tài Khoản
                                        </button>
                                    </fieldset>
                                </div>
                                <div class="col-sm-2 ">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Hủy bỏ
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ Tên</th>
                    <th scope="col">@sortablelink('phong_ban', 'Phòng Ban')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                    <th scope="col">@sortablelink('chuc_vu', 'Chức Vụ')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>

                @for ($i = 0; $i < count($leaders); $i++)
                    <tr>
                        <th scope="row">{{$i + 1}}</th>
                        <td><a href="/pm/nv/{{$leaders[$i]->id}}/thong-tin-chi-tiet">{{$leaders[$i]->user->name}}</a>
                        </td>
                        <td>{{$leaders[$i]->phong_ban}}</td>
                        <td>{{$leaders[$i]->chuc_vu}}</td>
                        <td>{{$leaders[$i]->user->email}}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>

        @if(count($leaders) == 0)
            <p><b>Không có kết quả phù hợp!</b></p>
        @endif

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                {!! $leaders->appends(\Request::except('page'))->render() !!}
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>

@endsection
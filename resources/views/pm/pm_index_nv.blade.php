@extends('layouts.pm_layout')

@section('content')
    <div class="row">
        <div class="col-md-5">
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
                <th scope="col">
                    @if($isSearch)
                        Họ Tên
                    @else
                        @sortablelink('User.name', 'Họ Tên')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    @endif
                </th>
                <th scope="col">@sortablelink('chucVu', 'Chức Vụ')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">@sortablelink('phongBan', 'Phòng Ban')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Email</th>
                <th scope="col">@sortablelink('trangThai', 'Trạng Thái')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>

            @foreach($leaders as $lead)
                <tr>
                    <th scope="row">{{$lead->id}}</th>
                    <td>{{$lead->user->name}}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>{{$lead->user->email}}</td>
                    <td>-</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default"><a href="/pm/nv/{{$lead->id}}/thong-tin-chi-tiet">Chi tiết NV</a></button>
                            <button data-target="#xoaNV" data-toggle="modal" type="button" class="btn btn-default">Xóa
                                NV
                            </button>
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
            @endforeach
            </tbody>
        </table>
        @if(count($leaders) == 0)
            <p><b>Không có kết quả phù hợp!</b></p>
        @endif
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            {!! $leaders->appends(\Request::except('page'))->render() !!}
        </div>
        <div class="col-md-3">
        </div>
    </div>

@endsection
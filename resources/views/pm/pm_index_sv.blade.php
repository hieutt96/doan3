@extends('layouts.pm_layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="/pm/sv" method="GET" role="search">
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
        <div class="col-md-1">
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
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">MSSV</th>
                <th scope="col">
                    @if($isSearch)
                        Họ Tên
                    @else
                        @sortablelink('User.name', 'Họ Tên')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    @endif
                </th>
                <th scope="col">@sortablelink('lop', 'Lớp')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">@sortablelink('khoa', 'Khóa')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">@sortablelink('boMon', 'Bộ Môn')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">@sortablelink('ctdt', 'CTDT')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col">@sortablelink('idNVPhuTrach', 'Leader')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>


            @foreach($students as $stu)
                <tr>
                    <th scope="row">{{$stu->id}}</th>
                    <td>{{$stu->user->name}}</td>
                    <td>{{$stu->lop}}</td>
                    <td>{{$stu->khoa}}</td>
                    <td>{{$stu->boMon}}</td>
                    <td>{{$stu->ctdt}}</td>
                    <td>{{$stu->sdt}}</td>
                    <td>{{$stu->user->email}}</td>
                    <td>{{$stu->idNVPhuTrach}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="glyphicon glyphicon-cog dropdown-toggle" type="button" id="tuyChon"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="tuyChon">
                                <li><a href="/pm/sv/{{$stu->id}}/thong-tin">Chi tiết</a></li>
                                <li><a href="#">Phân công Leader</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(count($students) == 0)
            <p><b>Không có kết quả phù hợp!</b></p>
        @endif

    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            {!! $students->appends(\Request::except('page'))->render() !!}
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection
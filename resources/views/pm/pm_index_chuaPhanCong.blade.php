@extends('layouts.pm_layout')

@section('content')
    <div class="row">
        <div class="row" style="padding-top: 10px">
            <div class="col-md-4">
                <fieldset form="stuCheckForm" class="form-group form-inline">
                    <button id="phanCong" type="submit" form="stuCheckForm" class="btn btn-primary">Phân công</button>
                    <select name="leaderSelect" form="stuCheckForm" class="form-control" required>
                        @foreach($leaders as $lead)
                            <option value="{{$lead->id}}">{{$lead->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-md-3">
                <form action="/pm/chua-phan-cong" method="get" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" placeholder="Tìm sinh viên theo tên">
                        <span class="input-group-btn">
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

        </div>
    </div>
    <div class="row">
        <form class="form-inline" method="post" id="stuCheckForm" action="/pm/phan-cong">
            {{ csrf_field() }}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="checkbox-inline" style="padding-bottom: 10px">
                            <label><input id="checkAll" type="checkbox" value="0"></label>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#checkAll').on('click', function () {
                                    if (this.checked) {
                                        $('.stuCheck').each(function () {
                                            this.checked = true;
                                        });
                                    } else {
                                        $('.stuCheck').each(function () {
                                            this.checked = false;
                                        });
                                    }
                                });
                            });
                        </script>
                    </th>
                    <th scope="col">MSSV</th>
                    <th scope="col">
                        @if($isSearch)
                            Họ Tên
                        @else
                            @sortablelink('User.name', 'Họ Tên')
                            <div class="glyphicon glyphicon-triangle-bottom"></div>
                        @endif
                    </th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">@sortablelink('tiengAnh', 'Khả năng tiếng anh')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                    <th scope="col">Khả năng lập trình</th>
                    <th scope="col">Lĩnh vực mong muốn</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($students as $stu)
                    <tr>
                        <td>
                            <div class="checkbox-inline">
                                <input name="rowsCheck[]" class="stuCheck" type="checkbox"
                                       value="{{$stu->id}}">
                            </div>
                        </td>
                        <th scope="row">{{$stu->MSSV}}</th>
                        <td>{{$stu->user->name}}</td>
                        <td>{{$stu->sdt}}</td>
                        <td>{{$stu->user->email}}</td>
                        <td>{{$stu->tiengAnh}}</td>
                        <td>{{$stu->kTLTThanhThao}}</td>
                        <td>{{$stu->nenTangMongMonTT}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
        @if(count($students) == 0)
            <p><b>Không có kết quả phù hợp!</b></p>
        @endif

    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5" style="padding-left: 150px">
            {!! $students->appends(\Request::except('page'))->render() !!}
        </div>
        <div class="col-md-3">
            {{--<form class="form-inline" style="padding-top: 20px">--}}
            {{--<div class="form-group">--}}
            {{--<label class="control-label col-sm-7" for="numEntity">Sô sinh viên hiển thị:</label>--}}
            {{--<div class="col-sm-5">--}}
            {{--<select class="form-control" id="numEntity">--}}
            {{--<option>10</option>--}}
            {{--<option>30</option>--}}
            {{--<option>50</option>--}}
            {{--<option>100</option>--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</form>--}}
        </div>
    </div>

@endsection
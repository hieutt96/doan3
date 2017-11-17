@extends('layouts.pm_layout')

@section('content')
    <div class="row">
        <div class="row" style="padding-top: 10px">
            <div class="col-md-4">
                <fieldset form="stuCheckForm" class="form-group form-inline">
                    <button id="phanCong" type="submit" form="stuCheckForm" class="btn btn-primary">Phân công</button>
                    <select name="leaderSelect" form="stuCheckForm" class="form-control" required>
                        @foreach($leaders as $lead)
                            <option value="{{$lead->user->name}}">{{$lead->user->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-md-6">
                <form id="filterForm" action="/pm/phan-cong-leader"  method="get" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm sinh viên theo tên hoặc MSSV">
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

        </div>
    </div>
    <div class="row">
        <form class="form-inline" method="post" id="stuCheckForm" action="/pm/phan-cong">
            {{ csrf_field() }}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
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
                    <th scope="col">@sortablelink('tiengAnh', 'Khả năng tiếng anh')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                    <th scope="col">Khả năng lập trình</th>
                    <th scope="col">Lĩnh vực mong muốn</th>
                    <th scope="col">@sortablelink('tenNVPhuTrach', 'Leader')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                </tr>
                </thead>
                <tbody>

                @for ($i = 0; $i < count($students); $i++)
                    <tr>
                        <th scope="row">{{$i + 1}}</th>
                        <td>
                            <div class="checkbox-inline">
                                <input name="rowsCheck[]" class="stuCheck" type="checkbox"
                                       value="{{$students[$i]->user_id}}">
                            </div>
                        </td>
                        <td>{{$students[$i]->MSSV}}</td>
                        <td>{{$students[$i]->user->name}}</td>
                        <td>{{$students[$i]->tiengAnh}}</td>
                        <td>{{$students[$i]->kTLTThanhThao}}</td>
                        <td>{{$students[$i]->nenTangMongMonTT}}</td>
                        <td>{{$students[$i]->tenNVPhuTrach}}</td>
                    </tr>
                @endfor
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
        </div>
    </div>

@endsection
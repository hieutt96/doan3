@extends('layouts.pm_layout')

@section('content')
    <div class="panel-body">

        <div class="row">
            <div class="col-md-4">
                <fieldset form="stuCheckForm" class="form-group form-inline">
                    <button disabled id="phanCong" type="submit" form="stuCheckForm" class="btn btn-primary">Phân công
                    </button>
                    <select name="leaderSelect" form="stuCheckForm" class="form-control" required>
                        @foreach($leaders as $lead)
                            <option value="{{$lead->user->name}}">{{$lead->user->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-md-6">
                <form id="filterForm" action="/pm/phan-cong-leader" method="get" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search"
                               @if($isSearch)
                               placeholder="{!! $search !!}"
                               @else
                               placeholder="Tìm sinh viên theo tên hoặc MSSV"
                                @endif
                        ><span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>

            </div>
            <div class="col-md-2">
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
                        <th scope="col">@sortablelink('TA', 'Khả năng tiếng anh')
                            <div class="glyphicon glyphicon-triangle-bottom"></div>
                        </th>
                        {{--<th scope="col">Khả năng lập trình</th>--}}
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
                                           value="{{$students[$i]->id}}">
                                </div>
                            </td>
                            <td>{{$students[$i]->mssv}}</td>
                            <td>{{$students[$i]->user->name}}</td>
                            <td>{{$students[$i]->TA}}</td>
                            {{--<td>-</td>--}}
                            <td>{{$students[$i]->knlt_thanhthao}}</td>
                            <td>@if(sizeof($students[$i]->tenNVPhuTrach))
                                    {{$students[$i]->tenNVPhuTrach}}
                                @else
                                    -
                                @endif
                            </td>
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
                <fieldset class="form-inline" style="padding-top: 20px" form="stuCheckForm">
                    <label class="control-label" for="paginate">Số SV hiển thị:</label>
                    <select id="paginate" name="pagiNum" form="filterForm" class="form-control"
                            onchange="this.form.submit()"
                            required>
                        <option value="10" @if ($selectedPag == 10)
                        selected
                                @endif>10
                        </option>
                        <option value="50" @if ($selectedPag == 50)
                        selected
                                @endif>50
                        </option>
                        <option value="100" @if ($selectedPag == 100)
                        selected
                                @endif>100
                        </option>
                    </select>
                </fieldset>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('#checkAll').on('click', function () {
                $('#phanCong').attr('disabled', false);
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
        $('.stuCheck').click(function () {
            $('#phanCong').attr('disabled', false);
        });
    </script>

@endsection
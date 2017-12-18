@extends('layouts.pm_layout')

@section('content')
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form action="/pm/sv" method="GET" id="filterForm">
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
            <div class="col-md-1">
            </div>
            <div class="col-md-3">
                <fieldset class="form-inline" form="filterForm">
                    <label class="control-label" for="hocKy">Học kỳ:</label>
                    <select id="hocKy" name="semester" form="filterForm" class="form-control"
                            onchange="this.form.submit()"
                            required>
                        @foreach($semesters as $sem)
                            <option value="{{$sem->id}}"
                                    @if ($selectedSem == $sem->id)
                                    selected
                                    @endif
                            >{{$sem->ten_hoc_ki}}</option>
                        @endforeach
                    </select>
                </fieldset>

            </div>
        </div>
        <div class="row">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">MSSV</th>
                    <th scope="col">
                        @if($isSearch)
                            Họ Tên
                        @else
                            @sortablelink('User.name', 'Họ Tên')
                            <div class="glyphicon glyphicon-triangle-bottom"></div>
                        @endif
                    </th>
                    <th scope="col">@sortablelink('grade', 'Khóa')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                    <th scope="col">@sortablelink('ctdt', 'CTDT')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">@sortablelink('tenNVPhuTrach', 'Leader')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < count($students); $i++)
                    <tr>
                        <th scope="row">{{$i + 1}}</th>
                        <td scope="row">{{$students[$i]->mssv}}</td>
                        <td><a href="/pm/sv/{{$students[$i]->id}}/thong-tin">{{$students[$i]->user->name}}</a></td>
                        <td>{{$students[$i]->grade}}</td>
                        <td>{{$students[$i]->ctdt}}</td>
                        <td>{{$students[$i]->phone}}</td>
                        <td>{{$students[$i]->user->email}}</td>
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
                <fieldset class="form-inline" style="padding-top: 20px" form="filterForm">
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
@endsection
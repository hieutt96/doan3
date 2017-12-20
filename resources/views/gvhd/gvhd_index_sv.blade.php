@extends('layouts.gvhd_layout')

@section('content')
    <div class="panel-body">

        <div class="row">
            <div class="col-md-6">
                <form action="/gvhd/sv" method="GET" id="filterForm">
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
                            onchange="this.form.submit()" required>
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
                    <th scope="col">
                        {{--<fieldset class="form-inline" form="filterForm">--}}
                        {{--@if($orderBy == 'desc')--}}
                        {{--<input name="companyOrder" type="hidden" form="filterForm" value="asc">--}}
                        {{--@else--}}
                        {{--<input name="companyOrder" type="hidden" form="filterForm" value="desc">--}}
                        {{--@endif--}}
                        {{--<input name="isOrdCom" type="hidden" form="filterForm" value="true">--}}
                        {{--<a href="javascript:$('#filterForm').submit();">Công Ty Thực Tập</a>--}}
                        {{--<div class="glyphicon glyphicon-triangle-bottom"></div>--}}
                        {{--</fieldset>--}}
                        Công Ty Thực Tập
                    </th>
                </tr>
                </thead>
                <tbody>


                @for ($i = 0; $i < count($students); $i++)
                    <tr>
                        <th scope="row">{{$i + 1}}</th>
                        <td scope="row">{{$students[$i]->mssv}}</td>
                        <td><a href="/gvhd/sv/{{$students[$i]->id}}/thong-tin">{{$students[$i]->user->name}}</a></td>
                        <td>{{$students[$i]->grade}}</td>
                        <td>{{$students[$i]->ctdt}}</td>
                        <td>{{$students[$i]->phone}}</td>
                        <td>{{$students[$i]->user->email}}</td>
                        @if(sizeof($companies[$i]) == 0)
                            <td>-</td>
                        @else
                            <td>{{$companies[$i]->name}}</td>
                        @endif
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
            </div>
        </div>
    </div>

@endsection
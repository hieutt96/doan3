@extends('layouts.pm_layout')

@section('content')
    @include('pm.pm_tabs', ['idLead' => $leader->id, 'tab' => 22])
    <div class="row" style="padding-top: 10px">

        <div class="col-md-6">
            <form action="/pm/nv/{{$leader->id}}/sinh-vien-huong-dan" method="get" role="search">
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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">MSSV</th>
                <th scope="col">@if($isSearch)
                        Họ Tên
                    @else
                        @sortablelink('User.name', 'Họ Tên')
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    @endif</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col">@sortablelink('TA', 'Khả năng tiếng anh')
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                {{--<th scope="col">Khả năng lập trình</th>--}}
                <th scope="col">Lĩnh vực mong muốn</th>
            </tr>
            </thead>
            <tbody>

            @for ( $i = 0; $i < count($manaStus); $i++)
                <tr>
                    <th scope="row">{{$i + 1}}</th>
                    <td>{{$manaStus[$i]->mssv}}</td>
                    <td>{{$manaStus[$i]->user->name}}</td>
                    <td>{{$manaStus[$i]->phone}}</td>
                    <td>{{$manaStus[$i]->user->email}}</td>
                    <td>{{$manaStus[$i]->TA}}</td>
                    <td>{{$manaStus[$i]->knlt_thanhthao}}</td>
                    {{--<td>-</td>--}}
                </tr>
            @endfor
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                {!! $manaStus->appends(\Request::except('page'))->render() !!}
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
@endsection
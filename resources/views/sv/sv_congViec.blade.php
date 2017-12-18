@extends('layouts.'.$userType.'_layout')

@section('content')
    <div class="panel-body">

        <div class="row">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="/{{$userType}}/sv/{{$student->id}}/thong-tin">Thông tin chi tiết</a>
                </li>
                <li role="presentation" class="active"><a href="/{{$userType}}/sv/{{$student->id}}/cong-viec">Công
                        việc</a></li>
                <li role="presentation"><a href="/{{$userType}}/sv/{{$student->id}}/ket-qua">Kết quả đánh giá</a></li>
            </ul>
        </div>
        <div class="row" style="padding-top: 10px">
            <div class="col-md-6">
                <form action="/{{$userType}}/sv/{{$student->id}}/cong-viec" method="GET">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search"
                               placeholder="Tìm công việc theo tên"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                {{--<div class="btn-group" role="group" aria-label="...">--}}
                    {{--<button type="button" class="btn btn-default">PDF</button>--}}
                    {{--<button type="button" class="btn btn-default">CSV</button>--}}
                {{--</div>--}}
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            @if($userType == 'leader')
                <form method="post" id="capNhatForm" action="/leader/cap-nhat-cv">
                    {{ csrf_field() }}
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">
                                <div class="checkbox-inline" style="padding-bottom: 10px">
                                    <label><input id="checkAll" type="checkbox" value="0"></label>
                                </div>
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">@sortablelink('trang_thai', 'Trạng thái')
                                <div class="glyphicon glyphicon-triangle-bottom"></div>
                            </th>
                            <th scope="col">Công việc</th>
                            <th scope="col">Nội Dung</th>
                            <th scope="col">@sortablelink('created_at', 'Ngày tạo')
                                <div class="glyphicon glyphicon-triangle-bottom"></div>
                            </th>
                            <th scope="col">@sortablelink('Job.thoi_gian_bat_dau', 'Ngày bắt đầu')
                                <div class="glyphicon glyphicon-triangle-bottom"></div>
                            </th>
                            <th scope="col">@sortablelink('Job.thoi_gian_ket_thuc', 'Ngày kết thúc')
                                <div class="glyphicon glyphicon-triangle-bottom"></div>
                            </th>
                            <th scope="col">@sortablelink('updated_at', 'Ngày cập nhật')
                                <div class="glyphicon glyphicon-triangle-bottom"></div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @for ($i = 0; $i < count($jobs); $i++)
                            <tr>
                                <td>
                                    <div class="checkbox-inline">
                                        <input name="rowsCheck[]" class="jobCheck" type="checkbox"
                                               value="{{$jobs[$i]->id}}">
                                    </div>
                                </td>
                                <th scope="row">{{$i + 1}}</th>
                                <td>@if($jobs[$i]->trang_thai == 0)
                                        Chưa Hoàn Thành
                                    @else
                                        Hoàn Thành
                                    @endif
                                </td>
                                <td>{{$jobs[$i]->job->ten_cong_viec}}</td>
                                <td>{{$jobs[$i]->job->noi_dung_chi_tiet}}</td>
                                @php($creDate = new DateTime($jobs[$i]->created_at))
                                <td>{{$creDate->format('Y-m-d')}}</td>
                                <td>{{$jobs[$i]->job->thoi_gian_bat_dau}}</td>
                                <td>{{$jobs[$i]->job->thoi_gian_ket_thuc}}</td>
                                @php($update = new DateTime($jobs[$i]->updated_at))
                                <td>{{$update->format('Y-m-d')}}</td>
                            </tr>
                        @endfor

                        </tbody>
                    </table>
                    @if($userType == 'leader')
                        <div class="form-inline">
                            <label class="control-label" for="trangThai">Chọn trạng thái muốn cập nhật: </label>
                            <select class="form-control" name="trangThai" id="trangThai">
                                <option value="0">Chưa Hoàn Thành</option>
                                <option value="1">Hoàn Thành</option>
                            </select>
                            <button disabled id="btn_suaTT" type="submit" class="btn btn-success">Cập Nhật</button>

                        </div>
                </form>
            @endif

        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                {!! $jobs->appends(\Request::except('page'))->render() !!}
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(function () {
            $('#checkAll').on('click', function () {
                $('#btn_suaTT').attr('disabled', false);
                if (this.checked) {
                    $('.jobCheck').each(function () {
                        this.checked = true;
                    });
                } else {
                    $('.jobCheck').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
        $('.jobCheck').click(function () {
            $('#btn_suaTT').attr('disabled', false);
        });
    </script>
@endsection
@extends('layouts.leader_layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="/leader/danh-gia" method="GET" id="filterForm">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="search"
                           placeholder="Tìm sinh viên theo tên hoặc MSSV"> <span class="input-group-btn">
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
        <div class="col-md-4">
            <button id="btn_danhGia" disabled="disabled" type="button" data-target="#danhGiaModal" data-toggle="modal" class="btn btn-success">Đánh Giá
            </button>
            {{--Modal--}}
            <div id="danhGiaModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Đánh Giá Sinh Viên </b></h4>
                        </div>
                        <div class="modal-body" style="padding-left: 30px; padding-right: 30px">
                            <fieldset class="form-horizontal" form="danhGiaForm">
                                <p style="color: red"><i>Tất cả điểm trên thang 5</i></p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-7">Năng lực IT:</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" form="danhGiaForm" name="nangLucIT"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-7">Phương pháp làm việc:</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" form="danhGiaForm" name="ppLamViec"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-7">Năng lực năm bắt:</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" form="danhGiaForm" name="nangLucNamBatCV"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-7">Năng lực quản lý:</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" form="danhGiaForm" name="nangLucQuanLi"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-7">Năng lực tiếng anh:</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" form="danhGiaForm" name="tiengAnh"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-7">Năng lực làm việc nhóm:</label>
                                            <div class="col-sm-5">
                                                <input type="number" class="form-control" form="danhGiaForm" name="nangLucLamViecNhom"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">Xếp Loại:</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" form="danhGiaForm"
                                                       name="danhGiaCongTy" placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Nhận Xét:</label>
                                            <textarea class="form-control" form="danhGiaForm" name="nhanXetCongTy"
                                                      rows="5" id="comment" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <fieldset form="danhGiaForm">
                                        <button form="danhGiaForm" type="submit" class="btn btn-success">Lưu</button>
                                    </fieldset>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <form method="post" id="danhGiaForm" action="/leader/danh-gia">
            {{ csrf_field() }}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="checkbox-inline" style="padding-bottom: 10px">
                            <label><input id="checkAll" type="checkbox" value="0"></label>
                        </div>
                    </th>
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
                    <th scope="col">Tổng số CV</th>
                    <th scope="col">Số CV chưa hoàn thành</th>
                    <th scope="col">Mức độ hoàn thành</th>
                    {{--<th scope="col">Xếp Loại</th>--}}

                </tr>
                </thead>
                <tbody>


                @for ($i = 0; $i < count($students); $i++)
                    <tr>
                        <td>
                            <div class="checkbox-inline">
                                <input name="rowsCheck[]" class="stuCheck" type="checkbox"
                                       value="{{$students[$i]->id}}">
                            </div>
                        </td>
                        <th scope="row">{{$i + 1}}</th>
                        <td>{{$students[$i]->MSSV}}</td>
                        <td><a href="/leader/sv/{{$students[$i]->id}}/thong-tin">{{$students[$i]->user->name}}</a>
                        </td>
                        <td>{{$totalJobs[$i]}}</td>
                        <td>{{$outDateJobs[$i]}}</td>
                        @if($totalJobs[$i] > 0)
                            <td>{{number_format((($totalJobs[$i] - $outDateJobs[$i])/$totalJobs[$i])*100, 2)}} %</td>
                        @else
                            <td>0 %</td>
                        @endif
                        {{--<td>-</td>--}}
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
        <div class="col-md-5">
            {!! $students->appends(\Request::except('page'))->render() !!}
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#checkAll').on('click', function () {
                $('#btn_danhGia').attr('disabled', false);
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
        $('.stuCheck').click(function() {
            $('#btn_danhGia').attr('disabled', false);
        });
    </script>
@endsection
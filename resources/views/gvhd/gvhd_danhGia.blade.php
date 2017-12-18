@extends('layouts.gvhd_layout')

@section('content')
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form action="/gvhd/danh-gia-thuc-tap" method="GET" id="filterForm">
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
            </div>
            <div class="col-md-4">
                <button id="btn_danhGia" disabled="disabled" type="button" data-target="#danhGiaModal"
                        data-toggle="modal" class="btn btn-success">Đánh Giá
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="diem">Xếp Loại:</label>
                                                <select class="form-control" id="diem" form="danhGiaForm"
                                                        name="diem">
                                                    <option value="4">A+</option>
                                                    <option value="4">A</option>
                                                    <option value="3.5">B+</option>
                                                    <option value="3">B</option>
                                                    <option value="2.5">C+</option>
                                                    <option value="2">C</option>
                                                    <option value="1.5">D+</option>
                                                    <option value="1">d</option>
                                                    <option value="0">F</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Nhận Xét:</label>
                                                <textarea class="form-control" form="danhGiaForm"
                                                          name="nhanXetGiangVien"
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
                                            <button form="danhGiaForm" type="submit" class="btn btn-success">Lưu
                                            </button>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <form method="post" id="danhGiaForm" action="/gvhd/danh-gia">
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
                        <th scope="col">Khóa</th>
                        <th scope="col">Đánh Giá Công Ty</th>
                        <th scope="col">Đánh Giá Giảng Viên</th>
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
                            <td>{{$students[$i]->mssv}}</td>
                            <td><a href="/gvhd/sv/{{$students[$i]->id}}/thong-tin">{{$students[$i]->user->name}}</a>
                            </td>
                            <td>{{$students[$i]->grade}}</td>
                            @if(sizeof($results[$i]) == 0)
                                <td>-</td>
                                <td>-</td>
                            @else
                                <td>{{$results[$i]->danh_gia_cua_cong_ty}}</td>
                                <td>{{$results[$i]->diem}}</td>
                            @endif
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
        $('.stuCheck').click(function () {
            $('#btn_danhGia').attr('disabled', false);
        });
    </script>
@endsection
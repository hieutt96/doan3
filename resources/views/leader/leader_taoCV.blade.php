@extends('layouts.leader_layout')

@section('content')
    <div class="panel-body">
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
            <div class="col-md-4">
                <button id="btn_taoCV" data-target="#taoCV" data-toggle="modal" type="button"
                        class="btn btn-primary" disabled="disabled">
                    Tạo Công Việc
                </button>
                {{--Modal--}}
                <div id="taoCV" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>Tạo Công Việc cho Sinh Viên</b></h4>
                            </div>
                            <div class="modal-body">
                                <fieldset form="taoCVForm" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="nd">Tên Công Việc:</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" form="taoCVForm" name="ten" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="nd">Nội Dung:</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" form="taoCVForm" rows="3"
                                                      name="noiDung"
                                                      id="nd" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Thời Gian Bắt Đầu:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" form="taoCVForm" name="tgBatDau"
                                                   placeholder="dd/mm/yyyy" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Thời Gian Kết Thúc:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" form="taoCVForm"
                                                   name="tgKetThuc"
                                                   placeholder="dd/mm/yyyy" required>
                                        </div>
                                    </div>
                                    <input type="hidden" form="taoCVForm" value="{{$leader->id}}" name="idLeader">
                                </fieldset>

                            </div>
                            <div class="modal-footer">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-3 ">
                                    <fieldset form="taoCVForm">
                                        <button type="submit" form="taoCVForm" class="btn btn-success" href="#">
                                            Tạo Việc
                                        </button>
                                    </fieldset>
                                </div>
                                <div class="col-sm-2 ">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Hủy bỏ
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form id="filterForm" action="/leader/tao-cong-viec" method="get" role="search">
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
                {{--<div class="btn-group" role="group" aria-label="...">--}}
                {{--<button type="button" class="btn btn-default">PDF</button>--}}
                {{--<button type="button" class="btn btn-default">CSV</button>--}}
                {{--</div>--}}
            </div>

        </div>
        <div class="row">
            <form method="post" id="taoCVForm" action="/leader/tao-cv">
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
                        {{--<th scope="col">Khả năng lập trình</th>--}}
                        <th scope="col">Lĩnh vực mong muốn</th>
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
                            <td>{{$students[$i]->user->name}}</td>
                            <td>{{$students[$i]->TA}}</td>
                            <td>{{$students[$i]->knlt_thanhthao}}</td>
                            {{--                        <td>{{$stu->nenTangMongMonTT}}</td>--}}
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
    </div>

    <script type="text/javascript">
        $(function () {
            $('#checkAll').on('click', function () {
                $('#btn_taoCV').attr('disabled', false);
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
            $('#btn_taoCV').attr('disabled', false);
        });
    </script>
@endsection

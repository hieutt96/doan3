@extends('layouts.pm_layout')

@section('content')
    <div class="row">
        <div class="row" style="padding-top: 10px">

            <div class="col-md-5">
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
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
            <div class="col-md-2">
                <button type="button" class="btn btn-primary">Phân công Leader tự động</button>
            </div>

        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">MSSV</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Khả năng tiếng anh</th>
                <th scope="col">Khả năng lập trình</th>
                <th scope="col">Lĩnh vực mong muốn</th>
                <th scope="col">Leader</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>

            @for ($i = 0; $i < 10; $i++)
                <tr>
                    <th scope="row">20140789</th>
                    <td>Nguyễn Văn A</td>
                    <td>0124512332</td>
                    <td>anv@gmail.com</td>
                    <td>990 TOEIC</td>
                    <td>Master Java</td>
                    <td>Java</td>
                    <td>-</td>
                    <td>
                        <button class="btn btn-primary" data-target="#phanCong" data-toggle="modal">Phân công</button>
                        {{--Modal--}}
                        <div id="phanCong" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><b>Phân công nhân viên hướng dẫn</b></h4>
                                    </div>
                                    <div class="modal-body" style="padding-left: 30px; padding-right: 30px">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Tên sinh viên:</label>
                                                <div class="col-sm-9">
                                                    <p class="form-control-static">Đoàn Thúy Nga</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Lĩnh vực mông muốn:</label>
                                                <div class="col-sm-9">
                                                    <p class="form-control-static">IOS</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="phongBan" class="control-label col-sm-3">Phòng ban:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="phongBan">
                                                        <option value="0">Design</option>
                                                        <option value="1">Back-end</option>
                                                        <option value="2">Front-end</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="chucVu" class="control-label col-sm-3">Chức vụ:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="chucVu">
                                                        <option value="0">Developer</option>
                                                        <option value="1">Leader</option>
                                                        <option value="2">Fresher</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tenNV" class="control-label col-sm-3">Tên nhân viên:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="tenNV">
                                                        <option value="0">Nguyễn Văn A</option>
                                                        <option value="1">Phạm Tấn Tài</option>
                                                        <option value="2">Trương Duy B</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-success" href="#">Lưu</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5" style="padding-left: 150px">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
        </div>
        <div class="col-md-3">
            <form class="form-inline" style="padding-top: 20px">
                <div class="form-group">
                    <label class="control-label col-sm-7" for="numEntity">Sô sinh viên hiển thị:</label>
                    <div class="col-sm-5">
                        <select class="form-control" id="numEntity">
                            <option>10</option>
                            <option>30</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
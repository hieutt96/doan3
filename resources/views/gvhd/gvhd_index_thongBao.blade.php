@extends('layouts.gvhd_layout')
@section('content')
    <div class="row" style="margin-left: 5px">
        <div class="col-md-9">
            @for($i=0; $i<10; $i++)
                <div class="row" style="padding-bottom: 10px">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="datePost row">22</div>
                            <div class="monthPost row">AUGUST</div>
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <h4>Danh sách phân công và đăng ký thực tập bổ sung kỳ học 20171 - Thông báo số 2</h4>
                            </div>
                            <div class="row">
                                <h5>Đăng bởi: Admin</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Theo quyết định số 4179/QĐ-ĐHBK-SĐH ngày 05 tháng 10 năm 2016 của Hiệu trưởng Đại học Bách Khoa
                                Hà Nội, Bộ môn Hệ thống thông tin thông báo việc xét tuyển đào tạo Thạc sĩ theo định hướng
                                <a href="http://is.hust.edu.vn"><b><u>Xem Tiếp</u></b></a>
                            </p>
                        </div>

                    </div>
                </div>
            @endfor
                <div class="row">
                    <div class="col-md-7" style="padding-left: 150px">
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
                    <div class="col-md-5">
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
        </div>
        <div class="col-md-3" style="background-color: #e7e7e7">
            <label class="control-label">Tìm kiếm</label>
            <div class="input-group stylish-input-group">
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </div>
            <h4>Liên kết ngoài</h4>
            <h5><a href="http://soict.hust.edu.vn">Viện Công Nghệ Thông tin và truyền thông</a></h5>
        </div>
    </div>
@endsection
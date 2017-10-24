@extends('admin.dat_admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
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
        <div class="col-md-2">

        </div>

        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownHocKy"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Học kỳ
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownHocKy">
                    <li><a href="#">20163</a></li>
                    <li><a href="#">20171</a></li>
                    <li><a href="#">20172</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">MSSV</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Lớp</th>
                <th scope="col">Khóa</th>
                <th scope="col">Bộ môn</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Mã môn học</th>
                <th scope="col">Công Ty thực tập</th>
                <th scope="col">Đánh giá Công ty</th>
                <th scope="col">Đánh giá GVHD</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>

            @for ($i = 0; $i < 10; $i++)
                <tr>
                    <th scope="row">20141234</th>
                    <td>Nguyễn Văn B</td>
                    <td>CNTT2.3</td>
                    <td>K59</td>
                    <td>CNPM</td>
                    <td>0987785412</td>
                    <td>IT4491</td>
                    <td>FPT</td>
                    <td>A</td>
                    <td>-</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-xs">Sửa đánh giá</button>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
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
        </nav>
    </div>
@endsection
<?php $__env->startSection('content'); ?>
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

            <?php for($i = 0; $i < 10; $i++): ?>
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
            <?php endfor; ?>
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
                    <label class="control-label col-sm-7" for="numEntity">S sinh viên hiển thị:</label>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gvhd_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="/pm/21">Thông tin chi tiết</a></li>
            <li role="presentation" class="active"><a href="/pm/22">Sinh Viên Hướng Dẫn Thực Tập</a></li>
        </ul>
    </div>
    <div class="row" style="padding-top: 10px">

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
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Khả năng tiếng anh</th>
                <th scope="col">Khả năng lập trình</th>
                <th scope="col">Lĩnh vực mong muốn</th>
            </tr>
            </thead>
            <tbody>

            <?php for($i = 0; $i < 10; $i++): ?>
                <tr>
                    <th scope="row">20140789</th>
                    <td>Nguyễn Văn A</td>
                    <td>0124512332</td>
                    <td>anv@gmail.com</td>
                    <td>990 TOEIC</td>
                    <td>Master Java</td>
                    <td>Java</td>
                </tr>
            <?php endfor; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pm_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
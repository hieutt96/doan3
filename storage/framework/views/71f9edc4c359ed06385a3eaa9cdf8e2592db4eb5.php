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
                <th scope="col">Mã</th>
                <th scope="col">Tên Doanh Nghiệp</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số lượng SVTT</th>
                <th scope="col">Nhân Viên PTTT</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>

            <?php for($i = 0; $i < 10; $i++): ?>
                <tr>
                    <th scope="row"><?php echo e($i); ?></th>
                    <td>Công ty <?php echo e($i); ?></td>
                    <td>Hai Bà Trưng, Hà Nội</td>
                    <td>70</td>
                    <td>Nguyễn Văn A</td>
                    <td>0124512332</td>
                    <td>congty@gmail.com</td>
                    <td>
                        <div class="dropdown">
                            <button class="glyphicon glyphicon-cog dropdown-toggle" type="button" id="tuyChon"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="tuyChon">
                                <li><a href="#">Xem thông tin</a></li>
                                <li><a href="#">Xóa</a></li>
                            </ul>
                        </div>
                    </td>
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
<?php echo $__env->make('gvhd.dat_gvhd_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
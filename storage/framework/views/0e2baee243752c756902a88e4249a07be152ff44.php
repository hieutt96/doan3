<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="/pm/sv" method="GET" role="search">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="name"
                           placeholder="Tìm theo tên"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
                </div>
            </form>

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
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">MSSV</th>
                <th scope="col">
                    <?php if($isSearch): ?>
                        Họ Tên
                    <?php else: ?>
                        <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('User.name', 'Họ Tên'));?>
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    <?php endif; ?>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('lop', 'Lớp'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('khoa', 'Khóa'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('boMon', 'Bộ Môn'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('ctdt', 'CTDT'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('idNVPhuTrach', 'Leader'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>


            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($stu->id); ?></th>
                    <td><?php echo e($stu->user->name); ?></td>
                    <td><?php echo e($stu->lop); ?></td>
                    <td><?php echo e($stu->khoa); ?></td>
                    <td><?php echo e($stu->boMon); ?></td>
                    <td><?php echo e($stu->ctdt); ?></td>
                    <td><?php echo e($stu->sdt); ?></td>
                    <td><?php echo e($stu->user->email); ?></td>
                    <td><?php echo e($stu->idNVPhuTrach); ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="glyphicon glyphicon-cog dropdown-toggle" type="button" id="tuyChon"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="tuyChon">
                                <li><a href="/pm/sv/info/<?php echo e($stu->id); ?>">Chi tiết</a></li>
                                <li><a href="#">Phân công Leader</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if(count($students) == 0): ?>
            <p><b>Không có kết quả phù hợp!</b></p>
        <?php endif; ?>

    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <?php echo $students->appends(\Request::except('page'))->render(); ?>

        </div>
        <div class="col-md-3">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pm_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
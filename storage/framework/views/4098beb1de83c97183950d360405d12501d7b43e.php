<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('pm.pm_tabs', ['idLead' => $leader->id, 'tab' => 22], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="row" style="padding-top: 10px">

        <div class="col-md-6">
            <form action="/pm/nv/<?php echo e($leader->id); ?>/sinh-vien-huong-dan" method="get" role="search">
                <?php echo e(csrf_field()); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="name" placeholder="Tìm sinh viên theo tên">
                    <span class="input-group-btn">
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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">MSSV</th>
                <th scope="col"><?php if($isSearch): ?>
                        Họ Tên
                    <?php else: ?>
                        <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('User.name', 'Họ Tên'));?>
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    <?php endif; ?></th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('tiengAnh', 'Khả năng tiếng anh'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Khả năng lập trình</th>
                <th scope="col">Lĩnh vực mong muốn</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $manaStus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($stu->MSSV); ?></th>
                    <td><?php echo e($stu->user->name); ?></td>
                    <td><?php echo e($stu->sdt); ?></td>
                    <td><?php echo e($stu->user->email); ?></td>
                    <td><?php echo e($stu->tiengAnh); ?></td>
                    <td><?php echo e($stu->kTLTThanhThao); ?></td>
                    <td>-</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
                <?php echo $manaStus->appends(\Request::except('page'))->render(); ?>

            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pm_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
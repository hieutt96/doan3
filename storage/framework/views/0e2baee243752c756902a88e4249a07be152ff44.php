<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="/pm/sv" method="GET" id="filterForm">
                <?php echo e(csrf_field()); ?>

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
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">PDF</button>
                <button type="button" class="btn btn-default">CSV</button>
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
            <fieldset class="form-inline" form="filterForm">
                <label class="control-label" for="hocKy">Học kỳ:</label>
                <select id="hocKy" name="semester" form="filterForm" class="form-control" onchange="this.form.submit()" required>
                    <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sem); ?>"
                            <?php if($selectedSem == $sem): ?>
                            selected
                            <?php endif; ?>
                        ><?php echo e($sem); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </fieldset>

        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">MSSV</th>
                <th scope="col">
                    <?php if($isSearch): ?>
                        Họ Tên
                    <?php else: ?>
                        <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('User.name', 'Họ Tên'));?>
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    <?php endif; ?>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('khoa', 'Khóa'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('ctdt', 'CTDT'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Email</th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('tenNVPhuTrach', 'Leader'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
            </tr>
            </thead>
            <tbody>


            <?php for($i = 0; $i < count($students); $i++): ?>
                <tr>
                    <th scope="row"><?php echo e($i + 1); ?></th>
                    <td scope="row"><?php echo e($students[$i]->MSSV); ?></td>
                    <td><a href="/pm/sv/<?php echo e($students[$i]->user_id); ?>/thong-tin"><?php echo e($students[$i]->user->name); ?></a></td>
                    <td><?php echo e($students[$i]->khoa); ?></td>
                    <td><?php echo e($students[$i]->ctdt); ?></td>
                    <td><?php echo e($students[$i]->sdt); ?></td>
                    <td><?php echo e($students[$i]->user->email); ?></td>
                    <td><?php echo e($students[$i]->tenNVPhuTrach); ?></td>
                </tr>
            <?php endfor; ?>
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
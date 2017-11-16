<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="row" style="padding-top: 10px">
            <div class="col-md-4">
                <fieldset form="stuCheckForm" class="form-group form-inline">
                    <button id="phanCong" type="submit" form="stuCheckForm" class="btn btn-primary">Phân công</button>
                    <select name="leaderSelect" form="stuCheckForm" class="form-control" required>
                        <?php $__currentLoopData = $leaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lead->user->name); ?>"><?php echo e($lead->user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </fieldset>
            </div>
            <div class="col-md-6">
                <form id="filterForm" action="/pm/phan-cong-leader"  method="get" role="search">
                    <?php echo e(csrf_field()); ?>

                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm sinh viên theo tên hoặc MSSV">
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

        </div>
    </div>
    <div class="row">
        <form class="form-inline" method="post" id="stuCheckForm" action="/pm/phan-cong">
            <?php echo e(csrf_field()); ?>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        <div class="checkbox-inline" style="padding-bottom: 10px">
                            <label><input id="checkAll" type="checkbox" value="0"></label>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#checkAll').on('click', function () {
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
                        </script>
                    </th>
                    <th scope="col">MSSV</th>
                    <th scope="col">
                        <?php if($isSearch): ?>
                            Họ Tên
                        <?php else: ?>
                            <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('User.name', 'Họ Tên'));?>
                            <div class="glyphicon glyphicon-triangle-bottom"></div>
                        <?php endif; ?>
                    </th>
                    <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('tiengAnh', 'Khả năng tiếng anh'));?>
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                    <th scope="col">Khả năng lập trình</th>
                    <th scope="col">Lĩnh vực mong muốn</th>
                    <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('tenNVPhuTrach', 'Leader'));?>
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="checkbox-inline">
                                <input name="rowsCheck[]" class="stuCheck" type="checkbox"
                                       value="<?php echo e($stu->user_id); ?>">
                            </div>
                        </td>
                        <th scope="row"><?php echo e($stu->MSSV); ?></th>
                        <td><?php echo e($stu->user->name); ?></td>
                        <td><?php echo e($stu->tiengAnh); ?></td>
                        <td><?php echo e($stu->kTLTThanhThao); ?></td>
                        <td><?php echo e($stu->nenTangMongMonTT); ?></td>
                        <td><?php echo e($stu->tenNVPhuTrach); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </form>
        <?php if(count($students) == 0): ?>
            <p><b>Không có kết quả phù hợp!</b></p>
        <?php endif; ?>

    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5" style="padding-left: 150px">
            <?php echo $students->appends(\Request::except('page'))->render(); ?>

        </div>
        <div class="col-md-3">
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pm_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
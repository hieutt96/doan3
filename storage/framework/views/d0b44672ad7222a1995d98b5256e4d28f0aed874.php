<?php $__env->startSection('content'); ?>
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="/<?php echo e($userType); ?>/sv/<?php echo e($student->user_id); ?>/thong-tin">Thông tin chi tiết</a>
            </li>
            <li role="presentation" class="active"><a href="/<?php echo e($userType); ?>/sv/<?php echo e($student->user_id); ?>/cong-viec">Công
                    việc</a></li>
            <li role="presentation"><a href="/<?php echo e($userType); ?>/sv/<?php echo e($student->user_id); ?>/ket-qua">Kết quả đánh giá</a></li>
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
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Công việc</th>
                <th scope="col">Nội Dung</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày bắt đầu</th>
                <th scope="col">Ngày kết thúc</th>
                <th scope="col">Ngày cập nhật</th>
            </tr>
            </thead>
            <tbody>

            <?php for($i = 0; $i < count($jobs); $i++): ?>
                <tr>
                    <th scope="row"><?php echo e($i + 1); ?></th>
                    <td><?php if($jobs[$i]->trang_thai == 1): ?>
                            Mới
                        <?php else: ?>
                            Hoàn Thành
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($jobs[$i]->job->ten); ?></td>
                    <td><?php echo e($jobs[$i]->job->noiDung); ?></td>
                    <?php ($creDate = new DateTime($jobs[$i]->created_at)); ?>
                    <td><?php echo e($creDate->format('d-m-Y')); ?></td>
                    <td><?php echo e($jobs[$i]->job->tgBatDau); ?></td>
                    <td><?php echo e($jobs[$i]->job->tgKetThuc); ?></td>
                    <td>-</td>
                </tr>
            <?php endfor; ?>

            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <?php echo $jobs->appends(\Request::except('page'))->render(); ?>

        </div>
        <div class="col-md-3">
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$userType.'_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
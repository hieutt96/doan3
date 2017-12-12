<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-lg-2">
            <div class="row">
                <label class="label-control"><span class="glyphicon glyphicon-home"></span> Dashboard</label>
            </div>
            <hr>
            <div class="row dropdown">
                <p class="dropdown-toggle " data-toggle="dropdown">Quản lí công ty <span class="caret"
                                                                                         style="cursor: pointer;"></span>
                </p>
                <ul class="dropdown-menu">
                    <li><a href="#">Xác nhận công ty</a></li>
                    <li><a href="">Quản lí công ty</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Công Ty</th>
                    <th>Địa Chỉ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Số lượng SV có thể nhận</th>
                    <th>Hoạt Động</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $companys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($company->id); ?></td>
                        <td><?php echo e($company->name); ?></td>
                        <td><?php echo e($company->diaChi); ?></td>
                        <td>
                            <?php echo e($company->emailnv); ?>

                        </td>
                        <td><?php echo e($company->phone); ?></td>
                        <td><?php echo e($company->soLuongSinhVienTT); ?></td>
                        <td>
                            <button class="btn btn-default col-lg-6" id="accept">Accept</button>
                            <input type="hidden" name="" value="<?php echo e($company->id); ?>">
                            <button class="btn btn-info col-lg-5 col-lg-offset-1" id="cancel">Cancel</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/js/admin/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
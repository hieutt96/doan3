<?php $__env->startSection('content'); ?>
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="/<?php echo e($userType); ?>/sv/<?php echo e($student->user_id); ?>/thong-tin">Thông tin chi tiết</a>
            </li>
            <li role="presentation"><a href="/<?php echo e($userType); ?>/sv/<?php echo e($student->user_id); ?>/cong-viec">Công
                    việc</a></li>
            <li role="presentation"><a href="/<?php echo e($userType); ?>/sv/<?php echo e($student->user_id); ?>/ket-qua">Kết quả đánh giá</a></li>
        </ul>
    </div>
    <div class="row" style="padding-top: 10px">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5">
                    <div class="thumbnail">
                        <a href="#">
                            <img class="portrait img-thumbnail" src="<?php echo e($student->avatar); ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <ul class="list-group">
                        <li class="list-group-item">Họ tên: <b><?php echo e($student->user->name); ?></b></li>
                        <li class="list-group-item">Lớp: <b><?php echo e($student->lop); ?></b></li>
                        <li class="list-group-item">Số điện thoại: <b><?php echo e($student->sdt); ?></b></li>
                        <li class="list-group-item">Giới tính: <b>
                                <?php if($student->gioiTinh == 0): ?>
                                    Nữ
                                <?php else: ?>
                                    Nam
                                <?php endif; ?>
                            </b></li>
                    </ul>
                </div>
            </div>
            <div class="row" style="padding-right: 15px">
                <ul class="list-group">
                    <li class="list-group-item">Email: <b><?php echo e($student->user->email); ?></b></li>
                    <li class="list-group-item">Địa chỉ đang ở: <b><?php echo e($student->diaChi); ?></b></li>
                    <li class="list-group-item">Tài khoản: <b><?php echo e($student->user->email); ?></b></li>
                    <li class="list-group-item">Laptop: <b>
                            <?php if($student->laptop == 0): ?>
                                Không
                            <?php else: ?>
                                Có
                            <?php endif; ?>
                        </b></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <ul class="list-group">
                    <li class="list-group-item">Bộ môn: <b><?php echo e($student->boMon); ?></b></li>
                    <li class="list-group-item">Mã môn học: <b>IT4991</b></li>
                    <li class="list-group-item">Điểm CPA: <b><?php echo e($student->CPA); ?></b></li>
                    <li class="list-group-item">Khả năng tiếng anh: <b><?php echo e($student->tiengAnh); ?></b></li>
                    <li class="list-group-item">Kỹ năng lập trình thành thạo: <b><?php echo e($student->kTLTThanhThao); ?></b></li>
                    <li class="list-group-item">Kỹ năng lập trình có thể sử dụng: <b>Null</b></li>
                    <li class="list-group-item">Kỹ năng làm chủ công nghệ: <b>Null</b></li>
                    <li class="list-group-item">Kỹ năng khác: <b><?php echo e($student->kyNangKhac); ?></b></li>
                    <li class="list-group-item">Lĩnh vực thực tập: <b><?php echo e($student->nenTangMongMuon); ?></b></li>
                </ul>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$userType.'_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
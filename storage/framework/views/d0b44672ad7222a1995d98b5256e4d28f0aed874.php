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
        <form method="post" id="capNhatForm" action="/leader/cap-nhat-cv">
            <?php echo e(csrf_field()); ?>

            <table class="table">
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
                        <td>
                            <div class="checkbox-inline">
                                <input name="rowsCheck[]" class="stuCheck" type="checkbox"
                                       value="<?php echo e($jobs[$i]->id); ?>">
                            </div>
                        </td>
                        <th scope="row"><?php echo e($i + 1); ?></th>
                        <td><?php if($jobs[$i]->trang_thai == 0): ?>
                                Chưa Hoàn Thành
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
            <div class="form-inline">
                <label class="control-label" for="trangThai">Chọn trạng thái muốn cập nhật: </label>
                <select class="form-control" name="trangThai" id="trangThai">
                    <option value="0">Chưa Hoàn Thành</option>
                    <option value="1">Hoàn Thành</option>
                </select>
                <button type="submit" class="btn btn-success">Cập Nhật</button>

            </div>
        </form>
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
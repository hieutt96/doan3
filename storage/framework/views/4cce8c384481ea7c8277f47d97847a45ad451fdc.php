<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="/pm/nv" method="GET" role="search">
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
        <div class="col-md-4">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">PDF</button>
                <button type="button" class="btn btn-default">CSV</button>
            </div>
        </div>

        <div class="col-md-2">
            <button type="button" class="btn btn-primary">Tạo tài khoản NV</button>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">
                    <?php if($isSearch): ?>
                        Họ Tên
                    <?php else: ?>
                        <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('User.name', 'Họ Tên'));?>
                        <div class="glyphicon glyphicon-triangle-bottom"></div>
                    <?php endif; ?>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('chucVu', 'Chức Vụ'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('phongBan', 'Phòng Ban'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Email</th>
                <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('trangThai', 'Trạng Thái'));?>
                    <div class="glyphicon glyphicon-triangle-bottom"></div>
                </th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody>

            <?php for($i = 0; $i < count($leaders); $i++): ?>
                <tr>
                    <th scope="row"><?php echo e($leaders[$i]->user_id); ?></th>
                    <td><a href="/pm/nv/<?php echo e($leaders[$i]->user_id); ?>/thong-tin-chi-tiet"><?php echo e($leaders[$i]->user->name); ?></a>
                    </td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo e($leaders[$i]->user->email); ?></td>
                    <td>-</td>
                    <td>
                        <button data-target="#xoaNV" data-toggle="modal" type="button" class="btn btn-default">Xóa
                            NV
                        </button>
                        
                        <div id="xoaNV" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><b>Xóa nhân viên</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn chắc chắn xóa nhân viên [Tên nhân viên] không?
                                            Nếu xóa bạn sẽ không còn bất cứ thông tin nào liên quan
                                            đến nhân viên này.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" href="#">Xóa</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Hủy bỏ
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>
            <?php endfor; ?>
            </tbody>
        </table>
        <?php if(count($leaders) == 0): ?>
            <p><b>Không có kết quả phù hợp!</b></p>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-5">
            <?php echo $leaders->appends(\Request::except('page'))->render(); ?>

        </div>
        <div class="col-md-3">
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pm_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
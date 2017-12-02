<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-6">
            <div class="row">
                <h3>Gửi thông báo</h3>
                <form action="/<?php echo e($userType); ?>/gui-tb" method="post">
                    <?php echo e(csrf_field()); ?>

                    
                    
                    <?php if($userType == 'pm'): ?>
                        <input name="nguoiGui" value="220" type="hidden">
                    <?php else: ?>
                        <input name="nguoiGui" value="215" type="hidden">
                    <?php endif; ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="control-label" for="user">Chọn kiểu người nhận</label>
                                <select id="user" name="nguoiNhan" class="form-control" required>
                                    <?php for($i = 0; $i < count($receUsers); $i++): ?>
                                        <option value="<?php echo e($i); ?>"><?php echo e($receUsers[$i]); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-sm-7">
                                
                                
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        <label for="name">Tên Thông Báo:</label>
                        <input name="ten" class="form-control" rows="5" id="name"></input>

                        <label for="comment">Nội Dung:</label>
                        <textarea name="noiDung" class="form-control" rows="5" id="comment"></textarea>
                        <button type="submit" class="btn btn-success">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.'.$userType.'_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
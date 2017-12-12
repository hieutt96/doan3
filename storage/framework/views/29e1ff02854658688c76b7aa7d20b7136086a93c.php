<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sv.sv_ketQua', ['user_type' => 'pm'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pm_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
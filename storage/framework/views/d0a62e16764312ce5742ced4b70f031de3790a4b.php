<?php $__env->startSection('top-nav'); ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, PM's name <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/pm/thong-bao">Thông báo</a></li>
                        <li><a href="#">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('left-nav'); ?>
    <ul class="nav nav-pills nav-stacked" style="background-color: #e7e7e7">
        <li role="presentation"><h3>Dash Board</h3></li>
        <li role="presentation"
            <?php if($tab == 1 or $tab == 11 or $tab == 12 or $tab == 13): ?>
            class="active"
                <?php endif; ?>><a href="/pm/sv">Sinh Viên</a></li>
        <li role="presentation"
            <?php if($tab == 2 or $tab == 21 or $tab == 22): ?>
            class="active"
                <?php endif; ?>><a href="/pm/nv">Nhân Viên</a></li>
        
        
        
        
        <li role="presentation"
            <?php if($tab == 3): ?>
            class="active"
                <?php endif; ?>><a href="/pm/phan-cong-leader">Phân công Leader</a>
        </li>
        <li role="presentation"
            <?php if($tab == 4): ?>
            class="active"
                <?php endif; ?>><a href="/pm/gui-thong-bao">Gửi Thông báo</a></li>


    </ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.company_site_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
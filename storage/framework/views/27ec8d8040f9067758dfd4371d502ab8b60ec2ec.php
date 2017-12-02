<!DOCTYPE html>
<html>
<head>	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
</head>
<body>
	<div class="container" style="margin-bottom: 100px;">		
            <div class="row" style="background:#00FFFF;margin-top: 5px;">
                <div class="col-sm-2">
                    <img src="<?php echo e(asset('image/background/soict.png')); ?>" style="height: 150px;"  >
                </div>
                <div class="col-sm-7 col-lg-offset-1" style="height:150px; ">
                    <h2 style="color: #0000FF" >Trường Đại Học Bách Khoa Hà Nội</h2>
                    <h3 style="color: #0000FF"> Viện Công Nghệ Thông Tin Và Truyền Thông</h3>
                </div>
                <div class="col-lg-offset-1 col-lg-1">
                    <img src="<?php echo e(asset('image/background/hust.jpg')); ?>" style="height: 150px;" />
                </div>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    &nbsp;
               </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('dang-nhap')); ?>"><b>Login</b></a></li>
                    <li style="margin-top: 16px;"><b data-toggle="modal" data-target="#register">Register</b></li>
                        <div class="modal fade col-lg-4 col-lg-offset-4" id="register" role="dialog" style="margin-top: 100px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title"><b>Đăng ký với vai trò</b></h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-lg-offset-2">
                                                <a href="<?php echo e(route('dang-ky-sv')); ?>">
                                                    <img src="<?php echo e(asset('/image/background/sv.png')); ?>" style="height: 80px;"></a>
                                                <p>Sinh viên</p>
                                            </div>
                                            <div class="col-lg-4 col-lg-offset-1">
                                                        <a href="<?php echo e(route('dang-ky-dn')); ?>">
                                                        <img src="<?php echo e(asset('/image/background/dn.jpeg')); ?>" style="height: 80px;"></a>
                                                        <p>Doanh nghiệp</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                         <button type="button" class="btn btn-default" data-dismiss="modal" style="left: 5%;">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(route('dang-xuat')); ?>"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                   <form id="logout-form" action="<?php echo e(route('dang-xuat')); ?>" method="GET" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                         <?php endif; ?>
                </ul>
            </div>
            <hr style="border-color: red;">
            <?php echo $__env->yieldContent('content'); ?>
            <div>
                <div class="row" style="background: #00FFFF;">
                    <hr style="border-color: red; ">
                    <div class="col-lg-6 col-lg-offset-3" style="text-align: center;">
                        <b>Bản quyền <span class="glyphicon glyphicon-copyright-mark"></span> thuộc về viện Công nghệ thông tin và truyền thông</b><br>
                        <b >Trường Đại Học Bách Khoa Hà Nội</b><br>
                        <p style="font-style: : oblique">Nhóm 17 - Xây Dựng Hệ Thống Thông Tin Quản Lí</p>
                    </div>
                </div>
            </div>
	</div>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
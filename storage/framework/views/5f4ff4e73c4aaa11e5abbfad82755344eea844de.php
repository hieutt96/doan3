<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Home')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Home')); ?>

                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('dang-nhap')); ?>">Login</a></li>
                            <li ><a href="<?php echo e(route('dang-ky-sv')); ?>">Register</a></li>
                            <!-- <div class="modal fade col-lg-4 col-lg-offset-4" id="register" style="margin-top: 100px;margin-left: 100px;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                         
                                            <h3 class="modal-title">
                                                Đăng ký với vai trò
                                            </h3>
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
                            </div> -->
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
                                       <form id="logout-form" action="<?php echo e(route('dang-xuat')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>

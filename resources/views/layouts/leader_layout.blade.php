<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-bottom: 100px">
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, Leaders's name <b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Thông báo</a></li>
                        <li><a href="#">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked" style="background-color: #e7e7e7">
                <li role="presentation"><h3>Dash Board</h3></li>
                <li role="presentation"
                    @if($tab == 1 or $tab == 11 or $tab == 12 or $tab == 13)
                    class="active"
                        @endif><a href="/leader/sv">Sinh Viên</a></li>
                <li role="presentation"
                    @if($tab == 2)
                    class="active"
                        @endif><a href="/leader/2">Thông báo</a></li>
                <li role="presentation"
                    @if($tab == 3)
                    class="active"
                        @endif><a href="/leader/tao-cong-viec">Tạo Công Việc</a></li>
                <li role="presentation"
                    @if($tab == 4)
                    class="active"
                        @endif><a href="/leader/danh-gia-sv">Đánh Giá Sinh Viên</a></li>

            </ul>
        </div>

        <div class="col-md-10">
            @yield('content')
        </div>
    </div>

</div>
</body>
</html>

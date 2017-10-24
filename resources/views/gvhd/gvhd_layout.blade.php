<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-bottom: 100px">
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="top-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, GVHD's name <b class="caret"></b></a>
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
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><h3>Dash Board</h3></li>
                <li role="presentation"
                    @if($tab == 1 or $tab == 11 or $tab == 12 or $tab == 13)
                    class="active"
                        @endif><a href="/gvhd/1">Sinh Viên</a></li>
                <li role="presentation"
                    @if($tab == 2)
                    class="active"
                        @endif><a href="/gvhd/2">Doanh Nghiệp</a></li>
                <li data-toggle="collapse" role="presentation" href="#danhGia">
                    <a class="nav-sub-container">
                        Đánh giá thực tập
                        <span class="caret arrow"></span>
                        <div class="caret-container"></div>
                    </a>
                </li>
                <ul class="nav nav-pills nav-stacked collapse
                    @if($tab == 31 or $tab == 32)
                        in
                    @endif
                    " id="danhGia">
                    <li role="presentation"
                        @if($tab == 31)
                        class="active"
                            @endif><a href="/gvhd/31">Đã đánh giá</a></li>
                    <li role="presentation"
                        @if($tab == 32)
                        class="active"
                            @endif><a href="/gvhd/32">Chưa đánh giá</a></li>
                </ul>
                <li role="presentation"
                    @if($tab == 4)
                    class="active"
                        @endif><a href="/gvhd/4">Thông báo</a></li>
                <li role="presentation"
                    @if($tab == 5)
                    class="active"
                        @endif><a href="/gvhd/5">Gửi thông báo</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>

</div>
</body>
</html>

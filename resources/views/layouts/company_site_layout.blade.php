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
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,‌​100italic,300,300ita‌​lic,400italic,500,50‌​0italic,700,700itali‌​c,900italic,900'
          rel='stylesheet' type='text/css'>
    <style>
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .container {
            border: solid 1px #555;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            font-family: 'Roboto', sans-serif;
        }

        .name-school {
            height: 150px;
            text-align: center;
            padding-top: 15px;
        }

        .dropdown-menu:hover > li {

        }

        .position-ref {
            position: relative;
        }

        .anh-hust {
            height: 140px;
            margin: 10px 0 0 77px;
        }

        .anh-soict {
            height: 150px;
            margin: 5px 0 5px 0;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .title {
            font-size: 84px;
        }

        .links > a, b {
            color: black;
            padding: 0 25px;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
        }

        b:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container" style="margin-bottom: 100px">
    <div class="row" style="background:#263C65;margin-top: 5px;">
        <div class="col-sm-2">
            <img src="{{asset('image/background/soict.png')}}" style="height: 150px;">
        </div>
        <div class="col-sm-8 name-school">
            <h3 style="color: white">Trường Đại Học Bách Khoa Hà Nội</h3>
            <h2 style="color: white"> Viện Công Nghệ Thông Tin Và Truyền Thông</h2>
        </div>
        <div class=" col-sm-2 ">
            <img class="anh-hust" src="{{asset('image/background/hust.jpg')}}"/>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <nav class="navbar navbar-default" role="navigation">
            <div class="collapse navbar-collapse" id="top-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Chào, {{Auth::user()->name}}
                            <div class="glyphicon glyphicon-triangle-bottom"></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a
                                @if(Auth::user()->level == 2)
                                href="/pm/thay-mat-khau"
                                @else
                                href="/leader/thay-mat-khau"
                                @endif
                                >Đổi mật khẩu</a>
                            <li><a href="/dang-xuat">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-2">
            @yield('left-nav')
        </div>
        <div class="col-lg-10" style="padding-bottom: 20px">
            @yield('content')
        </div>
    </div>
    <footer>
        <div>
            <div class="row" style="background: #263c65; color:white;">
                <div class="col-lg-6 col-lg-offset-3" style="text-align: center;">
                    <b>Bản quyền <span class="glyphicon glyphicon-copyright-mark"></span> thuộc về viện Công nghệ thông
                        tin
                        và truyền thông</b><br>
                    <b>Trường Đại Học Bách Khoa Hà Nội</b><br>
                    <p style="font-style: : oblique">Nhóm 17 - Xây Dựng Hệ Thống Thông Tin Quản Lý</p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

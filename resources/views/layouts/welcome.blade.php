<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Custom Fonts -->
       <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <style>
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .container {
                border: solid 1px #555;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0,0,0,0.6);
                -moz-box-shadow: 0 0 10px rgba(0,0,0,0.6);
                -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.6);
                -o-box-shadow: 0 0 10px rgba(0,0,0,0.6);
            }
            .name-school{
                height:150px;
                text-align: center;
                padding-top:15px;
            }
            .position-ref {
                position: relative;
            }
            .anh-hust{
                height: 140px;
                margin:10px 0 0 77px;
            }
            .anh-soict{
                height: 150px;
                margin:5px 0 5px 0;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .title {
                font-size: 84px;
            }
            .links > a,b {
                color: black;
                padding: 0 25px;
                font-size: 12px;
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
        <div class="container">
            <div class="row" style="background:#263c65;">
                <div class="col-sm-2" style="height: 160px;">
                    <img class="anh-soict" src="{{asset('image/background/soict.png')}}"   >
                </div>
                <div class="col-sm-8 name-school">
                    <h3 style="color: white" >Trường Đại Học Bách Khoa Hà Nội</h2>
                    <h2 style="color: white"> Viện Công Nghệ Thông Tin Và Truyền Thông</h2>
                </div>
                <div class=" col-sm-2 ">
                    <img class="anh-hust" src="{{asset('image/background/hust.jpg')}}"  />
                </div>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    &nbsp;
               </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guest())
                    <li><a href="{{ route('dang-nhap') }}"><b>Đăng nhập</b></a></li>
                    <li style="margin-top: 16px;"><b data-toggle="modal" data-target="#register">Đăng ký</b></li>
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
                                                <a href="{{route('dang-ky-sv')}}">
                                                    <img src="{{asset('/image/background/sv.png')}}" style="height: 80px;"></a>
                                                <p>Sinh viên</p>
                                            </div>
                                            <div class="col-lg-4 col-lg-offset-1">
                                                        <a href="{{route('dang-ky-dn')}}">
                                                        <img src="{{asset('/image/background/dn.jpeg')}}" style="height: 80px;"></a>
                                                        <p>Doanh nghiệp</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                         <button type="button" class="btn btn-default" data-dismiss="modal" style="left: 5%;">Close</button>
                                    
                                </div>
                            </div>
                        </div>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="">MyProfile</a>
                                    <a href="{{ route('dang-xuat') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Đăng xuất
                                    </a>
                                   <form id="logout-form" action="{{ route('dang-xuat') }}" method="GET" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                         @endif
                </ul>
            </div>
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Trang Chủ </a></li>
                        <li><a href="#">Hợp tác doanh nghiệp</a></li>
                        <li><a href="#">Sinh viên </a></li>
                        <li><a href="#">Thông báo</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                    </ul>
                    </div>
                </nav>
            </div>
        @yield('welcome')
    </body>
</html>

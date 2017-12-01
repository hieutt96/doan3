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
            .links > a,b {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            b:hover {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container" style="margin-bottom: 100px;">
            <div class="row" style="background:#263C65;margin-top: 5px;">
                <div class="col-sm-2">
                    <img src="{{asset('image/background/soict.png')}}" style="height: 150px;"  >
                </div>
                <div class="col-sm-7 col-lg-offset-1" style="height:150px; ">
                    <h2 style="color: #0000FF" >Trường Đại Học Bách Khoa Hà Nội</h2>
                    <h3 style="color: #0000FF"> Viện Công Nghệ Thông Tin Và Truyền Thông</h3>
                </div>
                <div class="col-lg-offset-1 col-lg-1">
                    <img src="{{asset('image/background/hust.jpg')}}" style="height: 150px;" />
                </div>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    &nbsp;
               </ul>
                <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Home') }}
                </a>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guest())
                    <li><a href="{{ route('dang-nhap') }}"><b>Login</b></a></li>
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
                                            <div class="col-lg-4 col-lg-offset-1">
                                                <a href="{{route('dang-ky-sv')}}">
                                                    <img src="{{asset('/image/background/sv.png')}}" style="height: 80px;"></a>
                                                <p>Sinh viên</p>
                                            </div>
                                            <div class="col-lg-5 col-lg-offset-1">
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
                                    @if(Auth::user()->level == 2)
                                        <a href="">Truy Cập Trang Quản Lí</a>
                                    
                                    @ifelse(Auth::user()->level == 3)
                                        <a href="">Truy Cập Trang Quản Lí</a>

                                    @ifelse(Auth::user()->level == 4)
                                        <a href="/admin-dashboard">Truy hi Cập Trang Quản Lí</a>

                                    @else(Auth::user()->level == 5)
                                        <a href="/">Truy Cập Trang Quản Lí</a>
                                    @endif
                                    <a href="{{ route('dang-xuat') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                   <form id="logout-form" action="{{ route('dang-xuat') }}" method="GET" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                         @endif
                </ul>
            </div><br><br><br>  
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                             <a class="navbar-brand" href="#">WebSiteHome</a>
                        </div>
                    <ul class="nav navbar-nav">
                        <li><a href="#">Trang Chủ </a></li>
                        <li><a href="{{route('hop-tac-doanh-nghiep')}}">Hợp tác doanh nghiệp</a></li>
                        <li><a href="#">Sinh viên </a></li>
                        <li><a href="#">Thông báo</a></li>
                        <li><a href="#">Giới thiệu</a></li>
                    </ul>
                    </div>
                </nav>
            </div>
        @yield('welcome')
    @yield('script')
    </body>

</html>

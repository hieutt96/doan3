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

        <base href="{!!asset('')!!}">
        <style>
           .container-panel {
                border: solid 1px #555;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0,0,0,0.6);
                -moz-box-shadow: 0 0 10px rgba(0,0,0,0.6);
                -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.6);
                -o-box-shadow: 0 0 10px rgba(0,0,0,0.6);
                font-family: 'Roboto',sans-serif;
            }
            .row-heading{
                background-color:#263c65;
                color:#ffffff;
            }
             .anh-hust{
                height: 140px;
                margin:10px 0 0 77px;
            }
            .anh-soict{
                height: 150px;
                margin:5px 0 5px 0;
            }
             .name-school{
                height:150px;
                text-align: center;
                padding-top:15px;
            }
            .form-info{
                 padding-top:10px;
                border: 1px solid #dddddd;
                border-radius: 3px;
                margin-bottom:20px;
                width:1040px;
                margin-left:85px;
            }
            .heading{
                color:green;
            }
            .col-right{
                margin-bottom: 20px;
            }
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
	<div class="container container-panel" style="margin-bottom: 100px;">		
            <div class="row row-heading" >
                <div class="col-sm-2" style="height: 160px;">
                    <img class="anh-soict" src="{{asset('image/background/soict.png')}}" />
                </div>
                <div class="col-sm-8 name-school">
                    <h2 style="color: white" >Trường Đại Học Bách Khoa Hà Nội</h2>
                    <h3 style="color: white"> Viện Công Nghệ Thông Tin Và Truyền Thông</h3>
                </div>
                <div class="col-sm-2">
                    <img class="anh-hust" src="{{asset('image/background/hust.jpg')}}" />
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
                                                <p>Công viện thực tập</p>
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
                                <span style="margin-right:5px;" class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a tabindex="-1" href="{{ url('student/change-password') }}">Đổi mật khẩu</a><li/>
                                <li><a href="{{ url('student/student-info') }}">Thông tin cá nhân</a><li/>
                                <li><a href="{{ url('student/update-student-info') }}">Cập nhật thông tin cá nhân</a><li/>
                                <li class="divider"></li>
                                <li>
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
                        <li class="active"><a href="{{url('home')}}">Trang Chủ </a></li>
                        <li><a href="{{ url('hop-tac-doanh-nghiep') }}">Hợp tác doanh nghiệp</a></li>
                        @if(Auth::guest())
                        <li><a href="{{ url('thong-bao') }}">Thông báo</a></li>
                        @elseif(Auth::user())
                        <li><a href="{{ url('student/cong-viec-thuc-tap') }}">Công việc thực tập </a></li>
                        <li><a href="{{ url('student/thong-bao-phia-nha-truong') }}">Thông báo</a></li>
                        @endif
                        <li><a href="{{ url('lien-he')}}">Liên hệ</a></li>
                    </ul>
                    </div>
                </nav>
            </div>
            <div class="content">
            @yield('content')
            </div>
            <div>
                <div class="row" style="background: #263c65; color:white;">
                    <div class="col-lg-6 col-lg-offset-3" style="text-align: center;">
                        <b>Bản quyền <span class="glyphicon glyphicon-copyright-mark"></span> thuộc về viện Công nghệ thông tin và truyền thông</b><br>
                        <b >Trường Đại Học Bách Khoa Hà Nội</b><br>
                        <p style="font-style: : oblique">Nhóm 17 - Xây Dựng Hệ Thống Thông Tin Quản Lý</p>
                    </div>
                </div>
            </div>
	</div>
    @yield('script')
</body>
</html>
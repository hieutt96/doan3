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
            <hr>
            @yield('content')
	</div>
</body>
</html>
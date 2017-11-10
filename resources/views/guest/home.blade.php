@extends('layouts.welcome')
@section('welcome')
    @if($doanhnghiep = Session::get('doanhnghiep'))
        <p class="alert alert-info">{{$doanhnghiep}}</p>
    @endif
    <div class=" row">
        <div class="col-lg-5">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    <img src="https://soict.hust.edu.vn/wp-content/uploads/IMGP6200-450x267.jpg" alt="Chania">
                    <div class="carousel-caption">
                        <h3>Los Angeles</h3>
                        <p>LA is always so much fun!</p>
                    </div>
                    </div>

                    <div class="item">
                    <img src="https://soict.hust.edu.vn/wp-content/uploads/NTU3-450x267.jpg" alt="Chicago">
                    <div class="carousel-caption">
                        <h3>Chicago</h3>
                        <p>Thank you, Chicago!</p>
                    </div>
                    </div>

                    <div class="item">
                    <img src="https://soict.hust.edu.vn/wp-content/uploads/anh-450x267.jpg" alt="New York">
                    <div class="carousel-caption">
                        <h3>New York</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
            <div class="col-lg-7">
            <div class="row">
                <b style="font-size: 22px;"><span class="glyphicon glyphicon-globe"></span> Thông báo mới</b>
                <hr>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
    <br><br>
    <hr style="border-color: red; ">
    <div class="row" style="height: 300px;">
        <div class="col-lg-6">
            <div class="row">
                <b style="font-size: 15px; "><span class="glyphicon glyphicon-tag"></span> Tin tức - Sự kiện</b>
            </div>
            <hr>
            <div class="">

            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <b style="font-size: 16px;"><span class="glyphicon glyphicon-refresh"> Liên kết doanh nghiệp</span></b>
            </div>
        </div>
    </div>
    <div class="row" style="background: #00FFFF;">
        <hr style="border-color: red; ">
        <div class="col-lg-6 col-lg-offset-3" style="text-align: center;">
            <b>Bản quyền <span class="glyphicon glyphicon-copyright-mark"></span> thuộc về viện Công nghệ thông tin và
                truyền thông</b><br>
            <b>Trường Đại Học Bách Khoa Hà Nội</b><br>
            <p style="font-style: : oblique">Nhóm 17 - Xây Dựng Hệ Thống Thông Tin Quản Lí</p>
        </div>
    </div>
    </div>
@endsection
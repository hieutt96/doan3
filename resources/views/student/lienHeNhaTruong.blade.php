<style>
      #map {
        height: 400px;
        width: 60%;
       }
    </style>
@extends('layouts.welcome') 
@section('welcome')
    <div class="container">
            <div class="col-md-12">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px; text-align:center;">Liên hệ với chúng tôi</h2>
	            	</div>
                <div class="row">
                <div class="col-sm-4">
	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    <br>
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Phòng 504 - Nhà B1 - Đại học Bách khoa Hà Nội </p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>vp@soict.hust.edu.vn</p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>(84-4) 3 8692463 </p>

                        <br>
                    </div>
                </div><br>
                <div "col-sm-8">
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3><br>
                        <div class="break"></div><br>
                        <div id="map"></div>
                            <script>
                            function initMap() {
                                var uluru = {lat: 21.004432, lng: 105.846598};
                                var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 18,
                                center: uluru
                                });
                                var marker = new google.maps.Marker({
                                position: uluru,
                                map: map
                                });
                            }
                            </script>
                            <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg7xcho9RUudb4NMLxgFr1oG73zgsoAJA&callback=initMap">
                            </script>

					</div>
	            </div>
                <div class="row">
                    <div class="col-sm-12">
                    <div class="panel-body">
                         <h3><span class="glyphicon glyphicon-align-left"></span>Bộ môn - Trung Tâm</h3>
					</div>
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="panel-body">
                         <h4>Bộ Môn Công Nghệ Phần Mềm</h4>
                         <p>Điện thoại: (+84) 4 3868 2595</p>
                         <p>Địa chỉ: Phòng 601 - Nhà B1 - Đại học Bách khoa Hà Nội</p>
					</div><hr>
                    
                    </div>
                    <div class="col-sm-6">
                    <div class="panel-body">
                         <h4>Bộ Môn Hệ Thống Thông Tin</h4>
                         <p>Điện thoại: (+84) 4 3869 6124</p>
                         <p>Địa chỉ: Phòng 603 - Nhà B1 - Đại học Bách khoa Hà Nội</p>
					</div><hr>
                    
                    </div>
                </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="panel-body">
                         <h4>Bộ Môn Khoa Học Máy Tính</h4>
                         <p>Điện thoại: (+84) 4 3869 6121</p>
                         <p>Địa chỉ: Phòng 602 - Nhà B1 - Đại học Bách khoa Hà Nội</p>
					</div><hr>
                    
                    </div>
                    <div class="col-sm-6">
                    <div class="panel-body">
                         <h4>Bộ Môn Kỹ Thuật Máy Tính</h4>
                         <p>Điện thoại: (+84) 4 3869 6125</p>
                         <p>Địa chỉ: Phòng 502 - Nhà B1 - Đại học Bách khoa Hà Nội</p>
					</div><hr>
                    
                    </div>
                </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="panel-body">
                         <h4>Bộ Môn Truyền Thông Và Mạng Máy Tính</h4>
                         <p>Điện thoại: (+84) 4 3868 2596</p>
                         <p>Địa chỉ: Phòng 501 - Nhà B1 - Đại học Bách khoa Hà Nội</p>
					</div>
                    
                    </div>
                    <div class="col-sm-6">
                    <div class="panel-body">
                         <h4>Trung Tâm Máy Tính</h4>
                         <p>Điện thoại: (+84) 4 3869 2205</p>
                         <p>Địa chỉ: Phòng 301 - Nhà D5 - Đại học Bách khoa Hà Nội</p>
					</div>
                    
                    </div>
                </div>
                    </div>
                </div>

            </div>
            </div>
        </div>
@endsection
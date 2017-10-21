@extends('layouts.welcome')
@section('welcome')
            @if($doanhnghiep = Session::get('doanhnghiep'))
                <p class="alert alert-info">{{$doanhnghiep}}</p>
            @endif
            <div class=" row">
                <div class="col-lg-6">
                    <img src="sadsa" style="height: 300px; width: 550px;">
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <b style="font-size: 22px;"><span class="glyphicon glyphicon-globe"></span> Thông báo</b>
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
	                <hr >
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
					<b>Bản quyền <span class="glyphicon glyphicon-copyright-mark"></span> thuộc về viện Công nghệ thông tin và truyền thông</b><br>
					<b >Trường Đại Học Bách Khoa Hà Nội</b><br>
					<p style="font-style: : oblique">Nhóm 17 - Xây Dựng Hệ Thống Thông Tin Quản Lí</p>
				</div>
			</div>
        </div>  
@endsection
@extends('layouts.welcome')
@section('welcome')
    @if($doanhnghiep = Session::get('doanhnghiep'))
      <div class="alert alert-success alert-dismissable">
        <a  class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Success!</strong> {{$doanhnghiep}}
      </div>
    @endif
    @if($hanche = Session::get('hanche'))
      <div class="alert alert-danger alert-dismissable">
        <a  class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Error!</strong> {{$hanche}}
      </div>
    @endif
    @if($han_che_quyen = Session::get('han_che_quyen'))
      <div class="alert alert-danger alert-dismissable">
        <a  class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Error!</strong> {{$han_che_quyen}}
      </div>
    @endif
    @if($hanchedangkysv = Session::get('hanchedangkysv'))
      <div class="alert alert-danger alert-dismissable">
        <a  class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Error!</strong> {{$hanchedangkysv}}
      </div>
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
                   <div class="sow-image-grid-image">
					    <img width="470" height="280" src="upload/anhsinhvien/slide1.jpg" class="attachment-thumbnail size-thumbnail"
						 srcset="upload/anhsinhvien/slide1.jpg 280w, upload/anhsinhvien/slide1.jpg 350w"
						sizes="(max-width: 470px) 280vw, 280px" style="display: block;"></a> </div>
                    </div>

                    <div class="item">
                    <div class="sow-image-grid-image">
					    <img width="470" height="280" src="upload/anhsinhvien/slide2.jpg" class="attachment-thumbnail size-thumbnail"
						 srcset="upload/anhsinhvien/slide2.jpg 280w, upload/anhsinhvien/slide2.jpg 350w"
						sizes="(max-width: 470px) 280vw, 280px" style="display: block;"></a> </div>
                    </div>
                    <div class="item">
                    <div class="sow-image-grid-image">
					    <img width="470" height="280" src="upload/anhsinhvien/slide3.jpg" class="attachment-thumbnail size-thumbnail"
						 srcset="upload/anhsinhvien/slide3.jpg 280w, upload/anhsinhvien/slide3.jpg 350w"
						sizes="(max-width: 470px) 280vw, 280px" style="display: block;"></a> </div>
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
            </div>
            <!-- item -->
						@foreach($notice_home as $noti)
							@if($noti->user->level==4 && $noti->ma_nguoi_nhan==0)
					    <div style="border-bottom:1px solid #cccccc; padding-bottom:5px;" class="row-item row">
		    
		                	<div class="border-right">
		                		
			                    <div class="col-md-12">
			                        <h3>{{$noti->tieu_de}}</h3>
                                    <p><i style="color:#aaaaaa">Đăng bởi:{{$noti->user->name}} | Ngày đăng: {{$noti->created_at->format('d/m/Y')}} </i></p>
			                        <a class="btn btn-primary" href="thong-bao/{{$noti->id}}">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
		                	</div>
							
		                </div>
							@endif
						@endforeach
		                <!-- end item -->
        </div>
    </div>
    <br><br>
    <hr style="border-color: red; ">
    <div class="row" style="height: 400px;">
        <div class="col-lg-5">
            <div class="row">
                <b style="font-size: 22px; "><span class="glyphicon glyphicon-tag"></span> Thông tin liên hệ</b>
            </div>
            <div class="panel-body">
	            		<!-- item -->
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Phòng 504 - Nhà B1 - Đại học Bách khoa Hà Nội </p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>vp@soict.hust.edu.vn</p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>(84-4) 3 8692463 </p>

                        <h4><span><i class="fa fa-facebook"> </i></span> Facebook: </h4>
                        <p>https://www.facebook.com/groups/info.soict/?fref=nf</p>

                        <br>
                    </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <b style="font-size: 22px;"><span class="glyphicon glyphicon-refresh"></span> Liên kết doanh nghiệp</b>
            </div>
            <!-- item -->
						@foreach($dn_khac as $dnkhac)
                        <div style="border-bottom:1px solid #cccccc;padding: 10px;"class="row">
                            <div style="padding-top: 10px;"class="col-sm-2" >
								<a href= "hop-tac-doanh-nghiep/{!!$dnkhac->id!!}/{!!$dnkhac->name!!}" ><img width="64" height="64" src="upload/imgCompany/{!!$dnkhac->picture!!}" class="attachment-thumbnail size-thumbnail"
								 alt=""  srcset="upload/imgCompany/{!!$dnkhac->picture!!} 64w, upload/imgCompany/{!!$dnkhac->picture!!} 124w"
								 sizes="(max-width: 64px) 64vw, 64px" style="display: block;"></a> </div>
                            <div class="col-sm-10">
                                 <a href="hop-tac-doanh-nghiep/{!!$dnkhac->id!!}/{!!$dnkhac->name!!}"><b>{!!$dnkhac->name!!}</b></a>
                                 <p>Công ty đang cần tuyển <span style="color:red;">{!!$dnkhac->soLuongSinhVienTT!!}</span> bạn thực tập sinh Part-time/Full-time trong học kỳ {!!$dnkhac->hocky!!}</p>
                                 <a class="btn btn-primary" href="hop-tac-doanh-nghiep/{!!$dnkhac->id!!}/{!!$dnkhac->name!!}">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div> 
                        </div></hr>
                        @endforeach
		                <!-- end item -->
        </div>
    </div>
@endsection
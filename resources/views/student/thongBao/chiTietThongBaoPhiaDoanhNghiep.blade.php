@extends('student.thongBao.thongBaoSinhVien') 
@section('thongbao')
<div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#263c65; color:white;" >
	            		<h3 style="margin-top:0px; margin-bottom:0px;">Thông Báo Phía Doanh Nghiệp</h3>
	            	</div>

	            	<div class="panel-body">
	            		
		                <!-- item -->
						<h2>{{$notice->tieu_de}}</h2>
                        <p><i style="color:#aaaaaa">Đăng bởi:{{$notice->user->name}} | Ngày đăng: {{$notice->created_at->format('d/m/Y')}}</i></p>
                        <div class="content-notice">{{$notice->noi_dung}}</div>
		                <!-- end item -->
		                
						
					</div>

	            </div>
				
        	</div>
@endsection
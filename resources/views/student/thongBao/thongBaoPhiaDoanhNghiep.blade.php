@extends('student.thongBao.thongBaoSinhVien') 
@section('thongbao')
<div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#263c65; color:white;" >
	            		<h3 style="margin-top:0px; margin-bottom:0px;">Thông Báo Phía Doanh Nghiệp</h3>
	            	</div>

	            	<div class="panel-body">
	            		
		                <!-- item -->
						@foreach($notice as $noti)
							@if($noti->user->level==2)
					    <div class="row-item row">
		        
		                	<div class="border-right">
		                		<div class="col-md-2">
			                        <p>
			                            <p><h1 class="time-notice">{{$noti->created_at->format('d')}}</h1><p>
                                        <h4 style="margin-left:10px;">{{$noti->created_at->format('F')}}</h4>
			                        </p>
			                    </div>
			                    <div class="col-md-10">
			                        <h3>{{$noti->tieu_de}}</h3>
                                    <p><i style="color:#aaaaaa">Đăng bởi:{{$noti->user->name}} </i></p>
			                        <a class="btn btn-primary" href="student/thong-bao-phia-doanh-nghiep/{{$noti->id}}">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>
		                	</div>
		                    
							<div class="break"></div>
		                </div><hr>
							@endif
						@endforeach
		                <!-- end item -->
		                
						
					</div>

	            </div>
				@section('pagination')
				{{ $notice->links() }}
				@endsection
        	</div>
@endsection
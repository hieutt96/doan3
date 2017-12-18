
<style>
.col-sm-4{
    height:130px;
}
</style>
@extends('layouts.welcome') 
@section('welcome')
    <!-- Page Content -->
    <div class="panel-layout">
        <div class="row">
            <div class="col-lg-9">
               {!!$doanhnghiep->moTa!!}
                <hr>
                @if(Auth::user())
                <div class="well">
                     @if(session('thongbao'))
            			<div class="alert alert-success">
               			 {{session('thongbao')}}
          				</div>
        			 @endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="hop-tac-doanh-nghiep/{!!$doanhnghiep->id!!}/{!!$doanhnghiep->name!!}" role="form" method="post">
                    <input type="hidden" name="_token" value={!!csrf_token()!!}>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                @endif

                <hr>
                @foreach($comment->sortByDesc('created_at') as $cm)
                <div class="media">
                    <a class="pull-left" style="margin-right:10px;"href="#">
                       <img style="border-radius:50%;" width="64" height="64" src="upload/anhsinhvien/{!!$cm->user->picture!!}" class="attachment-thumbnail size-thumbnail"
							srcset="upload/anhsinhvien/{!!$cm->user->picture!!} 64w, upload/anhsinhvien/{!!$cm->user->picture!!} 64w"
							sizes="(max-width: 64px) 64vw, 64px" style="display: block;">
                        </p>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{!!$cm->user->name!!}
                            <small>{!!$cm->created_at->format('d/m/Y')!!}</small>
                        </h4>
                        {!!$cm->noi_dung!!}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-lg-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Công ty khác</b></div>
                    <div class="panel-body">

                       @foreach($dn_khac as $dnkhac)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-sm-4" >
                               <div class="sow-image-grid-image">
								<a href= "hop-tac-doanh-nghiep/{!!$dnkhac->id!!}/{!!$dnkhac->name!!}" ><img width="64" height="64" src="upload/imgCompany/{!!$dnkhac->picture!!}" class="attachment-thumbnail size-thumbnail"
								 alt=""  srcset="upload/imgCompany/{!!$dnkhac->picture!!} 64w, upload/imgCompany/{!!$dnkhac->picture!!} 124w"
								 sizes="(max-width: 64px) 64vw, 64px" style="display: block;"></a> </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="hop-tac-doanh-nghiep/{!!$dnkhac->id!!}/{!!$dnkhac->name!!}"><b>{!!$dnkhac->name!!}</b></a>
                                 <p>Công ty đang cần tuyển <span style="color:red;">{!!$dnkhac->soLuongSinhVienTT!!}</span> bạn thực tập sinh {!!$dnkhac->thoiGianMongMuon!!} trong học kỳ {!!$dnkhac->hocky!!}</p>
                            </div>
                            
                           
                        </div>
                        @endforeach
                    </div>
                </div>  
                                 
            </div>

        </div>
    </div>
    <!-- end Page Content -->
@endsection



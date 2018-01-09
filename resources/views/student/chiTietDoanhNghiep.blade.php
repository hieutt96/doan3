<style>
.col-sm-4{
    height:130px;
}
.edit{
    cursor: pointer;
}
</style>
@extends('layouts.welcome') 
@section('welcome')
    <div class="panel-layout">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{asset($company->picture)}}" style="height: 200px;width: 200px;">
                    </div>
                    <div class=" col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Tên Công Ty:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->name}}</p>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Địa Chỉ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->diaChi}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Số Lượng Nhân Viên:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->soLuongNV}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Năm Thành Lập :</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->namthanhlap}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Điện Thoại Liên Hệ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Địa Chỉ Thực Tập</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->diaChiTT}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Thời Giang Mong Muốn:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->thoiGianMongMuon}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Công Nghệ Đào Tạo:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->congNgheDaoTao}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>Số Lượng Sinh Viên Có Thể Nhận :</b>
                            </div>
                            <div class="col-lg-4">
                                <p>{{ $company->soLuongSinhVienTT}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Yêu Cầu Ngoại Ngữ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->yeuCauNNSV}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Học Kỳ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $company->hocky}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Mô Tả Công Ty:</b>
                            </div>
                            <div class="col-lg-6">
                                <p><?php echo strip_tags($company->moTa); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Công ty khác</b></div>
                    <div class="panel-body">

                       @foreach($dn_khac as $dnkhac)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-sm-4" >
                               <div class="sow-image-grid-image">
								<a href= "hop-tac-doanh-nghiep/{{$dnkhac->id}}" ><img width="64" height="64" src="{{asset($dnkhac->picture)}}" class="attachment-thumbnail size-thumbnail"></a> </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="hop-tac-doanh-nghiep/{!!$dnkhac->id!!}/{!!$dnkhac->name!!}"><b>{{$dnkhac->name}}</b></a>
                                 <p>Công ty đang cần tuyển <span style="color:red;">{!!$dnkhac->soLuongSinhVienTT!!}</span> bạn thực tập sinh Part-time/Full-time trong học kỳ {!!$dnkhac->hocky!!}</p>
                            </div>
                            
                           
                        </div>
                        @endforeach
                    </div>
                </div>  
                                 
            </div>
        </div>
            <div class="row" >
                <div class="row">
                   <h4 ><span class="glyphicon glyphicon-comment" style="margin-top: 10px;"></span>Bình Luận Về Công Ty:</h4>
                </div>
                <div class="row comments">
                    @foreach($comments as $comment)
                        <div class="row">
                            <div class="col-lg-1 col-lg-offset-1">
                                <img src="{{asset($comment->user->picture)}}" style="height: 70px;width: 70px;">
                            </div>
                            <div class="col-lg-2">
                                <h4>{{$comment->user->name}}</h4>
                            </div>
                            <div class="col-lg-6 noi_dung">
                               {{$comment->noi_dung}}
                            </div>
                            @if(Auth::check() && Auth::user()->id == $comment->user_id)
                                <div class="col-lg-offset-11 col-lg-1 edit" >...</div>
                                <input type="hidden" class="comment_id" value="{{$comment->id}}">
                            @endif
                        </div><hr style="border-width:0px;">
                    @endforeach
                </div>
            </div>
            @if(Auth::check())
                <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
            @endif
                <input type="hidden" id="company_id" value="{{$company->id}}">
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="gui">Gửi</button>
            </div>
            <hr>

        </div>
    </div>
    <div class="modal fade" id="mymodal" role="dialog">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button class="close" data-dismiss="modal">&times;</button>
                 </div>
                 <div class="modal-body">
                     <div class="">
                         <input type="" name="" ="" class="form-control modal_edit">
                         
                     </div>
                 </div>
                 <div class="modal-footer">
                     <div class="col-lg-offset-2 col-lg-6">
                         <button id="save" class="close" data-dismiss="modal">Submit And Close</button>
                         <input type="hidden" class="modal_id">
                     </div>
                 </div>
             </div>
         </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/js/guest/comment.js')}}"></script>
@endsection

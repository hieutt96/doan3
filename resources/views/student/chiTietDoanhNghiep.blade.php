
<style>
.col-sm-4{
    height:130px;
}
</style>
@extends('layouts.welcome') 
@section('welcome')

    <div class="panel-layout">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{asset($doanhnghiep->picture)}}" style="height: 200px;width: 200px;">
                    </div>
                    <div class=" col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Tên Công Ty:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->name}}</p>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Địa Chỉ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->diaChi}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Số Lượng Nhân Viên:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->soLuongNV}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Năm Thành Lập :</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->namthanhlap}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Điện Thoại Liên Hệ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Địa Chỉ Thực Tập</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->diaChiTT}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Thời Giang Mong Muốn:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->thoiGianMongMuon}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Công Nghệ Đào Tạo:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->congNgheDaoTao}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>Số Lượng Sinh Viên Có Thể Nhận :</b>
                            </div>
                            <div class="col-lg-4">
                                <p>{{ $doanhnghiep->soLuongSinhVienTT}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Yêu Cầu Ngoại Ngữ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->yeuCauNNSV}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Học Kỳ:</b>
                            </div>
                            <div class="col-lg-6">
                                <p>{{ $doanhnghiep->hocky}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Mô Tả Công Ty:</b>
                            </div>
                            <div class="col-lg-6">
                                <p><?php echo strip_tags($doanhnghiep->moTa); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                   
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                </div>
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
                                <a href="hop-tac-doanh-nghiep/{!!$dnkhac->id!!}/{!!$dnkhac->name!!}"><b>{!!$dnkhac->name!!}</b></a>
                                 <p>Công ty đang cần tuyển <span style="color:red;">{!!$dnkhac->soLuongSinhVienTT!!}</span> bạn thực tập sinh Part-time/Full-time trong học kỳ {!!$dnkhac->hocky!!}</p>
                            </div>
                            
                           
                        </div>
                        @endforeach
                    </div>
                </div>  
                                 
            </div>

        </div>
    </div>
@endsection



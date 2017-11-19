
<style>
</style>
@extends('layouts.welcome') 
@section('welcome')
    <!-- Page Content -->
    <div class="panel-layout">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

               <p>{!!$doanhnghiep->moTa!!}</p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                {{--@if(isset($nguoidung))--}}
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                {{--@endif--}}

                <hr>

                <!-- Posted Comments -->
                @foreach($doanhnghiep->comment as $cm)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
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

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-sm-4">
                                <a href="detail.html">
                                    <img class="img-responsive" src="http://placehold.it/64x64" alt="">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <a href="#"><b>Project Five</b></a>
                            </div>
                            <p>This example will open the linked document in a new browser window/tab new browser window/tab:p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-sm-4">
                                <a href="detail.html">
                                    <img class="img-responsive" src="http://placehold.it/64x64" alt="">
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <a href="#"><b>Project Five</b></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                    </div>
                </div>  
                                 
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection



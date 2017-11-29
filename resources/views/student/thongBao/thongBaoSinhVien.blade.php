<style>
.col-md-2 {
    text-align:center;
    padding-top:10px;
}
.col-md-10 {
    border-left:1px solid #dddddd;
}
h3{
    padding-top:0px;
}
.time-notice {
    font-size:65px;
}
</style>
@extends('student.index_student') 
@section('content')
<div class="panel-layout">
<div class="row">
           <div class="row main-left">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active" style="background-color:#263c65; color:white;">
                    	Menu
                    </li>
                    <li class="list-group-item menu1">
                        <input style="border: 1px solid black;" name="search"  id="search" type="text" class="form-control" placeholder="Search...">
                    </li>
                    @if(Auth::user())
                    <li class="list-group-item menu1">
                    	<a href="{{url('student/thong-bao-phia-nha-truong')}}">Thông báo phía nhà trường</a>
                    </li>
                    <li class="list-group-item menu1">
                    	<a href="{{url('student/thong-bao-phia-doanh-nghiep')}}">Thông báo phía doanh nghiệp</a>
                    </li>
                    @endif

                </ul>
            </div>
			@yield('thongbao')
            
        </div>
        <!-- /.row -->
    </div>
    
<!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
            @yield('pagination')
            </div>
        </div>
    </div>   
	</div>
@endsection
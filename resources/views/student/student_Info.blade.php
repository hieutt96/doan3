<style>
.profile-image {
 padding-left:70px;
}
.profile-name {
 padding-left:100px;
 font-size:17px;
}
hr {
	margin-top:10px;
}
.heading{
	margin-left:360px;
}
</style>
@extends('student.index_student')
@section('content')
	<div class="row col-lg-offset-1 "> 
		<b><h2 class="heading">Thông tin tài khoản</h2></b>
	</div>
	<hr style="border-width: 2px;" class="col-lg-offset-1 ">
	<div class="container">
		<form class="form-info" method="POST" action="">		
            <div class="row ">
				<div class="col-lg-4">
				<div class="form-group profile-image">
					<img style="border:1px solid gray;" width="200" height="200" src="upload/anhsinhvien/{!!Auth::user()->picture!!}" class="attachment-thumbnail size-thumbnail"
						alt="" title="sinhvien" srcset="upload/anhsinhvien/{!!Auth::user()->picture!!} 200w, upload/anhsinhvien/{!!Auth::user()->picture!!} 250w"
						sizes="(max-width: 200px) 150vw, 200px" style="display: block;">
				</div>
				<div class="form-group profile-name ">
					<p><b>{!!Auth::user()->name!!}</b></p>
				</div>
				</div>
				<div class="col-lg-8">
						<div class="form-group">
							<label class="control-label">MSSV:</label> {!!$student->mssv!!}
						</div><hr>
						<div class="form-group">
							<label class="control-label">Lớp:</label> {!!$student->lop!!} - {!!$student->grade!!}
						</div><hr>
						<div class="form-group">
							<label class="control-label">Chương trình:</label> {!!Auth::user()->student->ctdt!!}
						</div><hr>
						<div class="form-group">
							<label class="control-label">Số điện thoại:</label> {!!Auth::user()->student->phone!!}
						</div><hr>
						<div class="form-group">
							<label class="control-label">Email:</label> {!!Auth::user()->email!!} 
						</div><hr>
						<div class="form-group">
							<label class="control-label">Địa chỉ:</label> {!!Auth::user()->student->address!!}
						</div>
				
				</div>
             </div>
                <br>
		</form>
	</div>
@endsection
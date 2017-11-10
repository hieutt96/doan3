@extends('student.index_student')
@section('content')
	<hr style="border-color:red;">
	<div class="row col-lg-offset-1 "> 
		<b><h2 class="heading">Thông tin tài khoản</h2></b>
	</div>
	<hr style="border-width: 2px;" class="col-lg-offset-1 ">
	<div class="container">
		<form class="form-info" method="POST" action="">		
            <div class="row ">
					<div class="col-lg-offset-1 col-lg-4">
						<div class="form-group">
							<label class="control-label">Họ và tên:</label>
							<p></p>
						</div>
						<div class="form-group">
							<label class="control-label">Lớp:</label>
							<p></p>
						</div>
						<div class="form-group">
							<label class="control-label">Chương trình:</label>
							<p></p>
						</div>
						<div class="form-group">
							<label class="control-label">Bộ môn:</label>
							<p></p>
						</div>
						<div class="form-group">
							<label class="control-label">Số điện thoại:</label>
						    <p></p>
						</div>
						<div class="form-group">
							<label class="control-label">Email:</label>
						    <p></p>
						</div>
						<div class="form-group">
							<label class="control-label">Địa chỉ:</label>
							<p></p>
						</div>
					</div>
                </div>
                <br>
		</form>
	</div>
@endsection
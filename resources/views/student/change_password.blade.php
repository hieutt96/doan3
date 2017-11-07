@extends('layouts.panel')
@section('content')
	<hr style="border-color:red;">
	<div class="row col-lg-offset-1 "> 
		<b><h2 >Đổi Mật Khẩu</h2></b>
		<b><h3>Thay đổi mật khẩu. Mật khẩu mới phải có tối thiểu 8 ký tự</h3></b>
	</div>
	<hr style="border-width: 2px;" class="col-lg-offset-1 ">
	<div class="container">
		@if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif

         @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
		<form class="form-info" method="POST" action="student/change-password">
		<input type="hidden" name="_token" value={!!csrf_token()!!}>
			<div>	
				<div class="row">
					<div class="col-lg-offset-1 col-lg-4">
						<div class="form-group">
							<label class="control-label">Tài khoản:</label>
							<input type="email" name="email" disabled class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Mật khẩu cũ:</label>
							<input type="password" name="password"  class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Mật khẩu mới:</label>
							<input type="password" name="new_password"  class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Nhập lại mật khẩu :</label>
							<input type="password" name="re-password" class="form-control" >
						</div>
					</div>
				</div><br>
				<div class="row">
					<button class="col-lg-offset-1 btn btn-control btn-lg">Thay đổi</button>
				</div><hr>
			</div>
		</form>
	</div>
@endsection
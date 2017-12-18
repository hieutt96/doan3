
@extends('layouts.panel')
@section('content')
	<script src="{{ asset('/js/ckeditor/ckeditor/ckeditor.js') }}"></script>
	<hr style="border-width: 2px;color: red;">
	<div class="row">
		<a href="{{url('/')}}" style="font-size: 21px;"><h4 class="col-lg-2"><span class="glyphicon glyphicon-home"></span>Home</a></h4>
		<h3 class="col-lg-8 col-lg-offset-2 " >
			Phần Đăng Ký Dành Cho Doanh Nghiệp
		</h3>
	</div>
	<hr style="border-width: 2px; border-color: red;">	
	<div class="row">
		<h4 class=" col-lg-8"><span class="glyphicon glyphicon-fire"></span> Đăng ký thông tin doanh nghiệp</h4>
	</div>
	<hr>
	@if(count($errors))
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.
			<br/>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form method="POST" action="{{route('dang-ky-dn.post')}}" enctype="multipart/form-data">
		{{ csrf_field() }}	
		<div class="row">
			<div class="col-lg-3">
				<img src="" style="height: 250px;width: 300px; border-radius: 10px;" ><br><br>
				<div class="row">
					<p class="col-lg-4">Chọn Ảnh:</p>
					<input class="col-lg-8 btn btn-default" type="file" name="image">
				</div>
			</div>
			<div class="col-lg-8 col-lg-offset-1">
				<div class="form-group {{ $errors->has('tenconty') ? ' has-error' : '' }}">
					<label  class="col-lg-2 control-label">Tên Công Ty:</label>
					<div class="col-lg-9">
						<input type="text" name="tencongty" placeholder="..." class=" form-control" required>
					</div>					
           			@if ($errors->has('tencongty'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tencongty') }}</strong>
                        </span>
                   @endif
				</div><br><br>
				<div class="form-group {{ $errors->has('diachi') ? ' has-error' : '' }}">
					<label class="col-lg-2 control-label">Địa Chỉ :</label>
					<div class="col-lg-9">
						<textarea name="diachi" placeholder="..." class="form-control" required></textarea>
					</div>

           			@if ($errors->has('diachi'))
                        <span class="help-block">
                            <strong>{{ $errors->first('diachi') }}</strong>
                        </span>
                   @endif
				</div><br><br><br>
				<div class="form-group {{ $errors->has('namthanhlap') ? ' has-error' : '' }}">
					<label class="col-lg-3 control-label">Năm thành lập :</label>
					<div class="col-lg-2">
						<input type="number" name="namthanhlap" placeholder="..." class="form-control" required>
					</div>

           			@if ($errors->has('namthanhlap'))
                        <span class="help-block">
                            <strong>{{ $errors->first('namthanhlap') }}</strong>
                        </span>
                   @endif
				</div><br><br>
				<div class="form-group {{ $errors->has('sonhanvien') ? ' has-error' : '' }}">
					<label class="col-lg-3 control-label" >Số lượng nhân viên :</label>
					<div class="col-lg-2">
						<input type="number" name="sonhanvien" placeholder="..." class="form-control" required>
					</div>

           			@if ($errors->has('sonhanvien'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sonhanvien') }}</strong>
                        </span>
                   @endif
				</div><br><br>
				<div class="form-group">
					<label class="col-lg-3 control-label">Đăng kí cho học kỳ :</label>
					<div class="col-lg-3">
						<select name="hocky" class="form-control">
							@foreach($hockys as $hocky)
								<option value="{{$hocky->ten_hoc_ki}}">{{$hocky->ten_hoc_ki}}</option>
							@endforeach
						</select>
					</div>
				</div><br><br>

				<div class="form-group {{ $errors->has('mota') ? ' has-error' : '' }}">
					<label class="col-lg-3 control-label">Mô tả ngắn về công ty :</label>
					<div class="col-lg-8">
						<textarea class="form-control" placeholder="..." name="mota" id="mota" rows="5"></textarea>
						<script type="text/javascript">CKEDITOR.replace('mota');</script>
					</div>

           			@if ($errors->has('mota'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mota') }}</strong>
                        </span>
                   @endif
				</div>
			</div>
		</div><br><hr style="border-color: red;">
		<div >
			<div class="row">
				<label class="control-label" style="font-size: 18px;"><span class="glyphicon glyphicon-info-sign"></span> Thông tin liên hệ :</label>
			</div><hr>
			<div class="row">
				<div class="form-group col-lg-offset-2 {{ $errors->has('hotennvpt') ? ' has-error' : '' }}">
					<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span> Họ tên nhân viên phụ trách thực tập :</label>
					<div class="col-lg-6">
						<input type="text" name="hotennvpt" placeholder="..." required class="form-control">
					</div>

           			@if ($errors->has('hotennvpt'))
                        <span class="help-block">
                            <strong>{{ $errors->first('hotennvpt') }}</strong>
                        </span>
                   @endif
				</div><br><br>
				<div class="form-group col-lg-offset-2 {{ $errors->has('sodienthoai') ? ' has-error' : '' }}">
					<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span>Số điện thoại :</label>
					<div class="col-lg-6">
						<input type="text" name="sodienthoai" placeholder="..." class="form-control" required>
					</div>

           			@if ($errors->has('sodienthoai'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sodienthoai') }}</strong>
                        </span>
                   @endif
				</div><br><br>
				<div class="col-lg-offset-2 form-group {{ $errors->has('emailnv') ? ' has-error' : '' }}">
					<label class="control-label col-lg-3"><span class="glyphicon glyphicon-star"></span>Email</label>
					<div class="col-lg-6">
						<input type="text" name="emailnv" placeholder="..." class="form-control">
					</div>

           			@if ($errors->has('emailnv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('emailnv') }}</strong>
                        </span>
                   @endif
				</div>
			</div>
		</div>
		<div><br><hr style="border-color: red;">
			<div class="row">
				<label style="font-size: 18px;"><span class="glyphicon glyphicon-info-sign"></span> Đăng ký thông tin chi tiết :</label>
			</div><br>
			<div class="row">
				<div class="col-lg-offset-2 form-group {{ $errors->has('diachithuctap') ? ' has-error' : '' }}">
					<label class="col-lg-2 control-label">Địa chỉ thực tập :</label>
					<div class="col-lg-6">
						<input type="text" name="diachithuctap" placeholder="..." required class="form-control">
					</div>

           			@if ($errors->has('diachithuctap'))
                        <span class="help-block">
                            <strong>{{ $errors->first('diachithuctap') }}</strong>
                        </span>
                   @endif
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-offset-2 form-group {{ $errors->has('thoigiantt') ? ' has-error' : '' }}">
					<label class="col-lg-2 control-label">Thời gian mong muốn:</label>
					<div class="col-lg-6">
						<select name="thoigiantt" required class="form-control">
							<option value=""></option>
							<option value="fullTime">Full time</option>
							<option value="partTime">Part time</option>
						</select>
					</div>

           			@if ($errors->has('thoigiantt'))
                        <span class="help-block">
                            <strong>{{ $errors->first('thoigiantt') }}</strong>
                        </span>
                   @endif
				</div>
			</div>

			<div class="row">
				<div class="col-lg-offset-2 form-group {{ $errors->has('linhvuchoatdong') ? ' has-error' : '' }}">
					<label class="col-lg-2 control-label">Lĩnh Vực Hoạt Động :</label>
					<div class="col-lg-6">
						<select type="text" name="linhvuchoatdong[]" placeholder="..." required class="form-control select2" multiple="multiple">
							<option value="PHP">PHP</option>
							<option value="JAVA">JAVA</option>
							<option value="Javascript">Javascript</option>
							<option value="Ruby">Ruby</option>
							<option value="C/C++">C/C++</option>
							<option value="Python">Python</option>
							<option value="Android">Android</option>
							<option value=".NET">.NET</option>
						</select>
						<script type="text/javascript">
							$('.select2').select2();
						</script>
					</div>

           			@if ($errors->has('linhvuchoatdong'))
                        <span class="help-block">
                            <strong>{{ $errors->first('linhvuchoatdong') }}</strong>
                        </span>
                   @endif
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group {{ $errors->has('congnghedaotao') ? ' has-error' : '' }}">
					<label class="col-lg-2 control-label">Công Nghệ Đào Tạo</label>
					<div class="col-lg-6">
						<select type="text" name="congnghedaotao[]" placeholder="..." required class="form-control select2" multiple="multiple">
							<option value="PHP">PHP</option>
							<option value="JAVA">JAVA</option>
							<option value="Javascript">Javascript</option>
							<option value="Ruby">Ruby</option>
							<option value="C/C++">C/C++</option>
							<option value="Python">Python</option>
							<option value="Android">Android</option>
							<option value=".NET">.NET</option>
						</select>
						<script type="text/javascript">
							$('.select2').select2();
						</script>
					</div>

           			@if ($errors->has('congnghedaotao'))
                        <span class="help-block">
                            <strong>{{ $errors->first('congnghedaotao') }}</strong>
                        </span>
                   @endif
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group {{ $errors->has('soluong') ? ' has-error' : '' }}">
					<label class="col-lg-4 control-label">Số lượng sinh viên có thể nhận :</label>
					<div class="col-lg-4">
						<input type="text" name="soluong" placeholder="..." required class="form-control">
					</div>

           			@if ($errors->has('soluong'))
                        <span class="help-block">
                            <strong>{{ $errors->first('soluong') }}</strong>
                        </span>
                   @endif
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group {{ $errors->has('yeucaungoaingu') ? ' has-error' : '' }}">
					<label class="col-lg-2 control-label">Yêu cầu về ngoại ngữ:</label>
					<div class="col-lg-6">
						<input type="text" name="yeucaungoaingu" placeholder="..."  class="form-control">
					</div>

           			@if ($errors->has('yeucaungoaingu'))
                        <span class="help-block">
                            <strong>{{ $errors->first('yeucaungoaingu') }}</strong>
                        </span>
                   @endif
				</div>
			</div><br>

			<!-- Them sau -->

		</div><hr style="border-color: red;">
		<div>
			<div class="row">
				<label style="font-size: 18px;"><span class="glyphicon glyphicon-star-empty"></span>  Đăng ký tài khoản :</label>
			</div><hr>
			<div class="row">
				<div class="form-group col-lg-offset-2 {{ $errors->has('emaildn') ? ' has-error' : '' }}">
					<label class="control-label col-lg-2">Email Đăng Nhập :</label>
					<div class="col-lg-5">
						<input type="email" name="emaildn" placeholder="..." class="form-control" required>
					</div>

           			@if ($errors->has('emaildn'))
                        <span class="help-block">
                            <strong>{{ $errors->first('emaildn') }}</strong>
                        </span>
                   @endif
				</div><br><br>
				<div class="form-group col-lg-offset-2 {{ $errors->has('password') ? ' has-error' : '' }}">
					<label class="control-label col-lg-2">Password :</label>
					<div class="col-lg-5">
						<input type="password" name="password" class="form-control" required>

           			@if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                   @endif
					</div>
				</div><br><br>

				<div class="form-group col-lg-offset-2 {{ $errors->has('re-password') ? ' has-error' : '' }}">
					<label class="control-label col-lg-2">Re-Password :</label>
					<div class="col-lg-5">
						<input type="password" name="re-password" class="form-control" required>
					</div>

           			@if ($errors->has('re-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('re-password') }}</strong>
                        </span>
                   @endif
				</div>
			</div>
		</div><br><br>
		<div class="row">
			<div class="col-lg-offset-3 col-lg-4">
				<button class="btn btn-info col-lg-12" type="submit">Submit</button>
			</div>

		</div>
	</form>
	<hr>
@endsection
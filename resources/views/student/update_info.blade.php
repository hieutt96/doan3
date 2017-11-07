@extends('layouts.panel')
@section('content')
	<hr style="border-color: red;">
	<div class="row col-lg-offset-4"> 
		<b><h2 class="heading">Cập Nhật Thông Tin Sinh Viên</h2></b>
	</div>
	<div class="container">
		<form method="POST" action="student/update-student-info" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{!!csrf_token()!!}"	/>
			<div>
				<div class="col-lg-6">
					<b style="font-size: 16px;">Chú ý: <span class="glyphicon glyphicon-star"></span> Thông tin bắt buộc</b>	
					<br><br>	
					
					    <div class="form-group {{$errors->has('phone')?'has-error' :''}}">
							<label class="control-label">Ảnh đại diện *</label>
							<p>
                                <img max-width="200px" height="200px" src="http://static.giaoducthoidai.vn/Uploaded/thuyvt/2014_04_26/tre/image004_XHOY.jpg?width=500"/>
                            </p>
							<input style="width:287px" type="file" name="anh" value="{{old('anh')}}" placeholder="..." class="form-control" >
							@if ($errors->has('anh'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('anh') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="control-label ">Họ Và Tên *</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="..." >
	               			@if ($errors->has('name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
	                       @endif
						</div>
						<div class="form-group {{ $errors->has('lop') ? ' has-error' : '' }}">
							<label class="control-label">Lớp *</label>
							<input type="text" name="lop" class="form-control" placeholder="..." value="{{ old ('lop') }}">
	               			@if ($errors->has('lop'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('lop') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="form-group {{$errors->has('khoa')?'has-error' :''}}">
							<label class="control-label">Khóa *</label>
							<input type="text" name="khoa" placeholder="..." class="form-control" value= "{{old ('khoa')}}">

	               			@if ($errors->has('khoa'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('khoa') }}</strong>
	                            </span>
	                       @endif
						</div>
						<div class="form-group">
							<label class="control-label">Chương Trình Đào Tạo *</label>
							<select name="ctdt" class="form-control" >
								<option value=""></option>
								<option value="Kĩ Sư">Kĩ Sư</option>
								<option value="Cử Nhân">Cử Nhân</option>
								<option value="KSTS">KSTN</option>
								<option value="Chương Trình Tiên Tiến">Chương Trình Tiên Tiến</option>
								<option value="Việt - Nhật">Việt - Nhật</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Bộ Môn *</label>
							<select name="bomon" class="form-control" >
								<option value=""></option>
								<option value="1">Hệ Thống Thông Tin</option>
								<option value="2">Công nghệ phần mềm</option>
								<option value="3">Khoa Học Máy Tính</option>
								<option value="4">Truyền Thông Và Mạng Máy Tính</option>
								<option value="5">An Toàn Thông Tin</option>
								<option value="6">Kĩ Thuật Máy Tính</option>
							</select>
						</div>
						
						<div class="form-group">
							<label class="control-label"> Giới tính *</label>
							<label class="radio-inline "><input type="radio" name="gender" value="1" checked > Nam</label>
							<label class="radio-inline"><input type="radio" name="gender" value="0"> Nữ</label>
						</div>
						
						<div class="form-group">
							<label class="control-label">Laptop * :</label>
							<select name="laptop" class="form-control" >
								<option value=""></option>
								<option value="1"> Có </option>
								<option value="0">Không</option>
							</select>
						  </div>
						 <div class="form-group {{$errors->has('diachi')?'has-error' :''}}">
							<label class="control-label">Địa Chỉ Hiện Tại </label>
							<input type="text" name="diachi" class="form-control" placeholder="..." value="{{old('diachi')}}" >
	               			@if ($errors->has('diachi'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('diachi') }}</strong>
	                            </span>
	                       @endif
						</div>
						
					</div>
				</div>
				<div class="col-lg-6 col-right">
					
					
						
					{{--<b style="font-size: 16px;"><span class="glyphicon glyphicon-star"></span> Kỹ Năng</b>--}}<br><br>	
					 <div class="form-group col-right {{$errors->has('phone')?'has-error' :''}}">
							<label class="control-label">Số điện thoại *</label>
							<input type="text" name="phone" value="{{old('phone')}}" placeholder="..." class="form-control" >
							@if ($errors->has('phone'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('phone') }}</strong>
	                            </span>
	                        @endif
						</div>
					<div class="form-group col-right {{$errors->has('cpa') ? 'has-error' : ''}}">
							<label class="control-label">Điểm trung bình CPA *</label>
							<input type="text" name="cpa" value="{{old('cpa')}}"  class="form-control" placeholder="...">
						@if($errors->has('cpa'))
							<span class="help-block"><strong>{{$errors->first('cpa')}}</strong></span>
						@endif
					</div>
					<div class="form-group col-right {{$errors->has('english')?'has-error':''}}">
						<label class="control-label">Khả năng tiếng anh *</label>
						<textarea type="text" name="english" value="{{old('english')}}"  class="form-control" placeholder="..."></textarea>
						@if($errors->has('english'))
							<span class="help-block"><strong>{{$errors->first('english')}}</strong></span>
						@endif
					</div>
					<div class="form-group col-right{{$errors->has('ep1')?'has-error':''}}">
						<label class="control-label">Kỹ năng lập trình - Có thể sử dụng *</label>
						<textarea  type="text" name="ep1" value="{{old('ep1')}}" class="form-control" placeholder="..."></textarea>
						@if($errors->has('ep1'))
							<span class="help-block"><strong>{{$erros->first('ep1')}}</strong></span>
						@endif
					</div>
					<div class="form-group col-right{{$errors->has('ep2')?'has-error':''}}" >
							<label class="control-label">Kỹ năng lập trình - mức độ thành thạo *</label>
							<textarea  type="text" name="ep2" value="{{old('ep2')}}"  class="form-control" placeholder="..."></textarea>
							@if($errors->has('ep2'))
								<span class="help-block"><strong>{{$errors->first('ep2')}}</strong></span>
							@endif
					</div>					
					<div class="form-group col-right {{$errors->has('ep3')?'has-error':''}}" >
							<label class="control-label">Kỹ năng lập trình - mức độ làm chủ được công nghệ,có kinh nghiệm thực tế tốt *</label>
							<textarea  type="text" name="ep3" value="{{old('ep3')}}"  class="form-control" placeholder="..."></textarea>
							@if($errors->has('ep3'))
								<span class="help-block"><strong>{{$errors->first('ep3')}}</strong></span>
							@endif
					</div>

					<div class="form-group col-right {{$errors->has('ep4')?'has-error':''}}" >
							<label class="control-label">Kỹ năng quản trị hệ thống ,quản trị mạng *</label>
							<textarea  type="text" name="ep4" value="{{old('ep4')}}"  class="form-control" placeholder="..."></textarea>
							@if($errors->has('ep4'))
								<span class="help-block"><strong>{{$errors->first('ep4')}}</strong></span>
							@endif
					</div>

					<div class="form-group col-right{{$errors->has('ep5')?'has-error':''}}" >
							<label class="control-label">Kỹ năng khác nếu có </label>
							<textarea  type="text" name="ep5" value="{{old('ep5')}}"  class="form-control" placeholder="..."></textarea>
					</div>

					<div class="form-group col-right {{$errors->has('cty')?'has-error':''}}" >
							<label class="control-label">Các công ty đã thực tập </label>
							<textarea  type="text" name="cty" value="{{old('cty')}}"  class="form-control" placeholder="..."></textarea>
					</div>
				</div>
				<hr style="border-width: 2px;">
				<hr>
				<div class="row">
					<button class="col-lg-offset-3 col-lg-6 btn btn-success btn-lg">Cập Nhật</button>
				</div><hr>
			</div>
		</form>
	</div>
@endsection
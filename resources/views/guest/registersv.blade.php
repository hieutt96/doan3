@extends('layouts.panel')
@section('content')
	<div class="row col-lg-offset-4"> 
		<b><h2>Đăng Ký Dành Cho Sinh Viên</h2></b>
	</div>
	<hr style="border-width: 2px;">
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
	<div class="container">
		<form method="POST" action="{{route('dang-ky-sv.post')}}">
			{{ csrf_field() }}			
			<div class="row">
				<div class="col-lg-6">
					<b style="font-size: 16px;"><span class="glyphicon glyphicon-user"></span>  Thông Tin Sinh Viên</b>	
					<br><br>	
					<div class="col-lg-11 ">
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="control-label ">Họ Và Tên:</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="..." required autofocus>
	               			@if ($errors->has('name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
	                       @endif
						</div>
						<div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
							<label class="control-label">Lớp :</label>
							<input type="text" name="class" class="form-control" placeholder="..." value="{{ old ('class') }}" required>

	               			@if ($errors->has('class'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('class') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="form-group {{$errors->has('mssv') ?'has-error':''}}">
							<label class="control-label"> Mã Số Sinh Viên :</label>
							<input type="int" name="mssv" value="{{old('mssv')}}" required class="form-control" placeholder="...">
							@if($errors ->has('mssv'))
								<span class="help-block">
									<strong>{{$errors->first('mssv')}}</strong>
								</span>
							@endif
						</div>
						<div class="form-group {{$errors->has('grade')?'has-error' :''}}">
							<label class="control-label">Khóa :</label>
							<input type="text" name="grade" placeholder="..." class="form-control" value= "{{old ('grade')}}" required>

	               			@if ($errors->has('grade'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('grade') }}</strong>
	                            </span>
	                       @endif
						</div>
						<div class="form-group">
							<label class="control-label">Chương Trình Đào Tạo :</label>
							<select name="ctdt" class="form-control" required>
								<option value=""></option>
								<option value="Kĩ Sư">Kĩ Sư</option>
								<option value="Cử Nhân">Cử Nhân</option>
								<option value="KSTS">KSTN</option>
								<option value="Chương Trình Tiên Tiến">Chương Trình Tiên Tiến</option>
								<option value="Việt - Nhật">Việt - Nhật</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Bộ Môn :</label>
							<select name="bm" class="form-control" required>
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
							<label class="control-label col-lg-4"> Giới tính :</label>
							<label class="radio-inline "><input type="radio" name="gender" value="1" required> Name</label>
							<label class="radio-inline"><input type="radio" name="gender" value="0"> Nữ</label>
						</div>
						<div class="form-group">
							<label class="control-label">Laptop* :</label>
							<select name="laptop" class="form-control" required>
								<option value=""></option>
								<option value="1"> Có </option>
								<option value="0">Không</option>
							</select>
						</div>
						<div class="form-group {{$errors->has('address')?'has-error' :''}}">
							<label class="control-label">Địa Chỉ Hiện Tại :</label>
							<input type="text" name="address" class="form-control" placeholder="..." value="{{old('address')}}" required>
	               			@if ($errors->has('address'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('address') }}</strong>
	                            </span>
	                       @endif
						</div>
						<div class="form-group {{$errors->has('phone')?'has-error' :''}}">
							<label class="control-label">Số điện thoại :</label>
							<input type="text" name="phone" value="{{old('phone')}}" placeholder="..." class="form-control" required>
							@if ($errors->has('phone'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('phone') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
				</div>
				<div class="col-lg-6 row">
					<b style="font-size: 16px;"><span class="glyphicon glyphicon-star"></span>Kỹ Năng</b><br><br>
					<div class="form-group {{$errors->has('cpa') ? 'has-error' : ''}}">
						<label class="control-label">Điểm trung bình CPA :</label>
						<input type="number" step=0.01 name="cpa" value="{{old('cpa')}}" required class="form-control" placeholder="..." min=0 max=4>
						@if($errors->has('cpa'))
							<span class="help-block"><strong>{{$errors->first('cpa')}}</strong></span>
						@endif
					</div>
					<div class="form-group {{$errors->has('english')?'has-error':''}}">
						<label class="control-label">Khả năng tiếng anh:</label>
						<textarea type="text" name="english" value="{{old('english')}}"  class="form-control" placeholder="..."></textarea>
						@if($errors->has('english'))
							<span class="help-block"><strong>{{$errors->first('english')}}</strong></span>
						@endif
					</div>
					<div class="form-group {{$errors->has('ep1')?'has-error':''}}">
						<label class="control-label">Kỹ năng lập trình - Có thể sử dụng:</label>
						<textarea  type="text" name="ep1" value="{{old('ep1')}}" class="form-control" placeholder="..."></textarea>
						@if($errors->has('ep1'))
							<span class="help-block"><strong>{{$erros->first('ep1')}}</strong></span>
						@endif
					</div>
					<div class="form-group {{$errors->has('ep2')?'has-error':''}}" >
							<label class="control-label">Kỹ năng lập trình - mức độ thành thạo:</label>
							<textarea  type="text" name="ep2" value="{{old('ep2')}}"  class="form-control" placeholder="..."></textarea>
							@if($errors->has('ep2'))
								<span class="help-block"><strong>{{$errors->first('ep2')}}</strong></span>
							@endif
					</div>					
					<div class="form-group {{$errors->has('ep3')?'has-error':''}}" >
							<label class="control-label">Kỹ năng lập trình - mức độ làm chủ được công nghệ,có kinh nghiệm thực tế tốt:</label>
							<textarea  type="text" name="ep3" value="{{old('ep3')}}"  class="form-control" placeholder="..."></textarea>
							@if($errors->has('ep3'))
								<span class="help-block"><strong>{{$errors->first('ep3')}}</strong></span>
							@endif
					</div>

					<div class="form-group {{$errors->has('ep4')?'has-error':''}}" >
							<label class="control-label">Kỹ năng quản trị hệ thống ,quản trị mạng:</label>
							<textarea  type="text" name="ep4" value="{{old('ep4')}}"  class="form-control" placeholder="..."></textarea>
							@if($errors->has('ep4'))
								<span class="help-block"><strong>{{$errors->first('ep4')}}</strong></span>
							@endif
					</div>

					<div class="form-group {{$errors->has('ep5')?'has-error':''}}" >
							<label class="control-label">Kỹ năng khác nếu có:</label>
							<textarea  type="text" name="ep5" value="{{old('ep5')}}"  class="form-control" placeholder="..."></textarea>
							@if($errors->has('ep5'))
								<span class="help-block"><strong>{{$errors->first('ep5')}}</strong></span>
							@endif
					</div>
					<div class="form-group {{ $errors->has('favorite') ? ' has-error' : '' }}">
						<label class="col-lg-5 control-label">Công nghệ mong muốn đào tạo :</label>
						<div class="col-lg-7">
							<select name="favorite[]" placeholder="..."  class="form-control select2" multiple="multiple">
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
								$('.select2').select2({
									maximumSelectionLength: 3
								});
							</script>
						</div>

	           			@if ($errors->has('favorite'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('favorite') }}</strong>
	                        </span>
	                   @endif
					</div><br><br>
				</div><br>
			</div><br>
			<div class="col-lg-5 form-group">
				<label class="col-lg-3 control-label">Học kỳ :</label>
				<div class="col-lg-8">
					<select name="hocky" class="select2 form-control" id="hocky" required>
						<option value="0">--Chọn Học Kỳ--</option>
						@foreach($hockys as $hocky)
							<option value="{{$hocky->id}}">{{$hocky->ten_hoc_ki}}</option>
						@endforeach
					</select>
				</div>
			</div><br><hr>
			<div class="row col-lg-12">
				<div id="myform">
					<div class="col-lg-5">
						<label class="col-lg-12">Bạn đã có công ty thực tập chưa :</label>
					</div>
					<div class="col-lg-3">
						<input type="radio" name="luachon" value="0" required="required" class="luachon1">Chưa có công ty thực tập
					</div>
					<div class="col-lg-3">
						<input type="radio" name="luachon" value="1" class="luachon2">Đã có công ty thực tập
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(document).on('click',"[name='luachon']",function(){
					var luachon = $(this).val();
					console.log(luachon);
					if(luachon==0){
						$(".1").show();
						$(".2").hide();
					}else{
						$(".1").hide();
						$(".2").show();
					}
				});
			</script>
			<div class="row 1" style="display: none;margin: 10px;">
				<div class="row"><b style="font-size: 20px; color: red;"> Phần dành cho Sinh Viên chưa có công ty thực tập:</b></div><br>
				<div class="col-lg-offset-1 col-lg-8 row">
						<label class="control-label">Công Ty Mong Muốn Thực Tập:</label>
						<select name="congty[]" class="form-control select2" multiple="multiple" id="dangkycongty" style="width: 500px;">
							
						</select>
						<script type="text/javascript">
							$(".select2").select2();
						</script>
				</div>
			</div>


			<div class="row col-lg-12 2" style="display: none;">
				<div class="row"><b style="font-size: 20px; color: red;"> Phần dành cho Sinh Viên đã có công ty thực tập:</b></div><br>
				<div class="col-lg-offset-1 col-lg-6">
					<div class="form-group">
						<label class="control-label"> Tên Công Ty Thực Tập:</label>
						<select class="form-control select2" name="cty2" placeholder="..." id="cty2" required style="width: 500px;">
							<option value="">--Select--</option>
						</select>
						<script type="text/javascript">
							$("#cty2").select2();
						</script>
					</div>
					<div class="form-group {{$errors->has('nv') ? 'has-error':''}}">
						<label class="control-label">Tên nhân viên phụ trách thực tập :</label>
						<select type="text" name="nv" class="form-control select2" placeholder="..." value="{{old('nv')}}"></select>
						@if($errors->has('nv'))
							<span class="help-block"><strong>{{$errors->first('nv')}}</strong></span>
						@endif
					</div>
					<div class="form-group {{$errors->has('mailnv')?'has-error':''}}">
						<label class="control-label">Email nhân viên phụ trách thực tập:</label>
						<select type="email" name="mailnv" class="form-control select2" placeholder="..." value="{{old('mailnv')}}"></select>
						@if($errors->has('mailnv'))
							<span class="help-block"><strong>{{$errors->first('mailnv')}}</strong></span>
						@endif
					</div>
				</div>
			</div><br><hr style="border-width: 2px;">
				<div class="row col-lg-12">
					<div class="row">
						<b style="color: red;font-size: 20px;">Đăng ký tài khoản:</b>
					</div><br>
					<div class="col-lg-offset-1 col-lg-4">
						<div class="form-group">
							<label class="control-label">Email:</label>
							<input type="email" name="email" required value="{{old('email')}}" placeholder="..." class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Password:</label>
							<input type="password" name="password"  class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label">Nhập lại password:</label>
							<input type="password" name="re-password" class="form-control" >
						</div>
					</div>
				</div><hr>
				<div class="row">
					<button class="col-lg-offset-3 col-lg-5 btn btn-control btn-lg">Đăng Ký</button>
				</div><hr>
			</div>
		</form>
	</form>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('/js/guest/registersv.js')}}"></script>
<!-- 	<script type="text/javascript">
		$(".select2").select2();
	</script> -->
@endsection
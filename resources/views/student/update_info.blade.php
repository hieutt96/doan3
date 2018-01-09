@extends('layouts.welcome')
@section('welcome')
	<div class="row col-lg-offset-4"> 
		<b><h2 class="heading">Cập Nhật Thông Tin Sinh Viên</h2></b>
	</div>
	<div class="container">
		<form method="POST" action="{{ url('student/update-student-info')}}" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{!!csrf_token()!!}"	/>
			<div>
				<div class="col-lg-6">
					<b style="font-size: 16px;">Chú ý: <span class="glyphicon glyphicon-star"></span> Thông tin bắt buộc</b>	
					<br><br>	
					 @if(session('thongbao'))
            			<div class="alert alert-success">
               			 {{session('thongbao')}}
          				</div>
        			 @endif
					    <div class="form-group {{$errors->has('anh')?'has-error' :''}}">
							<label class="control-label">Ảnh đại diện *</label>
							<p>
							<img width="200" height="200" src="upload/anhsinhvien/{!!Auth::user()->picture!!}" class="attachment-thumbnail size-thumbnail"
								  title="" srcset="upload/anhsinhvien/{!!Auth::user()->picture!!} 200w, upload/anhsinhvien/{!!Auth::user()->picture!!} 250w"
								 sizes="(max-width: 200px) 150vw, 200px" style="display: block;">
                            </p>
							@if(session('loi'))
            				<div class="alert alert-danger">
               			 	{{session('loi')}}
          					</div>
        			    	@endif
							<input type="file" name="anh"  placeholder="..." class="form-control" >
							@if ($errors->has('anh'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('anh') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
							<label class="control-label ">Họ Và Tên *</label>
							<input type="text" name="name" class="form-control" value="{!!Auth::user()->name!!}" placeholder="..." >
	               			@if ($errors->has('name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
	                       @endif
						</div>
						<div class="form-group {{ $errors->has('mssv') ? ' has-error' : '' }}">
							<label class="control-label ">MSSV *</label>
							<input type="text" name="mssv" class="form-control" value="{!!Auth::user()->student->mssv!!}" placeholder="..." >
	               			@if ($errors->has('mssv'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('mssv') }}</strong>
	                            </span>
	                       @endif
						</div>
						<div class="form-group {{ $errors->has('lop') ? ' has-error' : '' }}">
							<label class="control-label">Lớp *</label>
							<input type="text" name="lop" class="form-control" placeholder="..." value="{!!Auth::user()->student->lop!!} ">
	               			@if ($errors->has('lop'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('lop') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="form-group {{ $errors->has('khoa') ? ' has-error' : '' }}">
							<label class="control-label">Khóa *</label>
							<input type="text" name="khoa" class="form-control" placeholder="..." value="{!!Auth::user()->student->grade!!} ">
	               			@if ($errors->has('grade'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('grade') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="form-group">
							 <?php $ctdt_arr = [0=>'',1=>'Kỹ Sư',2=>'Cử Nhân',3=>'KSTN',
							 4=>'Chương Trình Tiên Tiến',5=>'Việt - Nhật'] ?>
							<label class="control-label">Chương Trình Đào Tạo *</label>
							<select name="ctdt" class="form-control" >
							@foreach($ctdt_arr as $key=> $val)
								 <option 
								 @if(Auth::user()->student->ctdt==$val)
								 {!!"selected"!!}
								 @endif
							    value="{{$val}}">{{$val}}
								</option>
							@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label class="control-label"> Giới tính *</label>
							<label class="radio-inline "><input type="radio" name="gender" value="0"
							@if(Auth::user()->student->gender == 0)
							{!!"checked"!!} 
							@endif
							> Nam</label>
							<label class="radio-inline"><input type="radio" name="gender" value="1"
							@if(Auth::user()->student->gender == 1)
							{!!"checked"!!} 
							@endif
							> Nữ</label>
						</div>
						
						<div class="form-group">
							<label class="control-label">Laptop * :</label>
							<select name="laptop" class="form-control" >
								<option value="1"
								@if(Auth::user()->student->laptop==1)
								{!!"selected"!!}
								@endif
								> Có </option>
								<option value="0"
								@if(Auth::user()->student->laptop==0)
								{!!"selected"!!}
								@endif>Không</option>
							</select>
						  </div>
						 <div class="form-group {{$errors->has('diachi')?'has-error' :''}}">
							<label class="control-label">Địa Chỉ Hiện Tại </label>
							<input type="text" name="diachi" class="form-control" placeholder="..." value="{!!Auth::user()->student->address!!}" >
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
							<input type="txt" name="phone" value="{!!Auth::user()->student->phone!!} " placeholder="" class="form-control" >
							@if ($errors->has('phone'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('phone') }}</strong>
	                            </span>
	                        @endif
						</div>
					<div class="form-group col-right {{$errors->has('cpa') ? 'has-error' : ''}}">
							<label class="control-label">Điểm trung bình CPA *</label>
							<input type="text" name="cpa" value="{!!number_format(Auth::user()->student->CPA,2)!!}"  class="form-control" placeholder="...">
						@if($errors->has('cpa'))
							<span class="help-block"><strong>{{$errors->first('cpa')}}</strong></span>
						@endif
					</div>
					<div class="form-group col-right {{$errors->has('english')?'has-error':''}}">
						<label class="control-label">Khả năng tiếng anh *</label>
						<textarea type="text" name="english" value=""  class="form-control" placeholder="">{!!Auth::user()->student->TA!!}</textarea>
						@if($errors->has('english'))
							<span class="help-block"><strong>{{$errors->first('english')}}</strong></span>
						@endif
					</div>
					<div class="form-group col-right{{$errors->has('ep1')?'has-error':''}}">
						<label class="control-label">Kỹ năng lập trình - Có thể sử dụng *</label>
						<textarea  type="text" name="ep1" value=" " class="form-control" placeholder="">{!!Auth::user()->student->knlt_cothesudung!!}</textarea>
						@if($errors->has('ep1'))
							<span class="help-block"><strong>{{$errors->first('ep1')}}</strong></span>
						@endif
					</div>
					<div class="form-group col-right{{$errors->has('ep2')?'has-error':''}}" >
							<label class="control-label">Kỹ năng lập trình - mức độ thành thạo *</label>
							<textarea  type="text" name="ep2" value=""  class="form-control" placeholder="">{!!Auth::user()->student->knlt_thanhthao!!}</textarea>
							@if($errors->has('ep2'))
								<span class="help-block"><strong>{{$errors->first('ep2')}}</strong></span>
							@endif
					</div>					
					<div class="form-group col-right {{$errors->has('ep3')?'has-error':''}}" >
							<label class="control-label">Kỹ năng lập trình - mức độ làm chủ được công nghệ,có kinh nghiệm thực tế tốt *</label>
							<textarea  type="text" name="ep3" value=""  class="form-control" placeholder="...">{!!Auth::user()->student->knlt_master!!}</textarea>
							@if($errors->has('ep3'))
								<span class="help-block"><strong>{{$errors->first('ep3')}}</strong></span>
							@endif
					</div>

					<div class="form-group col-right {{$errors->has('ep4')?'has-error':''}}" >
							<label class="control-label">Kỹ năng quản trị hệ thống ,quản trị mạng *</label>
							<textarea  type="text" name="ep4" value=""  class="form-control" placeholder="...">{!!Auth::user()->student->quan_tri_he_thong!!}</textarea>
							@if($errors->has('ep4'))
								<span class="help-block"><strong>{{$errors->first('ep4')}}</strong></span>
							@endif
					</div>

					<div class="form-group col-right{{$errors->has('ep5')?'has-error':''}}" >
							<label class="control-label">Kỹ năng khác nếu có </label>
							<textarea  type="text" name="ep5" value=""  class="form-control" placeholder="...">{!!Auth::user()->student->Other!!}</textarea>
					</div>

					<div class="form-group col-right {{$errors->has('cty')?'has-error':''}}" >
							<label class="control-label">Các công ty đã thực tập </label>
							<textarea  type="text" name="cty" value=""  class="form-control" placeholder="...">{!!Auth::user()->student->cty_da_thuc_tap!!}</textarea>
					</div>
				</div>
				<hr style="border-width: 2px;">
				<hr>
				<div class="row" style="margin-bottom:30px;">
					<button class="col-lg-offset-3 col-lg-6 btn btn-success btn-lg">Cập Nhật</button>
				</div>
			</div>
		</form>
	</div>
@endsection
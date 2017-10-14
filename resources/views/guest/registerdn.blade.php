@extends('layouts.panel')
@section('content')
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
	<form method="POST" action="{{route('dang-ky-dn.post')}}">
		{{ csrf_field() }}	
		<div class="row">
			<div class="col-lg-3">
				<img src="" style="height: 250px;width: 300px; border-radius: 10px;" >
				<div class="row">
					<button class="col-lg-offset-1 col-lg-10 btn btn-default">Chọn Ảnh</button>
				</div>
			</div>
			<div class="col-lg-8 col-lg-offset-1">
				<div class="form-group">
					<label  class="col-lg-2 control-label">Tên Công Ty:</label>
					<div class="col-lg-9">
						<input type="text" name="tencongty" placeholder="..." class=" form-control" required>
					</div>
				</div><br><br>
				<div class="form-group">
					<label class="col-lg-2 control-label">Địa Chỉ :</label>
					<div class="col-lg-9">
						<textarea name="diachi" placeholder="..." class="form-control" required></textarea>
					</div>
				</div><br><br><br>
				<div class="form-group">
					<label class="col-lg-3 control-label">Năm thành lập :</label>
					<div class="col-lg-2">
						<input type="number" name="namthanhlap" placeholder="..." class="form-control" required>
					</div>
				</div><br><br>
				<div class="form-group">
					<label class="col-lg-3 control-label" >Số lượng nhân viên :</label>
					<div class="col-lg-2">
						<input type="number" name="sonhanvien" placeholder="..." class="form-control" required>
					</div>
				</div><br><br>
				<div class="form-group">
					<label class="col-lg-4 control-label">Số lượng nhân viên CNTT :</label>
					<div class="col-lg-2">
						<input type="number" name="sonhanvienit" placeholder="..." class="form-control" required>
					</div>
				</div><br><br>
				<div class="form-group">
					<label class="col-lg-3 control-label">Mô tả ngắn về công ty :</label>
					<div class="col-lg-8">
						<textarea class="form-control" placeholder="..." name="mota"></textarea>
					</div>
				</div>
			</div>
		</div><br><hr style="border-color: red;">
		<div >
			<div class="row">
				<label class="control-label" style="font-size: 18px;"><span class="glyphicon glyphicon-info-sign"></span> Thông tin liên hệ :</label>
			</div><hr>
			<div class="row">
				<div class="form-group col-lg-offset-2">
					<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span> Họ tên nhân viên phụ trách thực tập :</label>
					<div class="col-lg-6">
						<input type="text" name="hotennvpt" placeholder="..." required class="form-control">
					</div>
				</div><br><br>
				<div class="form-group col-lg-offset-2">
					<label class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span>Số điện thoại :</label>
					<div class="col-lg-6">
						<input type="text" name="sodienthoai" placeholder="..." class="form-control" required>
					</div>
				</div><br><br>
				<div class="col-lg-offset-2 form-group">
					<label class="control-label col-lg-3"><span class="glyphicon glyphicon-star"></span>Email</label>
					<div class="col-lg-6">
						<input type="text" name="emailnv" placeholder="..." class="form-control">
					</div>
				</div>
			</div>
		</div>
		<div><br><hr style="border-color: red;">
			<div class="row">
				<label style="font-size: 18px;"><span class="glyphicon glyphicon-info-sign"></span> Đăng ký thông tin chi tiết :</label>
			</div><br>
			<div class="row">
				<div class="col-lg-offset-2 form-group">
					<label class="col-lg-2 control-label">Địa chỉ thực tập :</label>
					<div class="col-lg-6">
						<input type="text" name="diachithuctap" placeholder="..." required class="form-control">
					</div>
				</div>
			</div><br>
			<div class="row">
				<div class="col-lg-offset-2 form-group">
					<label class="col-lg-2 control-label">Thời gian mong muốn:</label>
					<div class="col-lg-6">
						<select name="thoigiantt" required class="form-control">
							<option value="fullTime">Full time</option>
							<option value="partTime">Part time</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-offset-2 form-group">
					<label class="col-lg-2 control-label">Lĩnh vực hoạt động </label>
					<div class="col-lg-6">
						<input type="text" name="linhvuchoatdong" placeholder="..." required class="form-control">
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group">
					<label class="col-lg-2 control-label">Công nghệ có thể đào tạo:</label>
					<div class="col-lg-6">
						<input type="text" name="congnghedaotao" placeholder="..." required class="form-control">
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group">
					<label class="col-lg-4 control-label">Số lượng sinh viên có thể nhận :</label>
					<div class="col-lg-4">
						<input type="text" name="soluong" placeholder="..." required class="form-control">
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-lg-offset-2 form-group">
					<label class="col-lg-2 control-label">Yêu cầu về chuyên môn:</label>
					<div class="col-lg-6">
						<input type="text" name="yeucau" placeholder="..."  class="form-control">
					</div>
				</div>
			</div><br>


			<div class="row">
				<div class="col-lg-offset-2 form-group">
					<label class="col-lg-2 control-label">Yêu cầu về ngoại ngữ:</label>
					<div class="col-lg-6">
						<input type="text" name="yeucaungoaingu" placeholder="..."  class="form-control">
					</div>
				</div>
			</div><br>

			<!-- Them sau -->

		</div><hr style="border-color: red;">
		<div>
			<div class="row">
				<label style="font-size: 18px;"><span class="glyphicon glyphicon-star-empty"></span>  Đăng ký tài khoản :</label>
			</div><hr>
			<div class="row">
				<div class="form-group col-lg-offset-2">
					<label class="control-label col-lg-2">Email Đăng Nhập :</label>
					<div class="col-lg-5">
						<input type="email" name="emaildn" placeholder="..." class="form-control" required>
					</div>
				</div><br><br>
				<div class="form-group col-lg-offset-2">
					<label class="control-label col-lg-2">Password :</label>
					<div class="col-lg-5">
						<input type="password" name="password" class="form-control" required>
					</div>
				</div><br><br>

				<div class="form-group col-lg-offset-2">
					<label class="control-label col-lg-2">Re-Password :</label>
					<div class="col-lg-5">
						<input type="password" name="re-password" class="form-control" required>
					</div>
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
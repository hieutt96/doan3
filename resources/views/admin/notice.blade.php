@extends('layouts.admin')
@section("content_right")
	<script src="{{ asset('/js/ckeditor/ckeditor/ckeditor.js') }}"></script>
	<hr style="border-width: 2px;color: red;">
	@if($success = Session::get('success'))
      	<div class="alert alert-success alert-dismissable">
	        <a  class="close" data-dismiss="alert" aria-label="close">×</a>
	        <strong>Success!</strong> {{$success}}
        </div>
	@endif
	<form method="POST" action="{{route('thong-bao.post')}}" style="margin-bottom: 20px;">
		{{csrf_field()}}
		<div class="row">
			<div class="col-lg-2">
				<label class="col-lg-offset-1">Tiêu Đề  :</label>
			</div>
			<div class="col-lg-6">
				<textarea class="form-control" name="tieu_de" required></textarea>
			</div>
		</div><hr style="border-width: 0px;">
		<div class="row">
			<div class="col-lg-8">
				<div class="form-group">
					<label for="noidung">Nội dung :</label>
					<div  class="">
						<textarea rows="5" class="form-control" id="noidung" name="noi_dung" required
						></textarea>
						<script type="text/javascript">CKEDITOR.replace('noidung');</script>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<label for="nguoinhan">Người gửi :</label>
				<select name="ma_nguoi_nhan" class="form-control" id="nguoinhan" required>
					<option value="0">Mọi Người</option>
					<option value="1">Tất cả giảng viên</option>
					<option value="2">Tất cả sinh viên</option>
					<option value="3">Tât cả leader</option>
					<option value="4">Tât cả PM</option>
					<option value="{{$semester_current->ten_hoc_ki}}">Gửi thông báo phân công cho học kì {{$semester_current->ten_hoc_ki}}</option>
				</select>
			</div>
		</div><br>
		<div class="row">
			<button class="btn btn-info col-lg-offset-2 col-lg-8">Submit</button>
		</div>
	</form>
@endsection
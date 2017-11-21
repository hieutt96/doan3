@extends('layouts.admin')
@section("content_right")
	<script src="{{ asset('/js/ckeditor/ckeditor/ckeditor.js') }}"></script>
	<hr style="border-width: 2px;color: red;">
	<form method="POST" action="{{route('thong-bao.post')}}" style="margin-bottom: 20px;">
		<div class="row">
			<div class="col-lg-8">
				<div class="form-group">
					<label for="noidung">Nội dung :</label>
					<div  class="">
						<textarea rows="5" class="form-control" id="noidung" name="noidung" required
						></textarea>
						<script type="text/javascript">CKEDITOR.replace('noidung');</script>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<label for="nguoinhan">Người gửi :</label>
				<select name="manguoinhan" class="form-control" id="nguoinhan" required>
					<option value="0">Mọi Người</option>
					<option value="1">Tất cả giảng viên</option>
					<option value="2">Tất cả sinh viên</option>
					<option value="3">Tât cả công ty</option>
				</select>
			</div>
		</div><br>
		<div class="row">
			<button class="btn btn-info col-lg-offset-2 col-lg-8">Submit</button>
		</div>
	</form>
@endsection
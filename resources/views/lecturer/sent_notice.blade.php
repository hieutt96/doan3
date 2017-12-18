@extends('layouts.lecturer')
@section('content_right')
	<hr style="border-width: 0px;">
	<div class="row">
		@if($success = Session::get('success'))
			<div class="alert alert-success alert-dismissable">
	        	<a  class="close" data-dismiss="alert" aria-label="close">×</a>
	        	<strong>Success!</strong> {{$success}}
	        </div>
		@endif
	</div><hr style="border-width: 0px;">
	<form method="POST" action="/lecturer/gui-thong-bao" class="jumbotron">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-3">
						<label>Tiêu Đề :</label>
					</div>
					<div class="col-lg-9">
						<input type="text" name="tieu_de" class="form-control" required>
					</div>
				</div><hr style="border-width: 0px;">
				<div class="row">
					<div class="col-lg-3">
						<label>Nội Dung :</label>
					</div>
					<div class="col-lg-9">
						<textarea class="form-control" name="noi_dung" required rows="5"></textarea>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-5">
						 Người nhận:
					</div>
					<div class="col-lg-7">
						<select name="ma_nguoi_nhan" class="form-control">
							<option value="2">Sinh viên</option>
						</select>
					</div>
				</div>
			</div>
		</div><hr style="border-width: 0px;">
		<div class="row col-lg-offset-2 col-lg-8">
			<button class="form-control btn btn-success" >Submit</button>
		</div>
	</form>
@endsection
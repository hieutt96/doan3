@extends('layouts.lecturer')
@section('content_right')
		@if($loinhac = Session::get('loinhac'))
			<div class="alert alert-info alert-dismissable">
	        	<a  class="close" data-dismiss="alert" aria-label="close">×</a>
	        	<strong>Success!</strong> {{$loinhac}}
	        </div>
		@endif
	<hr style="border-width: 0px;">
	<form action="{{route('updateInfoPost')}}" method="POST">
		{{csrf_field()}}
		<div class="row">
			<div class="form-group">
				<div class="col-lg-offset-1 col-lg-2">
					<label>Tên :</label>
				</div>
				<div class="col-lg-6">
					<input type="" name="name" class="form-control" required minlength=5 maxlength=35>
				</div>
			</div>
		</div>
		<hr style="border-width: 0px;">
		<div class="row">
			<div class="form-group">
				<div class="col-lg-offset-1 col-lg-2">
					<label>Số Điện Thoại :</label>
				</div>
				<div class="col-lg-6">
					<input type="" name="phone" class="form-control" required minlength=8 maxlength=11>
				</div>
			</div>
		</div>
		<hr style="border-width: 0px;">
		<div class="row">
			<div class="form-group">
				<div class="col-lg-offset-1 col-lg-2">
					<label>Mô Tả :</label>
				</div>
				<div class="col-lg-6">
					<textarea name="about" class="form-control" rows="5" required></textarea>
				</div>
			</div>
		</div><hr style="border-width: 0px;">
		<div class="row">
			<div class="col-lg-offset-1 col-lg-4">
				<button type="" class="form-control btn btn-info">Submit</button>
			</div>
			<div class="col-lg-offset-1 col-lg-4">
				<button type="reset" class="form-control btn btn-info">Reset</button>
			</div>
		</div><hr style="border-width: 0px;">
	</form>
@endsection
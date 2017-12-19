@extends('layouts.admin')
@section('content_right')
	<div id="error">
		
	</div>
	<div class="row">
		<div class="col-lg-offset-9 col-lg-2">
			<select class="form-control">
				@foreach($semesters as $semester)
					<option value="{{$semester->ten_hoc_ki}}">{{$semester->ten_hoc_ki}}</option>
				@endforeach
			</select>
		</div>
	</div><hr style="border-width: 0px;">
	<div class="row">
		<div class="col-lg-offset-9 col-lg-1">
			<button class="btn btn-info" id="them">+Thêm</button>
		</div>
	</div><hr style="border-width: 0px;">
	<div class="row form">
		<div class="col-lg-offset-1 row formAdd" style="margin-bottom: 5px;">
			<div class="col-lg-4">
				<input type="text" name="name" required placeholder="Name.." class="form-control name">
			</div>
			<div class="col-lg-3">
				<input type="email" name="email" required placeholder="Email..." class="form-control email">
			</div>
			<div class="col-lg-3">
				<input type="password" name="password" required placeholder="Password..." class="form-control password">
			</div>
			<div class="col-lg-1">
				<p class="delete" style="cursor:pointer" >&times;</p>
			</div>
		</div>
	</div><hr style="border-width: 0px;">
	<div class="row">
		<div class="col-lg-offset-2 col-lg-8">
			<button class="form-control submit" id="submit">Submit</button>
		</div>
	</div>
	<script type="text/javascript" src="{{asset('/js/admin/addlecturer.js')}}"></script>
@endsection
@extends('layouts.admin')
@section('content_right')

	<div class="col-lg-offset-1">
		@foreach($notices as $notice)
			<div class="row">
				<div class=" col-lg-8">
					Tiêu Đề :<b> {{$notice->tieu_de}}</b>
				</div>
				<div class="col-lg-4">
					<button class="btn btn-default delete" value="{{$notice->id}}">Delete</button>
				</div>
				<hr>
			</div>
			
		@endforeach
	</div>
	<script type="text/javascript" src="{{asset('/js/admin/deletenotice.js')}}"></script>
@endsection
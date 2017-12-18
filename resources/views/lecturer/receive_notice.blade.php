@extends('layouts.lecturer')
@section('content_right')
	<hr style="border-width: 0px;">
	<div class="row col-lg-offset-1">
		@foreach($notices as $notice)
			<div class="row">
				 <div class="row">
				 	<b>Người Gửi :</b>{{$notice->user->name}}
				 </div>
				 <div class="row">
				 	<b>Tiêu Đề :</b> {{$notice->tieu_de}}
				 </div>
				 <div class="row">
				 	<b>Nội Dung</b> : {{$notice->noi_dung}}
				 </div>
			</div><hr style="border-width: 1px;">
		@endforeach
	</div>
@endsection
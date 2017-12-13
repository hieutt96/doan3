@extends('layouts.lecturer')
@section('content_right')

	<div class="row">
		<div class="col-lg-offset-10 col-lg-2">
			<select class="form-control">
				<option value="">--Select--</option>
				@foreach($hockys as $hocky)
					<option value="{{$hocky->id}}">{{$hocky->ten_hoc_ki}}</option>
				@endforeach
			</select>
		</div>
	</div><hr>
	<div class="row content">
		
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('/js/lecturer/manage_student.js')}}">
	</script>
@endsection
@extends('layouts.panel')
@section('content')
	<div class="row ">
<!-- 		<div class="modal hide fade" id="mymodal">
			<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Modal header</h3>
				</div>
				<div class="modal-body">
					<p>One fine body…</p>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn">Close</a>
					<a href="#" class="btn btn-primary">Save changes</a>
			  	</div>
			  	<script type="text/javascript">
				    $(window).on('load',function(){
				        $('#mymodal').modal('show');
				    });
				</script>
		</div> -->
		<div class=" col-lg-2">
			<div class="row"><a href="">Sinh Viên</a></div><hr>
			<div class="row"><a href="">Doanh Nghiệp</a></div><hr>
			<div class="row"><a href="">Đánh Giá Thực Tập</a></div><hr>
			<div class="row"><a href="">Thông báo</a></div><hr>
			<div class="row"><a href="">Gửi Thông Báo</a></div><hr>
		</div>
		<div class="col-lg-8 ">
			@yield('content_right')
		</div>
	</div>
@endsection
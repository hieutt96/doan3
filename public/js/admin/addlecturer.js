
$(document).on('click','#them',function(){
	$(".form").append(`
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
		`);
});
$(document).on('click',".delete",function(){
	$(this).parent().parent().remove();
});	

$(document).on('click',".submit",function(){
	var hocky = $("select").val();
	var data = [];
	var i = $(".formAdd").length;
	$(".formAdd").each(function(){
		var name = $(this).find(".name").val();
		var email = $(this).find(".email").val();
		var password = $(this).find(".password").val();
		data.push({
			'name':name,
			'email':email,
			'password':password,
		});
	});
	console.log(data);
	$.ajax({
		url:"/admin/them-tai-khoan-giang-vien",
		type:"GET",
		dataType:"json",
		data : {'data':data,'hocky':hocky},
		success:function(data){
			if($.isEmptyObject(data.error)){
				alert(data.success);
				$(".name").val('');
				$(".email").val('');
				$(".password").val('');
			}else{
				myfunction(data.error);
			}
		}
	});
	function myfunction(data){
		alert("Error");
		$("#error").empty();
		$.each(data,function(key,value){
			$("#error").append(`<li class="alert alert-danger alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error!</strong>`+ value+`
			</li>`);
		});
	}
});	
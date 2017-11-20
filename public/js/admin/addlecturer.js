
$(document).on('change','select',function(){
	var hocky = $("select").val();
	console.log(hocky);
	if(hocky){
		console.log(1);
		$(".hienthi1").empty();
		$(".hienthi2").empty();
		$("#tabs1").append(`<br><div class="col-lg-offset-11 col-lg-1">
			<button class="btn btn-info" id="them">+Thêm</button>
			<hr>
			</div>`);
	}
});

$(document).on('click','#them',function(){
	$("ol button").remove();
	$("#tabs1").append(`
			<ol style="margin:15px;" class="form">	
				<div class="row col-lg-12" style="margin-bottom:5px;">
					<div class="col-lg-6">
						<label class="col-lg-6 label-control" >Email Đăng Nhập:</label>
						<input type="email" class="col-lg-6 form-control email" name ="email" required></input>
					</div>
					<div class="col-lg-5">
						<label class="col-lg-3 label-control" >Password:</label>
						<input type="password" class="col-lg-3 form-control password" name ="password" required></input>
					</div>
					<div class="col-lg-1">
						<p class="" style="cursor:pointer" id="delete">&times;</p>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-info col-lg-offset-2 col-lg-7 submit">Submit</button>
				</div>
			</ol>
		`);
});

$(document).on('click',"#delete",function(){
	$(this).closest("form").remove();
});	

$(document).on('click',".submit",function(){
	var hocky = $("select").val();
	var data = [];
	var i = $(".form").length;
	console.log(i);
	$(".form").each(function(){
		var email = $(this).find(".email").val();
		var password = $(this).find(".password").val();
		data.push({
			'email':email,
			'password':password,
		});
	});
	console.log(data);
	$.ajax({
		url:"/admin/addlecturer",
		type:"GET",
		dataType:"json",
		data : {'data':data,'hocky':hocky},
		success:function(data){
			alert("Success");
			$("ol").remove();
		},
		error:function(){
			alert("Error");
		}
	});
});	
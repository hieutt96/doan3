
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
		$("#tabs2").append(
			`<table class="table table-striped">
				<tr>
					<th class="col-lg-1">STT</th>
					<th class="col-lg-2">Tên</th>
					<th class="col-lg-3">Email</th>
					<th class="col-lg-2">Phone</th>
					<th class="col-lg-4">Công ty phụ trách</th>
				</tr>
			 </table>
			 `);
		$.ajax({
			url:"/admin/danh-sach-giang-vien",
			type:"get",
			dataType:"json",
			data:{'hocky':hocky},
			success:function(data){
				console.log(data);
				if(data.length >0){
					for(var i=0;i<data.length;i++){
						$("#tabs2").append(`
						<table class="table table-striped">
							<tr>
								<td class="col-lg-1">`+i+`</td>
								<td class="col-lg-2">`+data[i]['name']+`</td>
								<td class="col-lg-3">`+data[i]['email']+`</td>
								<td class="col-lg-2">`+data[i]['phone']+`</td>
								<th class="col-lg-4">`+data[i]['tencongty']+`</th>
							</tr>
						</table>
							`);
					}
				}
			},
			error:function(){
				alert("Error");
			}
		});
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
						<p class="delete" style="cursor:pointer" >&times;</p>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-info col-lg-offset-2 col-lg-7 submit" id="submit1">Submit</button>
				</div>
			</ol>
		`);
});

$(document).on('click',".delete",function(){

	$(this).closest("ol").remove();
	// console.log(1);
	var search = $("#submit1");
	if(typeof(search)==undefined){
		console.log(1);
	}
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
			if($.isEmptyObject(data.error)){
				alert(data.success);
			}else{
				myfunction(data.error);
			}
		}
	});
	function myfunction(data){
		$("#error").empty();
		$.each(data,function(key,value){
			$("#error").append(`<li class="alert alert-danger alert-dismissable">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error!</strong>`+ value+`
			</li>`);
			// $("#error").append(`<li>`+value+`</li>`)
		});
	}
});	
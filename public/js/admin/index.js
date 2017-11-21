$('#loc').click(function(){
	var hocky = $('#hocky option:checked').val();
	console.log(hocky);
	if(hocky){
		$.ajax({
			url :"admin/filter/company/" + hocky,
			type:"get",
			dataType:"json",
			data: {'hocky':hocky},
			success:function(data){
				console.log(data[0]);
				 $(".hienthi1").empty();
				 $(".hienthi2").empty();
				if(data[0].length > 0){
					for(var i=0;i<data[0].length;i++){
						$("#tabs2").append(`<div class="row col-lg-12">
								<div class="col-lg-3"><img style="width:170px" src=`+data[0][i].picture+` /></div>
								<div class="col-lg-7 col-lg-offset-1">
									<div class=""><h5><b>Tên Công Ty :</b>`+data[0][i].name+`</h5></div>
									<div class=""><h5><b>Địa Chỉ :</b>`+data[0][i].diaChi+`</h5></div>
									<div class=""><h5><b>Số Điện Thoại :</b>`+data[0][i].phone+`</h5></div>
									<div class=""><h5><b>Lĩnh Vực Hoạt Động :</b>`+data[0][i].linhVucHoatDong+`</h5></div>
									<div class=""><h5><b>Mô Tả Ngắn Về Công Ty :</b>`+data[0][i].moTa+`</h5></div>
									<div class="col-lg-12"><button class="btn btn-info col-lg-3 col-lg-offset-1 info1">Xem Chi Tiết</button>
													 <button class="btn btn-default col-lg-3 col-lg-offset-1 accept1">Chấp Nhận</button>
													 <button class="btn btn-warning col-lg-3 col-lg-offset-1 delete1">Xóa</button>
													 <input type="hidden" value="`+data[0][i].id+`"></input>
									</div>
								</div>
							</div><br><br>`);
					}
				}
				if(data[1].length > 0){
					for(var i=0;i<data[1].length;i++){
						console.log(data[1].length);
						$("#tabs1").append(`<div class="row col-lg-12">
							<div class="col-lg-3"><img style="width:170px" src=`+data[1][i].picture+` /></div>
								<div class="col-lg-7 col-lg-offset-2">
									<div class=""><h5><b>Tên Công Ty :</b>`+data[1][i].name+`</h5></div>
									<div class=""><h5><b>Địa Chỉ :</b>`+data[1][i].diaChi+`</h5></div>
									<div class=""><h5><b>Số Điện Thoại</b> :`+data[1][i].phone+`</h5></div>
									<div class=""><h5><b>Lĩnh Vực Hoạt Động :</b>`+data[1][i].linhVucHoatDong+`</h5></div>
									<div class=""><h5><b>Mô Tả Ngắn Về Công Ty :</b>`+data[1][i].moTa+`</h5></div>
									<br><br><br><br><br><br>
									<div>
										<button class="btn btn-info col-lg-3 info2">Xem Chi Tiết</button>
										<button class="btn btn-warning col-lg-offset-1 col-lg-3 delete2">Xóa</button>
										<input type="hidden" value="`+data[1][i].id+`"></input>
									</div>
								</div>
							</div><br><br>`);
					}
				}
			}
		});
	}else{
		$(".hienthi1").empty();
		$(".hienthi2").empty();
	}
});
$(document).on('click', ".accept1", function() {
	var id = $(this).siblings("input").val();
	console.log(id);
	$(this).parent().parent().parent().fadeOut();
	$.ajax({
		url : "admin/accept/companyRequest/" + id,
		type :"get",
		dataType : "json",
		data : {'id':id},
		success:function(data){
			alert("success");
			$("#tabs1").append(`<div class="row col-lg-12">
				<div class="col-lg-3"><img style="width:170px" src=`+data.picture+` ></div>
				<div class="col-lg-7 col-lg-offset-2">
					<div class=""><h5><b>Tên Công Ty :</b>`+data.name+`</h5></div>
					<div class=""><h5><b>Địa Chỉ :</b>`+data.diaChi+`</h5></div>
					<div class=""><h5><b>Số Điện Thoại</b> :`+data.phone+`</h5></div>
					<div class=""><h5><b>Lĩnh Vực Hoạt Động :</b>`+data.linhVucHoatDong+`</h5></div>
					<div class=""><h5><b>Mô Tả Ngắn Về Công Ty :</b>`+data.moTa+`</h5></div>
					<br><br>
					<div>
						<button class="btn btn-info col-lg-3 info2">Xem Chi Tiết</button>
						<button class="btn btn-warning col-lg-offset-1 col-lg-3 delete2">Xóa</button>
						<input type="hidden" value="`+data.id+`"></input>
					</div>
				</div>
			</div><br><br><hr>`);
	}
	});
});	

$(document).on('click',".delete1",function(){
	var id = $(this).siblings("input").val();
	$(this).parent().parent().parent().fadeOut();
	$.ajax({
		url : "admin/delete/companyRequest/" + id,
		type :"get",
		dataType : "json",
		data : {'id':id},
		success:function(){
			alert("Đã Xóa Thành Công");
		},
		error:function(){
			console.log("Error");
		}
	});
});

$(document).on('click',".delete2",function(){
	var id =$(this).siblings("input").val();
	$.ajax({
		url : "admin/delete/company/" + id,
		type :"get",
		dataType : "json",
		data : {'id':id},
		success:function(){
			alert("Đã Xóa Thành Công");
		},
		error:function(){
			console.log("Error");
		}
	});
});

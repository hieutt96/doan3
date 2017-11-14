$('#loc').click(function(){
	var hocky = $('#hocky option:checked').val();
	console.log(hocky);
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
					console.log(data[0].length);
					$("#tabs2").append(`<div class="row col-lg-12">
							<div class="col-lg-3"><img style="width=50px;height=70px" src=`+data[0][i].picture+`></div>
							<div class="col-lg-7 col-lg-offset-2">
								<div class=""><h5><b>Tên Công Ty :</b>`+data[0][i].name+`</h5></div>
								<div class=""><h5><b>Địa Chỉ :</b>`+data[0][i].diaChi+`</h5></div>
								<div class=""><h5><b>Số Điện Thoại :</b>`+data[0][i].phone+`</h5></div>
								<div class=""><h5><b>Lĩnh Vực Hoạt Động :</b>`+data[0][i].linhVucHoatDong+`</h5></div>
								<div class=""><h5><b>Mô Tả Ngắn Về Công Ty :</b>`+data[0][i].moTa+`</h5></div>
								<br><br><br><br><br><br>
								<div class="row col-lg-12"><button class="btn btn-info col-lg-3 col-lg-offset-1 info">Xem Chi Tiết</button>
												 <button class="btn btn-default col-lg-3 col-lg-offset-1 accept">Chấp Nhận</button>
												 <button class="btn btn-warning col-lg-3 col-lg-offset-1 delete">Xóa</button>
												 <input type="hidden" value="`+data[0][i].id+`"></input>
								</div>
							</div>
						</div><br><br><hr>`);
				}
			}
			if(data[1].length > 0){
				for(var i=0;i<data[1].length;i++){
					console.log(data[1].length);
					$("#tabs1").append(`<div class="row col-lg-12">
							<div class="col-lg-3"><img style="width=50px;height=70px" src=`+data[1][i].picture+` ></div>
							<div class="col-lg-7 col-lg-offset-2">
								<div class=""><h5><b>Tên Công Ty :</b>`+data[1][i].name+`</h5></div>
								<div class=""><h5><b>Địa Chỉ :</b>`+data[1][i].diaChi+`</h5></div>
								<div class=""><h5><b>Số Điện Thoại</b> :`+data[1][i].phone+`</h5></div>
								<div class=""><h5><b>Lĩnh Vực Hoạt Động :</b>`+data[1][i].linhVucHoatDong+`</h5></div>
								<div class=""><h5><b>Mô Tả Ngắn Về Công Ty :</b>`+data[1][i].moTa+`</h5></div>
								<br><br><br><br><br><br>
								<div>
									<button class="btn btn-info col-lg-3">Xem Chi Tiết</button>
									<button class="btn btn-warning col-lg-offset-1 col-lg-3">Xóa</button>
								</div>
							</div>
						</div><br><br><hr>`);
				}
			}
		}
	});
});
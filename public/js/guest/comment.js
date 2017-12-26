$(document).on('click','#gui',function(){
	var user_id = $("#user_id").val();
	var company_id = $("#company_id").val();
	var comment = $("[name='comment']").val();
	console.log(comment);
	if(user_id){
		$.ajax({
			url:"/user/comment",
			type:"get",
			dataType:"json",
			data:{'user_id':user_id,'company_id':company_id,'comment':comment},
			success:function(data){
				$("[name='comment']").val('');
				$(".comments").append(`
						<div class="row">
	                        <div class="col-lg-1 col-lg-offset-1">
	                            <img src="`+data[0].picture+`" style="height: 70px;width:70px;">
	                        </div>
	                        <div class="col-lg-2">
	                            <h4>`+data[0].name+`</h4>
	                        </div>
	                        <div class="col-lg-6">
	                            `+data[1].noi_dung+`
	                        </div>
						</div>
						<div class="col-lg-offset-11 col-lg-1 edit">...</div>
						<input type="hidden" class="comment_id" value="`+data[1].id+`">
                        <hr style="border-width:0px;">
					`);
			},
			error:function(){

			}
		});
	}else{
		alert("Bạn Phải Đăng Nhập !");
	}
});

$(document).on('click','.edit',function(){
	$("#mymodal").modal();
	$(".modal_edit").empty();
	$(".modal_id").empty();
	var id = $(this).siblings("input").val();
	$.ajax({
		url:"/user/findcomment",
		dataType:"json",
		type:"get",
		data:{'id':id},
		success:function(data){
			var content = data.noi_dung;
			var id = data.id;
			$(".modal_edit").val(content);
			$(".modal_id").val(id);
		},
		error:function(){

		}
	});
});

$(document).on('click','#save',function(){
	var comment = $(".modal_edit").val();
	var id = $(".modal_id").val();
	if(comment){
		$.ajax({
			url:"user/editcomment",
			dataType:"json",
			type:"get",
			data:{'comment':comment,'id':id},
			success:function(data){
				var obj;
				$(".edit").each(function(){
					if($(this).siblings("input").val()==data.id){
						obj = $(this);
					}
				});	
				var ob = obj.siblings(".noi_dung");
				ob.html(data.noi_dung);
			},
			error:function(){

			}
		});
	}else{
		alert("Bạn Chưa Nhập Bình Luận !");
	}
});
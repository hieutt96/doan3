
$(document).on('click','.edit',function(){
	var result_id = $(this).val();
	// console.log(result_id);
	if(result_id){
		$('#myModal').modal('toggle');
		console.log(result_id);
		$.ajax({
			url:"/lecturer/get-result-student",
			type:"get",
			dataType:"json",
			data:{'result_id':result_id},
			success:function(data){
				$("#save").val(data.id);
				$("input[name='diem']").empty();
				$("textarea[name='nhan_xet_nha_truong']").empty();
				$("input[name='diem']").val(data.diem);
				$("textarea[name='nhan_xet_nha_truong']").val(data.nhan_xet_nha_truong);
			},
			error:function(){

			}
		});
	}
});

$(document).on('click','#save',function(){
	console.log($(this).val());
	var id = $(this).val();
	var diem = $("input[name='diem']").val();
	var nhan_xet_nha_truong = $("textarea[name='nhan_xet_nha_truong']").val();
	if(id){
		$.ajax({
			url:"/lecturer/update-result-student",
			type:"get",
			dataType:"json",
			data:{'id':id,'diem':diem,'nhan_xet_nha_truong':nhan_xet_nha_truong},
			success:function(data){
				$('#myModal').modal('hide');
				var obj;
				$(".edit").each(function(){
					if($(this).val()==data.id){
						obj = $(this);
					}
				});
				// console.log(obj.val());
				obj.parent().siblings(".diem").html(data.diem);
				obj.parent().siblings(".nhan_xet_nha_truong").html(data.nhan_xet_nha_truong);
			},
			error:function(){

			}
		});
	}
});
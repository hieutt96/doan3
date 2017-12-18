$(document).on('change','select',function(){
	var hocky_id = $(this).val();
	console.log(hocky_id);
	if(hocky){
		$.ajax({
			url:"/lecturer/quan-li-sinh-vien",
			dataType:"json",
			type:"get",
			data:{'hocky_id':hocky_id},
			success:function(data){
				$("tbody").empty();
				if(data.length > 0 ){
					for(var i=0;i<data.length;i++){
						$('tbody').append(`
								<tr>
									<td>`+data[i].mssv+`</td>
									<td>`+data[i].ten+`</td>
									<td>`+data[i].lop+`</td>
									<td>`+data[i].grade+`</td>
									<td>`+data[i].congty+`</td>
									<td>`+data[i].diem+`</td>
									<td>`+data[i].nhan_xet_nha_truong+`</td>
									<td>`+data[i].nhan_xet_cong_ty+`</td>
									<td>`+data[i].danh_gia_cua_cong_ty+`</td>
									<td><button class="edit" value="`+data[i].result_id+`">Edit</button></td>
								</tr>
							`);
					}
				}
			},
			error:function(){

			}
		});
		
	}
});
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
	// console.log(diem);
	// console.log(nhan_xet_nha_truong);
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
				console.log(obj.val());
				obj.parent().siblings(".diem").html(data.diem);
				obj.parent().siblings(".nhan_xet_nha_truong").html(data.nhan_xet_nha_truong);
			},
			error:function(){

			}
		});
	}
});
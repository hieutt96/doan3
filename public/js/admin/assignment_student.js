$(document).on('click','#dexuat',function(){
	var array_student= [];
	$(".idsinhvien:checked").each(function(){
		array_student.push($(this).val());
	});
	var congty = $('.select2').val();
	var hocky = $("#semester_id").val();
	if(array_student!=0 && congty!=0){
		$.ajax({
			url:"/admin/assignment_student",
			type:"get",
			dataType:"json",
			data:{'array_student':array_student,'congty':congty,'hocky':hocky},
			success:function(data){
				if(data.error===undefined){
					$(".idsinhvien:checked").each(function(){
						$(this).closest('tr').remove();
					});					
				}else{
					alert("Số Sinh Viên Tối Đa Công Ty Có Thể Nhận Thêm Là:"+data.error);					
				}
			},
			error:function(data){
				alert("Error");
			}
		});
	}else{
		alert("Bạn Chưa Chọn Công Ty Hoặc Sinh Viên !");
	}
});
$(document).on('click','#dexuat',function(){
	var array_student= [];
	$(".idsinhvien:checked").each(function(){
		array_student.push($(this).val());
	});
	// console.log(array_student);
	var congty = $('.select2').val();
	var hocky = $("input[name='hocky']").val();
	// console.log(congty);
	// console.log(array_student);
	if(array_student!=0 && congty!=0){
		// console.log("OK");
		$.ajax({
			url:"/admin/assignment_student",
			type:"get",
			dataType:"json",
			data:{'array_student':array_student,'congty':congty,'hocky':hocky},
			success:function(data){
				if(!data.error){
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
	}
});
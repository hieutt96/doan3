$(document).on('click','#submit',function(){
	var idGiangVien = $("#giangvien").val();
	var array_company = [];
	$(".idCongTy:checked").each(function(){
		array_company.push($(this).val());
	});
	console.log(array_company);
	if(array_company!=0 && idGiangVien!=0){
		$.ajax({
			url:"/admin/assignment_lecturer",
			type:"get",
			dateType:"json",
			data:{'idGiangVien':idGiangVien,'array_company':array_company},
			success:function(data){
				$(".idCongTy:checked").each(function(){
					$(this).closest("tr").remove();
				});
			},
			error:function(){
				alert("Error");
			}
		});
	}else{
		alert("Bạn Chưa Chọn Công Ty Hoặc Giảng Viên !")
	}
});
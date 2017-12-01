$(document).on('click','#dexuat',function(){
	
	var array_student= [];
	$(".idsinhvien:checked").each(function(){
		array_student.push($(this).val());
	});
	// console.log(array_student);
	var congty = $('.select2').val();
	console.log(congty);
	console.log(array_student);
	if(array_student!=0 && congty!=0){
		// console.log("OK");
		$.ajax({
			url:"/admin/assignment_student",
			type:"get",
			dataType:"json",
			data:{'array_student':array_student,'congty':congty},
			success:function(){
				$(".idsinhvien:checked").each(function(){
					$(this).closest('tr').fadeOut();
				});
			},
			error:function(data){
				alert("Error");
			}
		});
	}
});
$(document).on('click',".delete",function(){
	var id = $(this).siblings("input").val();	
	$.ajax({
		url : "/admin/delete/company/" + id,
		type :"get",
		dataType : "json",
		data : {'id':id},
		success:function(){
			$(this).parent().parent().fadeOut();
		},
		error:function(){
			alert("Error");
		}
	});
});

$(document).on('click',".deleteCompanyRequest",function(){
	var id = $(this).siblings("input").val();
	
	$.ajax({
		url : "/admin/delete/CompanyRequest/" + id,
		type :"get",
		dataType : "json",
		data : {'id':id},
		success:function(){
			$(this).parent().parent().fadeOut();
		},
		error:function(){
			alert("Error");
		}
	});
});

$(document).on('click',".accept",function(){
	var id = $(this).siblings("input").val();
	$(this).parent().parent().fadeOut();
	$.ajax({
		url : "/admin/accept/companyRequest/"+id,
		type :"get",
		dataType : "json",
		data : {'id':id},
		success:function(){		
			// $(this).parent().parent().fadeOut();	
		},
		error:function(){
			alert("Error");
		}
	});
});








$('.accept').click(function(){
	$(this).closest("tr").fadeOut();
	var	id = $(this).next().val();
	$.ajax({
		url :"admin/accept/" + id,
		type:"get",
		dataType: "json",
		data :{'id':id},
		success :function (data){
			alert(data);	
						
		}
	});
});
$('.cancel').click(function(){
	$(this).closest("tr").fadeOut();
	var id = $(this).siblings("input").val();
	console.log(id);
	$.ajax({
		url :"admin/cancel/" + id,
		type:"get",
		dataType :"json",
		data :{'id':id},
		success:function(){

		}
	});
});
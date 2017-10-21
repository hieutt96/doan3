$('#accept').click(function(){
	var data = {
		id: $(this).next().val(),
	}
	console.log(data.id);
	// console.log(data);
	$.ajax({
		url :"/admin/accept/" + data.id,
		type:"get",
		dataType: "json",
		data :data,
		success :function (data){
			console.log(data.id);
			$("#accept").parents("tr").first().fadeOut();	
		},
		error :function (){
			alert("Error");
		}
	});
});
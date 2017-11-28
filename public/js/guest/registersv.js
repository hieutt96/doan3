

$(document).on('change','#hocky',function(){
	$("#dangkycongty").empty();
	$("#cty2").empty();
	var hocky = $(this).val();
	if(hocky !=0){
		$.ajax({
			url:"guest/register/congty/hocky",
			dataType:"json",
			type:"get",
			data:{'hocky':hocky},
			success:function(data){
				if(data.length > 0){
					for(var i=0;i < data.length;i++){
						$("#dangkycongty").append(`<option value="`+data[i].id+`">`+ data[i].name+`</option>`);
						$("#cty2").append(`<option value="`+data[i].id+`">`+ data[i].name+`</option>`)
					}
				}
			},
			error:function(){
				alert("Error");
			}
		});
	}
});

$(document).on('change','#cty2',function(){
	var company = $(this).val();
	$("[name='nv']").empty();
	console.log(company);
	if(company){
		$.ajax({
			url:"guest/find/leader",
			dataType:"json",
			type:"get",
			data:{'company':company},
			success:function(data){
				if(data.length >0 ){
					for(var i=0;i<data.length;i++){
						$("[name='nv']").append(`<option value="`+data[i].id+`">`+data[i].name+`</option>`);
						$("[name='mailnv']").append(`<option value="`+data[i].email+`">`+data[i].email+`</option>`);
					}
				}
			},
			error:function(){

			}
		});
	}
});
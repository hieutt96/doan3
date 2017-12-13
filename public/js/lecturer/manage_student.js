$(document).on('change','select',function(){
	var hocky = $(this).val();
	// console.log(hocky);
	if(hocky){
		url:"lecturer/quan-li-sinh-vien",
		dataType:"json",
		type:"get",
		data:{'hocky':hocky},
		
	}
});
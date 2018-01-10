$(document).on('click','.delete',function(){
	$(this).parent().parent().fadeOut();
	var notice_id = $(this).val();
	if(notice_id){
		$.ajax({
			url:"/admin/delete-notice",
			type:"get",
			dataType:'json',
			data:{'notice_id':notice_id},
			success:function(){
				
			},
			error:function(){

			}
		});
	}
});
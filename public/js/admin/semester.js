$(document).on('click','.edit',function(){

	var name2= $(this).parent().siblings(".1").html();

	var thoi_gian_dn_bat_dau_dk2 = $(this).parent().siblings(".2").html();

	var thoi_gian_dn_ket_thuc_dk2 = $(this).parent().siblings(".3").html();

	var thoi_gian_sv_bat_dau_dk2 = $(this).parent().siblings(".4").html();

	var thoi_gian_sv_ket_thuc_dk2 = $(this).parent().siblings(".5").html();

	$('.name1').val(name2);
	$('.thoi_gian_dn_bat_dau_dk1').val(thoi_gian_dn_bat_dau_dk2);
	$('.thoi_gian_dn_ket_thuc_dk1').val(thoi_gian_dn_ket_thuc_dk2);
	$('.thoi_gian_sv_bat_dau_dk1').val(thoi_gian_sv_bat_dau_dk2);
	$('.thoi_gian_sv_ket_thuc_dk1').val(thoi_gian_sv_ket_thuc_dk2);
});

$(document).on('click','.submit',function(){
	
		var name1=$(".name1").val();
		var thoi_gian_dn_bat_dau_dk1=$('.thoi_gian_dn_bat_dau_dk1').val();
		var thoi_gian_dn_ket_thuc_dk1=$('.thoi_gian_dn_bat_dau_dk1').val();
		var thoi_gian_sv_bat_dau_dk1=$('.thoi_gian_dn_bat_dau_dk1').val();
		var thoi_gian_sv_ket_thuc_dk1=$('.thoi_gian_dn_bat_dau_dk1').val();
	console.log(name1);
	console.log(thoi_gian_dn_bat_dau_dk1);
	console.log(thoi_gian_dn_ket_thuc_dk1);
	console.log(thoi_gian_sv_bat_dau_dk1);
	console.log(thoi_gian_sv_ket_thuc_dk1)
	$.ajax({
		url:'/admin/chinh-sua-hoc-ky',
		type:"get",
		dataType:"json",
		data:{
			'name1' : name1,
			'thoi_gian_dn_bat_dau_dk1' :thoi_gian_dn_bat_dau_dk1,
			'thoi_gian_dn_ket_thuc_dk1':thoi_gian_dn_ket_thuc_dk1,
			'thoi_gian_sv_bat_dau_dk1' :thoi_gian_sv_bat_dau_dk1,
			'thoi_gian_sv_ket_thuc_dk1' :thoi_gian_sv_ket_thuc_dk1
		},
		success:function(data){
			console.log(data);
		},
		error:function(){

		}
	});
});
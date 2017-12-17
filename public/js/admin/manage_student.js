$(document).on('change','.hocky',function(){
	var hocky_id = $(this).val();
	console.log(hocky_id);
	if(hocky_id){
		$.ajax({
			url:"/admin/find-student-semester",
			dataType:"json",
			type:"get",
			data:{'hocky_id':hocky_id},
			success:function(data){
				$(".hienthi1").empty();
				$(".hienthi2").empty();
				// $(".hienthi3").empty();
				console.log(data);
				$("#tabs1").append(`
							<table class="table table-striped">
								<tr>
									<td class="col-lg-2">MSSV</td>
									<td class="col-lg-3">Tên SV</td>
									<td class="col-lg-1">Lớp</td>
									<td class="col-lg-1">Khóa </td>
									<td class="col-lg-4">Công ty</td>
									<td class="col-lg-1">Kết quả</td>
								</tr>
							</table>
						`);
				$("#tabs2").append(`
						
							<table class="table table-striped">
								<tr>
									<td class="col-lg-2">MSSV</td>
									<td class="col-lg-3">Tên</td>
									<td class="col-lg-1">Lớp</td>
									<td class="col-lg-1">Khóa </td>
									<td class="col-lg-5">Công ty thực mong muốn thực tập</td>
								</tr>
							</table>
						`);
				// $("#tabs3").append(`
				// 		<div class="row">
				// 			<table class="table table-striped">
				// 				<tr>
				// 					<td class="col-lg-2">Mã số sinh viên</td>
				// 					<td class="col-lg-3">Tên sinh viên</td>
				// 					<td class="col-lg-2">Lớp</td>
				// 					<td class="col-lg-1" >Khóa </td>
				// 					<td class="col-lg-4">Công ty thực thực tập</td>
				// 				</tr>
				// 			</table>
				// 		</div>
				// 		`);
				if(data[0].length > 0){
					for(var i=0;i<data[0].length;i++){
						$("#tabs1").append(`<table class="table table-striped">
								<tr>
									<td class="col-lg-2">`+data[0][i].MSSV+`</td>
									<td class="col-lg-3">`+data[0][i].ten+`</td>
									<td class="col-lg-1">`+data[0][i].lop+`</td>
									<td class="col-lg-1">`+data[0][i].grade+`</td>
									<td class="col-lg-4">`+data[0][i].name+`</td>
									<td class="col-lg-1">`+data[0][i].diem+`</td>
								</tr>
							</table>
						`);
					}
				}
				if(data[1].length > 0){
					for(var i=0;i<data[1].length;i++){
						$("#tabs2").append(`<table class="table table-striped">
							<tr>
								<td class="col-lg-2">`+data[1][i].mssv+`</td>
								<td class="col-lg-3">`+data[1][i].ten+`</td>
								<td class="col-lg-1">`+data[1][i].lop+`</td>
								<td class="col-lg-1">`+data[1][i].grade+`</td>
								<td class="col-lg-5">`+data[1][i].tencongty+`</td>
							</tr>
						</table>
					`);
					}
				}
				// if(data[2].length > 0){
				// 	for(var i=0;i<data[2].length;i++){
				// 		$("#tabs3").append(`<table class="table table-striped"> 
				// 			<tr>
				// 				<td class="col-lg-2">`+data[2][i].MSSV+`</td>
				// 				<td class="col-lg-3">`+data[2][i].ten+`</td>
				// 				<td class="col-lg-2">`+data[2][i].lop+`</td>
				// 				<td class="col-lg-1">`+data[2][i].grade+`</td>
				// 				<td class="col-lg-4">`+data[2][i].name+`</td>
				// 			</tr>
				// 		</table>`);
				// 	}
				// }
			},
			error:function(){

			}
		});
	}else{
		$(".hienthi1").empty();
		$(".hienthi2").empty();		
	}
});
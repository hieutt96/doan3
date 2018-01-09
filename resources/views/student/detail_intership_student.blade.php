@extends('layouts.welcome')
@section('welcome')
	<div class="row" style="margin-bottom: 30px;">
		<div class="col-lg-6">
			<table style="border-width: 0px;">
				<tr>
					<td>Sinh Viên:</td>
					<td><b>{{$student->user->name}}</b></td>
				</tr>
				<tr>
					<td>MSSV:</td>
					<td><b>{{$student->mssv}}</b></td>
				</tr>
				<tr>
					<td>Lớp : </td>
					<td><b>{{$student->lop}}</b></td>
				</tr>
				<tr>
					<td>Khóa :</td>
					<td><b>{{$student->grade}}</b></td>
				</tr>
				<tr>
					<td>Công Ty Thực Tập :</td>
					<td><b>{{$intership->company->name}}</b></td>
				</tr>
				<tr>
					<td>Giảng Viên Phụ Trách :</td>
					@if($intership->lecturer)
					<td><b>{{$intership->lecturer->user->name}}</b></td>
					@else
					<td>(Chưa có thông tin)</td>
					@endif
				</tr>
				<tr>
					<td>Leader Hướng Dẫn :</td>
					@if($intership->leader)
					<td><b>{{$intership->leader->user->name}}</b></td>
					@else
					<td>(Chưa có thông tin)</td>
					@endif
				</tr>
				<tr>
					<td>Thực Tập Ở Học Kỳ :</td>
					<td><b>{{$intership->semester->ten_hoc_ki}}</b></td>
				</tr>
			</table>
		</div>
		<div class="col-lg-6">
			<div class="row">
				<div class="row">
					<p><span class="glyphicon glyphicon-star"></span>Đánh Giá Phía Công Ty :</p>
				</div>
				<table style="border-width: 0px;">
					<tr>
						<td>Nhận Xét Của Công Ty :</td>
						@if($result->nhan_xet_cong_ty)
						<td>-</td>
						@else
						<td>{{$result->nhan_xet_cong_ty}}</td>
						@endif
					</tr>
					<tr>
						<td>Năng lực IT:</td>
						@if($result->nang_luc_it)
						<td>{{$result->nang_luc_it}}/5</td>
						@else
						<td>-</td>
						@endif
					</tr>
					<tr>
						<td>Phương Pháp Làm Việc :</td>
						@if($result->phuong_phap_lam_viec)
						<td>{{$result->phuong_phap_lam_viec}}/5</td>
						@else
						<td>-</td>
						@endif
					</tr>
					<tr>
						<td>Năng Lực Quản Lí :</td>
						@if($result->nang_luc_quan_li)
						<td>{{$result->nang_luc_quan_li}}/5</td>
						@else
						<td>-</td>
						@endif
					</tr>
					<tr>
						<td>Năng Lực Nắm Bắt Công Việc :</td>
						@if($result->nang_luc_nam_bat_cv)
						<td>{{$result->nang_luc_nam_bat_cv}}/5</td>
						@else
						<td>-</td>
						@endif
					</tr>
					<tr>
						<td>Tiếng Anh :</td>
						@if($result->tieng_anh)
						<td>{{$result->tieng_anh}}/5</td>
						@else
						<td>-</td>
						@endif
					</tr>
					<tr>
						<td>Năng Lực Làm Việc Nhóm :</td>
						@if($result->nang_luc_lam_viec_nhom)
						<td>{{$result->nang_luc_lam_viec_nhom}}/5</td>
						@else
						<td>-</td>
						@endif
					</tr>
					<tr>
						<td>Đánh Giá Của Công Ty:</td>
						@if($result->danh_gia_cua_cong_ty)
						<td>{{$result->danh_gia_cua_cong_ty}}</td>
						@else
						<td>--</td>
						@endif
					</tr>
				</table>
			</div><hr>
			<div class="row">
				<div class="row">
					<p><span class="glyphicon glyphicon-star"></span>Đánh giá phía nhà trường :</p>
				</div>
				<div class="row">
					<table style="border-width: 0px;">
						<tr>
							<td>Nhận xét phía nhà trường :</td>
							@if($result->nhan_xet_nha_truong)
							<td>{{$result->nhan_xet_nha_truong}}</td>
							@else
							<td>-</td>
							@endif
						</tr>
						<tr>
							<td>Điểm:</td>
							@if($result->diem)
							<td>{{$result->diem}}</td>
							@else
							<td>-</td>
							@endif
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
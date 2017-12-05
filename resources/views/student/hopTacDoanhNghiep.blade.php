@extends('layouts.welcome') 
@section('welcome')
<style>
	h1 {
		text-align: center;
		text-transform: uppercase;
		color: #333333;
		line-height: 40px;
		font-size: 30px;
		margin: 0 0;
		margin-bottom: 2px;
	}

	hr {
		width: 0px;
		padding-left:100px;
		height: 1px;
		border-top: 1px solid #333333;
		margin-left:485px;
	}

	.row-dn {
		border: solid 1px #ffffff;
		background-color: #fff;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
		-moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
		-webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
		-o-box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
		margin: 0 70px 50px 70px;
	}
    .sow-image-grid-image {
        float:left;
        margin: 10px 49px;
    }
	a {
		cursor:pointer;
	}
	label.control-label {
    font-size: 15px;
    padding-top: 10px;
    padding-left: 111px;
}
</style>
<div class="panel-layout">
	<div class="row ">
		<div class="col-sm-8">
		<h1 style="padding-left:316px;">Đồng hành cùng chúng tôi</h1>
		</div>
		<div class="col-sm-4 ">
			<div class="row ">
			<div class="col-sm-6">
			<label class="control-label">Học Kỳ: </label>
			</div>
			<div class="col-sm-6">
			<select style="width:97px;"name="laptop" class="form-control" id="hocky">
			@foreach($hocky->sortBy('hocky') as $hky)
				<option value="{{$hky->hocky}}">{{$hky->hocky}}</option>
			@endforeach
			</select>
			</div>
			</div>
		</div>
	</div>
	<hr/>
	<div class="row row-dn">
		<div class="col">
			<div id="pgc-8053-1-0" class="panel-grid-cell">
				<div id="panel-8053-1-0-0" class="so-panel widget widget_sow-image-grid panel-first-child panel-last-child" data-index="1">
					<div class="so-widget-sow-image-grid so-widget-sow-image-grid-default-c361d6f3913e">
						<div class="sow-image-grid-wrapper " id="doanhnghiep_hocky">
							@foreach($doanhnghiep as $dn)
							<div class="sow-image-grid-image">
								<a href= "hop-tac-doanh-nghiep/{!!$dn->id!!}/{!!$dn->name!!}" target="_blank" ><img width="150" height="150" src="upload/imgCompany/{!!$dn->picture!!}" class="attachment-thumbnail size-thumbnail"
								 alt=""  srcset="upload/imgCompany/{!!$dn->picture!!} 150w, upload/imgCompany/{!!$dn->picture!!} 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$("#hocky").change(function(){
			var hocky = $(this).val();
			$.get("ajax/hop-tac-doanh-nghiep/"+hocky,function(data){
				$("#doanhnghiep_hocky").html(data);
			});
		});
	});
</script>
@endsection

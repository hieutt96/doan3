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
		width: 70px;
		text-align: center;
		height: 1px;
		border-top: 1px solid #333333;
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
</style>
<div class="panel-layout">
	<div class="row ">
		<h1>Đồng hành cùng chúng tôi</h1>
		<hr/>
		<span class="line"></span>
	</div>
	<div class="row row-dn">
		<div class="col">
			<div id="pgc-8053-1-0" class="panel-grid-cell">
				<div id="panel-8053-1-0-0" class="so-panel widget widget_sow-image-grid panel-first-child panel-last-child" data-index="1">
					<div class="so-widget-sow-image-grid so-widget-sow-image-grid-default-c361d6f3913e">
						<div class="sow-image-grid-wrapper">
							<div class="sow-image-grid-image">
								<a href= "hop-tac-doanh-nghiep/{!!$doanhnghiep[0]->id!!}/{!!$doanhnghiep[0]->name!!}" target="_blank" ><img width="150" height="150" src="upload/imgCompany/{!!$doanhnghiep[0]->picture!!}" class="attachment-thumbnail size-thumbnail"
								 alt="" title="Samsung" srcset="upload/imgCompany/{!!$doanhnghiep[0]->picture!!} 150w, upload/imgCompany/{!!$doanhnghiep[0]->picture!!} 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/2-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="Microsoft" srcset="https://soict.hust.edu.vn/wp-content/uploads/2-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/2.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/3-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="Toshiba" srcset="https://soict.hust.edu.vn/wp-content/uploads/3-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/3.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/4-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="FPT Software" srcset="https://soict.hust.edu.vn/wp-content/uploads/4-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/4.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/4b-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="Viettel" srcset="https://soict.hust.edu.vn/wp-content/uploads/4b-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/4b.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/6-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="MISA" srcset="https://soict.hust.edu.vn/wp-content/uploads/6-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/6.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/4c-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="VNPT" srcset="https://soict.hust.edu.vn/wp-content/uploads/4c-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/4c.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/5-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="Framgia" srcset="https://soict.hust.edu.vn/wp-content/uploads/5-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/5.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/7-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="BIDV" srcset="https://soict.hust.edu.vn/wp-content/uploads/7-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/7.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/VCCorp_new-150x150.jpg" class="attachment-thumbnail size-thumbnail"
								 alt="" title="VCCorp" srcset="https://soict.hust.edu.vn/wp-content/uploads/VCCorp_new-150x150.jpg 150w, https://soict.hust.edu.vn/wp-content/uploads/VCCorp_new.jpg 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/7d-1-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="CMC" srcset="https://soict.hust.edu.vn/wp-content/uploads/7d-1-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/7d-1.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/8-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="BKAV" srcset="https://soict.hust.edu.vn/wp-content/uploads/8-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/8.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/9-1-150x150.jpg" class="attachment-thumbnail size-thumbnail"
								 alt="" title="FIS" srcset="https://soict.hust.edu.vn/wp-content/uploads/9-1-150x150.jpg 150w, https://soict.hust.edu.vn/wp-content/uploads/9-1.jpg 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/10-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="Gameloft" srcset="https://soict.hust.edu.vn/wp-content/uploads/10-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/10.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/11-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="VNG" srcset="https://soict.hust.edu.vn/wp-content/uploads/11-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/11.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							<div class="sow-image-grid-image">
								<a><img width="150" height="150" src="https://soict.hust.edu.vn/wp-content/uploads/logoALT_new-150x150.png" class="attachment-thumbnail size-thumbnail"
								 alt="" title="AltPlus" srcset="https://soict.hust.edu.vn/wp-content/uploads/logoALT_new-150x150.png 150w, https://soict.hust.edu.vn/wp-content/uploads/logoALT_new.png 250w"
								 sizes="(max-width: 150px) 100vw, 150px" style="display: block;"></a> </div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
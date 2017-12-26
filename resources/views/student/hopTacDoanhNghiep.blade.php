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
	<div class="row">
		<form action="hop-tac-doanh-nghiep" method="GET" id="myform">
	  		<div class=" col-lg-offset-6 col-lg-6">	    
	  			{{csrf_field()}}
				<div class="col-lg-6">
		    		<input type="text" class="form-control" name="search" placeholder="Tìm kiếm tên công ty"
					@if($search) value="{{$search}}"  @endif
		    		>
				</div>
		    	<div class="col-lg-6">
		    		<button class=" btn btn-default" ><span class="glyphicon glyphicon-search"></span></button>
		    	</div>
  			</div>	
  		</form>
	</div>
	<hr>
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
				<select name="semester" class="form-control" id="hocky" form="myform" onchange="this.form.submit()">
					@foreach($semesters as $semesters)
						<option value="{{$semesters->id}}"
						@if($semester->id == $semesters->id) selected @endif
						>{{$semesters->ten_hoc_ki}}</option>
					@endforeach
				</select>
				</div>
			</div>
		</div>
	</div>
	<hr/>
	<div class="row row-dn">
			@foreach($companys as $company)
			<div class="thumbnail col-lg-4">
		        <a href="hop-tac-doanh-nghiep/{{$company->id}}" target="_blank">
		          <img src="{{asset($company->picture)}}" alt="{{$company->name}}" style="width:200px;height: 200px;">
		          <div class="caption">
		          	<h3 style="text-align: center;font-style: oblique;">{{$company->name}}</h3>
		            <p style="text-align: center;"><?php echo strip_tags($company->moTa); ?></p>
		          </div>
		        </a>
		    </div>
			@endforeach
	</div>
	<div class="col-lg-offset-8 col-lg-4">
		{{$companys->links()}}
	</div>
</div>
@endsection

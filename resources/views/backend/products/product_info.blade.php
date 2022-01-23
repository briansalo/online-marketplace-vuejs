@extends('template')
@section('content')



<div class="container">

	<div class="row">
		<div class="col-md-6">
			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
			  <div class="carousel-indicators">
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			  </div>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="{{Storage::url($advertisement->feature_image)}}" class="img-thumbnail" style="width:100%; height: 350px">
			    </div>
			    <div class="carousel-item">
			      <img src="{{Storage::url($advertisement->first_image)}}" class="img-thumbnail" style="width:100%; height: 350px">
			    </div>
			    <div class="carousel-item">
			      <img src="{{Storage::url($advertisement->second_image)}}" class="img-thumbnail" style="width:100%; height: 350px">
			    </div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
			</div>
			
			<div class="card mt-2">
				<div class="card-body">
					<p>{{$advertisement->description}}</p>
				</div>
			</div>
			<hr>
			<div class="card">
				<div class="card-header">
					More Info
				</div>
				<div class="card-body">
					<p>Province: {{$advertisement->province->name}}</p>
					<p>City: {{$advertisement->city->name??''}}</p>
					<p>Barangay: {{$advertisement->barangay->name??''}}</p>
					<hr>
					@if($advertisement->link != null)
						{!! $advertisement->videolink() !!}
					@endif
				</div>
			</div>
		</div><!--col-md-6-->


		<div class="col-md-6">
			@if(Auth()->check() && auth()->user()->isadmin == 1??'')
				<b>{{$advertisement->category->name}} -> {{$advertisement->subcategory->name}} -> {{$advertisement->childcategory->name??''}}</b>
			@endif
			<h1>{{ucwords($advertisement->name)}}</h1>
			<p>Price: ₱{{number_format($advertisement->price,)}} ({{$advertisement->price_status}} price)</p>
			<p>Posted: {{$advertisement->created_at->diffforHumans()}}</p>
			@if(Auth()->check()&& $advertisement->user_id!=auth()->user()->id && !$advertisement->didUserSavedAd())
				<save_ad
					:user-id="{{(auth()->user()->id)??''}}"
					:ads-id="{{($advertisement->id)??''}}"
				></save_ad>
			@elseif(!Auth()->check())
			  	<button id="save_ad" class="btn btn-success" >
						<i class="fas fa-heart"></i> Save this Ad
    			</button>
			@endif
			<hr>
			<img src="{{Storage::url($advertisement->user->avatar)}}" class="img-thumbnail"width="120">
			<h5><a href="{{route('user.profile',$advertisement->user_id)}}">{{ucwords($advertisement->user->name)}}</a></h5>
				<span>
					@if(Auth()->check()&& $advertisement->user_id!=auth()->user()->id)
						<message
						seller-name="{{$advertisement->user->name}}"
						:user-id="{{auth()->user()->id}}"
						:receiver-id="{{$advertisement->user_id}}"
						:advertisement-id="{{$advertisement->id}}"
						/>
					@elseif(!Auth()->check())
				  	<button type="button" id="message" class="btn btn-primary btn-sm ">
							<i class="far fa-envelope"></i> Send Message
	    			</button>
					@endif
				</span>	
		</div><!--col-md-6-->

</div><!--row-->

<script>

  $(document).on('click','#save_ad',function(){
  	alert("You need to login first!!!");
	 });


  $(document).on('click','#message',function(){
  	alert("You need to login first!!!");

	 });


</script>
@endsection
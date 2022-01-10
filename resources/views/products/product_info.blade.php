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
			      <img src="{{Storage::url($advertisement->feature_image)}}" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="{{Storage::url($advertisement->first_image)}}" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="{{Storage::url($advertisement->second_image)}}" class="d-block w-100" alt="...">
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
					{!! $advertisement->videolink() !!}
				</div>
			</div>
		</div><!--col-md-6-->


		<div class="col-md-6">
			<h1>{{$advertisement->name}}</h1>
			<p>Price: {{$advertisement->price}}, {{$advertisement->price_status}}</p>
			<p>Posted: {{$advertisement->created_at->diffforHumans()}}</p>
			<hr>
			<img src="/user_image/image1.jpg" width="120">
			<p>{{$advertisement->user->name}}
				<span>
					@if(Auth()->check()&& $advertisement->user_id!=auth()->user()->id)
					
					<message
					seller-name="{{$advertisement->user->name}}"
					:user-id="{{auth()->user()->id}}"
					:receiver-id="{{$advertisement->user_id}}"
					:advertisement-id="{{$advertisement->id}}"
					/>
					@endif
				</span>	
			</p>

		</div>
@endsection
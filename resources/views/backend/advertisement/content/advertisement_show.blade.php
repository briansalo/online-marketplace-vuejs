@extends('backend.advertisement.advertisement_index')
@section('advertisement_content')


	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Image</th>
	      <th scope="col">Name</th>
	      <th scope="col">Price</th>
	      <th scope="col">Status</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($alldata as $key => $data)
	    <tr>
	      <th scope="row">{{$key+1}}</th>

	      <td style="width: 100px; height:100px;">

			<div id="carouselExampleControls{{$data->id}}" class="carousel slide" data-bs-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				    	<img src="{{Storage::url($data->feature_image)}}" class="d-block w-100">
				    </div>
				    <div class="carousel-item">
				      <img src="{{Storage::url($data->first_image)}}" class="d-block w-100">
				    </div>
				    <div class="carousel-item">
				      <img src="{{Storage::url($data->second_image)}}" class="d-block w-100">
				    </div>
				  </div>
				  <button class="carousel-control-prev" type="button"
				   data-bs-target="#carouselExampleControls{{$data->id}}" data-bs-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" 
				  data-bs-target="#carouselExampleControls{{$data->id}}" data-bs-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
				  </button>
			</div>
	 
	      </td>
	      
	      <td>{{$data->name}}</td>
	      <td>{{$data->price}}</td>
	      <td>{{$data->price_status}}</td>
	      <td>
	      	<a href="{{route('ads.edit',$data->id)}}" class="btn btn-primary">Edit</a>
	      	<a target="_blank"href="{{route('show.product.info',[$data->id, $data->slug])}}" class="btn btn-success">View</a>
	      	<a href="" class="btn btn-danger">Delete</a>
	      </td>
	    </tr>
	    @endforeach
	</table>
@endsection
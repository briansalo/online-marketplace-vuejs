@extends('backend.dashboard.dashboard')
@section('dashboard_content')

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
	  	@forelse($alldata as $key => $data)
	    <tr>
	      <th scope="row">{{$key+1}}</th>

	      <td style="width: 100px; height:50px;">

			<div id="carouselExampleControls{{$data->id}}" class="carousel slide" data-bs-ride="carousel">
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				    	<img src="{{Storage::url($data->feature_image)}}" style="width:100px; height: 70px;">
				    </div>
				    <div class="carousel-item">
				      <img src="{{Storage::url($data->first_image)}}" style="width:100px; height: 70px;">
				    </div>
				    <div class="carousel-item">
				      <img src="{{Storage::url($data->second_image)}}" style="width:100px; height: 70px;">
				    </div>
				  </div>
				  <button class="carousel-control-prev" type="button"
				   data-bs-target="#carouselExampleControls{{$data->id}}" data-bs-slide="prev">
					    <span class="carousel-control-prev" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" 
				  data-bs-target="#carouselExampleControls{{$data->id}}" data-bs-slide="next">
					    <span class="carousel-control-next" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
				  </button>
			</div>
	 
	      </td>
	      
	      <td>{{$data->name}}</td>
	      <td>{{$data->price}}</td>
	      <td>{{$data->price_status}}</td>
	      <td>
	      	<a title="Edit" href="{{route('ads.edit',$data->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
	      	<a title="View" target="_blank"href="{{route('show.product.info',[$data->id, $data->slug])}}"
	      	 class="btn btn-primary"><i class="fas fa-eye"></i>
	      	</a>
	      	<a title="Delete" href="" class="btn btn-primary"><i class="fas fa-trash"></i></a>
	      </td>

		@empty
	  		<td>You have no any published ads</td>

	    </tr>
	    @endforelse
	</table>
@endsection
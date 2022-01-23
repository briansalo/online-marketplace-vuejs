@extends('backend.dashboard.dashboard')
@section('dashboard_content')

	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Image</th>
	      <th scope="col">Name</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@forelse($advertisements as $key => $advertisement)
	  	<tr>
	  		<th scope="row">{{$key+1}}</th>
	  		<td style="width: 100px; height:50px;"> <img src="{{Storage::url($advertisement->feature_image)}}"  style="width:100px; height: 70px;"> </td>
	  		<td> {{$advertisement->name}}</td>
	  		<td>
		      	<a title="View" target="_blank"href="{{route('show.product.info',[$advertisement->id, $advertisement->slug])}}"
		      	 class="btn btn-primary"><i class="fas fa-eye"></i>
		      	</a>
		      	<a title="Delete ads" href="{{route('remove.saved.ads',$advertisement->id)}}" class="btn btn-primary"><i class="fas fa-trash"></i></a>
		    </td>
	  	@empty
	  		<td>You have no any saved ads</td>
	  </tr>
	  @endforelse
	</table>
@endsection
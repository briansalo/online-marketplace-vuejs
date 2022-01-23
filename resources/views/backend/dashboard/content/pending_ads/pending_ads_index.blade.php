@extends('backend.dashboard.dashboard')
@section('dashboard_content')

	<table class="table table-bordered">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Image</th>
	      <th scope="col">Name</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@forelse($advertisements as $key => $advertisement)
	  	<tr>
	  		<th scope="row">{{$key+1}}</th>
	  		<td style="width: 100px; height:50px;"> <img src="{{Storage::url($advertisement->feature_image)}}" style="width:100px; height: 70px;"> </td>
	  		<td>
				 {{$advertisement->name}}
	  		</td>
	  		<td>
		      	<a title="Edit" href="{{route('ads.edit',$advertisement->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
		      	<a title="View" target="_blank"href="{{route('show.product.info',[$advertisement->id, $advertisement->slug])}}"
		      	 class="btn btn-primary"><i class="fas fa-eye"></i>
		      	</a>
		      	<a title="Cancel ads" href="" class="btn btn-primary"><i class="fas fa-ban"></i></a>
	  		</td>
	  	@empty
	  		<td>You have no any pending ads</td>
	  </tr>
	  @endforelse
	</table>
@endsection
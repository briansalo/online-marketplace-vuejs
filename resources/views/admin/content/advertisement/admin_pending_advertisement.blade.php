@extends('admin.admin')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
          @include('backend.flash-message.message')
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-header">
                             <h3>All Advertisement</h3>
                         </div>   
                        <div class="card-body">
							<table class="table table-bordered">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Seller Name</th>
								      <th scope="col">Seller Ratings</th>
								      <th scope="col">Image</th>
								      <th scope="col">Name</th>
								      <th scope="col"></th>
								    </tr>
								  </thead>
								  <tbody>
								  	@foreach($alldata as $key => $data)
								    <tr>
								      <th scope="row">{{$key+1}}</th>
								      <td><a href="">{{$data->user->name}}</a></td>
									   @switch($data->user->count_penalty)
		                                	@case(0)
		                                		<td>Very Good</td>
		                                		@break
		                                	@case(1)
		                                		<td>Good</td>
		                                		@break
		                                	@case(2)
		                                		<td>Almost Good</td>
		                                		@break
		                                	@case(3)
		                                		<td>Bad</td>
		                                		@break
		                                	@case(4)
		                                		<td>Very Bad</td>
		                                		@break	
		                                @endswitch
								      <td> <img src="{{Storage::url($data->feature_image)}}"> </td>
								      <td>{{$data->name}}</td>
								      <td>
								      	<a target="_blank"href="{{route('show.product.info',[$data->id, $data->slug])}}" class="btn btn-primary">View</a>
								      	<a href="{{route('admin.pending.confirm', $data->id)}}" class="btn btn-success">Confirm</a>
								      </td>
								    </tr>
								    @endforeach
								</tbody>
							</table>
						</div>
						<div class="d-flex justify-content-center">
							{!! $alldata->links() !!}
						</div>
					</div><!--card-->

				</div>
			</div>	
		</div>
	</div>

@endsection
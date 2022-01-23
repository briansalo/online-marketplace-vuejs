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
								      <th scope="col">Image</th>
								      <th scope="col">Name</th>
								      <th scope="col">Published_at</th>
								      <th scope="col"></th>
								    </tr>
								  </thead>
								  <tbody>
								  	@foreach($alldata as $key => $data)
								    <tr>
								      <th scope="row">{{$key+1}}</th>
								      <td><a href="">{{$data->user->name}}</a></td>
								      <td> <img src="{{Storage::url($data->feature_image)}}" width="50%"> </td>
								      <td>{{$data->name}}</td>
								      <td>	{{ date('d-m-Y', strtotime($data->updated_at))  }}</td>
								      <td>
								      	<a target="_blank"href="{{route('show.product.info',[$data->id, $data->slug])}}" class="btn btn-success">View</a>
								      	<a href="{{route('admin.delete_ads', $data->id)}}" class="btn btn-danger">Delete</a>
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
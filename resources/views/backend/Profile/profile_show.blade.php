@extends('template')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-4">
			
			<div class="card">
				<div class="card-body">
					<img src="{{Storage::url($user->avatar)}}" class="img-thumbnail mx-auto d-block" width="130">
					<p class="text-center">{{ucwords($user->name)}}</p>
					<p class="text-center">Ratings:
							@switch($user->count_penalty)
		                                	@case(0)
		                                		Very Good
		                                		@break
		                                	@case(1)
		                                		Good
		                                		@break
		                                	@case(2)
		                                		Almost Good
		                                		@break
		                                	@case(3)
		                                		Bad
		                                		@break
		                                	@case(4)
		                                		Very Bad
		                                		@break	
		                                @endswitch
		             </p>

				</div>
			</div>	
		</div>

		<div class="col-md-8">


			<div class="card">
				<div class="card-body text-center">
					<div class="row">
					@forelse($ads as $advertise)
						<div class="col-3 disable_link">
						<a href="{{route('show.product.info',[$advertise->id,$advertise->slug])}}">	
							<img src="{{Storage::url($advertise->feature_image)}}" class="img-thumbnail d-block w-100"  style="width:100px; height:100px">
	                            <p class="text-center  card-footer">
	                                {{$advertise->name}}
	                                <BR>
	                                ₱{{number_format($advertise->price,)}}
	                            </p>
	                    </a>
						</div>
					@empty
						<div class="alert alert-info">Nothing to show!!!</div>	
					@endforelse
					</div>

				</div>
			</div>	

		</div>

	</div>
</div>


@endsection
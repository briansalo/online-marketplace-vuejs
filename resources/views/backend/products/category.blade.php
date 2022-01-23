@extends('template')
@section('content')


<div class="container">

	<div class="row">
		<div class="col-md-3">
           <div class="card">
           		<div class="card-header text-white" style="background-color: #02c8eb;">
           			Filter
           		</div>
           		<div class="card-body">
           			@foreach($filterCategory as $filter)
           			<p>
           				<a href="{{url()->current()}}/{{($filter->subcategory->slug)??''}}">
	           				<!--subcategory came from advertisement model-->
	           				{{$filter->subcategory->name??''}}
           				</a>
           			</p>
           			@endforeach
           		</div>
           </div>
           <br>
           <div class="card">
           		<div class="card-body">
           			<form action="{{url()->current()}}" method="get">
           				<div class="form-group">
           					<label for="">minimum price</label>
           					<input type="number" name="min_price" class="form-control">
           				</div>
           				<div class="form-group">
           					<label for="">maximum price</label>
           					<input type="number" name="max_price" class="form-control">
           				</div>
           				<div class="form-group mt-2">
           					<button type="submit" class="btn btn-info text-white">Search</button>
           				</div>
           			</form>
           		</div>
           </div>
		</div><!--col-md-3-->

		<div class="col-md-9">
			
			@include('backend.products.breadcrumb')

			<div class="row">
				@forelse($advertisement as $advertise)
					<div class="col-3 disable_link">
						<a href="{{route('show.product.info',[$advertise->id,$advertise->slug])}}">	
							<img src="{{Storage::url($advertise->feature_image)}}" class="img-thumbnail d-block w-100"  style="width:100px; height:100px">
	                            <p class="text-center  card-footer" >
	                                {{$advertise->name}}
	                                <br>
	                                ₱{{number_format($advertise->price,)}}
	                            </p>
                         </a>   
					</div>
				@empty
				Sorry, we are unable to find product base on this category
				@endforelse
			</div>
				
		</div>	<!--col-md9-->
	</div><!--row-->
	
</div>


@endsection
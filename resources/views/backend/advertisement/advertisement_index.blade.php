@extends('template')
@section('content')


<div class="container">

	<div class="row">
		<div class="col-md-3">
            @include('backend.advertisement.body.advertisement_sidebar')
		</div><!--col-md-3-->

		<div class="col-md-9">	
				@yield('advertisement_content')
		</div>	<!--col-md9-->
	</div><!--row-->
	
</div>


@endsection
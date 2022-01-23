@extends('template')
@section('content')


<div class="container">

	<div class="row">
		<div class="col-md-3">
            @include('backend.dashboard.body.sidebar')
		</div><!--col-md-3-->

		<div class="col-md-9">	
				@yield('dashboard_content')
		</div>	<!--col-md9-->
	</div><!--row-->
	
</div>


@endsection
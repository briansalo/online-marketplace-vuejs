@extends('template')
@section('content')

<div class="slider" style="margin-top: -25px;">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="/main-carousel/carosel-edited10.jpg" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="/main-carousel/carosel-edited11.jpg" class="d-block w-100" alt="...">
	    </div>
	    <div class="carousel-item">
	      <img src="/main-carousel/carosel-edited12.jpg" class="d-block w-100" alt="...">
	    </div>
	  </div>
	</div>
</div>



    <div class="container mt-5">
        <span>
            <h1><a href="{{route('find.base.on.category',$category_car->slug)}}">Cars</a></h1>
        </span>
        <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                         @foreach($first_display_cars as $display_car)
                        <div class="col-3">
                            <a href="{{route('show.product.info',[$display_car->id,$display_car->slug])}}">
                                <img src="{{Storage::url($display_car->feature_image)}}" class="img-thumbnail" style="width:100%; height: 150px; background-size: cover;">
                                <p class="text-center  card-footer" style="color: blue;">
                                    {{$display_car->name}}/{{$display_car->price}}
                                </p>
                            </a>
                        </div>  
                         @endforeach
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        @foreach($second_display_cars as $display_car)
                        <div class="col-3">
                            <a href="{{route('show.product.info',[$display_car->id,$display_car->slug])}}">
                                <img src="{{Storage::url($display_car->feature_image)}}" class="img-thumbnail" style="width:100%; height: 150px; background-size: cover;">
                                <p class="text-center  card-footer">
                                    {{$display_car->name}}/{{$display_car->price}}
                                </p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>



            </div>
                  <button class="carousel-control-prev" type="button"
                   data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" 
                  data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                  </button>
        </div>


        <span>
            <h1><a href="{{route('find.base.on.category',$category_phone->slug)}}">Cellphone</a></h1>
        </span>
        <div id="carouselExampleControlsforphone" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                         @foreach($first_display_phone as $display_phone)
                        <div class="col-3">
                            <a href="{{route('show.product.info',[$display_phone->id,$display_phone->slug])}}">
                                <img src="{{Storage::url($display_phone->feature_image)}}" class="img-thumbnail" style="width:100%; height: 150px; background-size: cover;">
                                <p class="text-center  card-footer" style="color: blue;">
                                    {{$display_phone->name}}/{{$display_phone->price}}  
                                </p>
                            </a>
                        </div>  
                         @endforeach
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        @foreach($second_display_phone as $display_phone)
                        <div class="col-3">
                            <a href="{{route('show.product.info',[$display_phone->id,$display_phone->slug])}}">
                                <img src="{{Storage::url($display_phone->feature_image)}}" class="img-thumbnail" style="width:100%; height: 150px; background-size: cover;">
                                <p class="text-center  card-footer">
                                    {{$display_phone->name}}/{{$display_phone->price}}
                                </p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>



            </div>
                  <button class="carousel-control-prev" type="button"
                   data-bs-target="#carouselExampleControlsforphone" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" 
                  data-bs-target="#carouselExampleControlsforphone" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                  </button>
        </div>

    </div><!--container-->

@endsection
@extends('template')
@section('content')


<div class="slider" style="margin-top: -20px;">
	<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="/main-carousel/carosel-edited10.jpg" class="d-block w-100" alt="...">
	    </div>
        <div class="carousel-item">
          <img src="/main-carousel/marketplaceshoes.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="/main-carousel/marketplace.jpg" class="d-block w-100" alt="...">
        </div>
	    <div class="carousel-item">
	      <img src="/main-carousel/marketplacemotor.jpg" class="d-block w-100" alt="...">
	    </div>
	  </div>
	</div>
</div>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <span>
                <b><u>Most Save Product</u></b>
            </span>
            <div id="SaveProductControls" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row">
                             @foreach($first_display_save_product as $first_save_product)
                            <div class="col-3">
                                <a href="{{route('show.product.info',[$first_save_product->id,$first_save_product->slug])}}">
                                    <img src="{{Storage::url($first_save_product->feature_image)}}" class="img-thumbnail" style="width:100%; height: 100px;">
                                </a>
                            </div>  
                             @endforeach
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            @foreach($second_display_save_product as $second_save_product)
                            <div class="col-3">
                                <a href="{{route('show.product.info',[$second_save_product->id,$second_save_product->slug])}}">
                                    <img src="{{Storage::url($second_save_product->feature_image)}}" class="img-thumbnail" style="width:100%; height: 100px;">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                      <button class="carousel-control-prev" type="button"
                       data-bs-target="#SaveProductControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" 
                      data-bs-target="#SaveProductControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                      </button>
            </div><!--carousel example controls-->
        </div><!--col-md-6-->

        <div class="col-md-6">
            <span>
                <b><u>Latest Product</u></b>
            </span>
            <div id="LatestProductControls" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row">
                             @foreach($first_latest_product as $latest_product)
                            <div class="col-3">
                                <a href="{{route('show.product.info',[$latest_product->id,$latest_product->slug])}}">
                                    <img src="{{Storage::url($latest_product->feature_image)}}" class="img-thumbnail" style="width:100%; height: 100px;">
                                </a>
                            </div>  
                             @endforeach
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            @foreach($second_latest_product as $second_latest_product)
                            <div class="col-3">
                                <a href="{{route('show.product.info',[$second_latest_product->id,$second_latest_product->slug])}}">
                                    <img src="{{Storage::url($second_latest_product->feature_image)}}" class="img-thumbnail" style="width:100%; height: 100px;">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                      <button class="carousel-control-prev" type="button"
                       data-bs-target="#LatestProductControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" 
                      data-bs-target="#LatestProductControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                      </button>
            </div><!--carousel example controls-->
        </div><!--col-md-6-->

    </div><!--row-->







        <span>
            <b><h4><u>Products</u></h4></b>
        </span>

            <div class="card">
                <div class="card-header text-center">
                    <div class="row row-cols-5">
                        
                    @foreach($allproduct as $product)
                        <div class="col disable_link">
                        <a href="{{route('show.product.info',[$product->id,$product->slug])}}"> 
                            <img src="{{Storage::url($product->feature_image)}}" class="img-thumbnail d-block w-100"  style="width:100px; height:200px">
                                <p class="text-center  card-footer">
                                    {{$product->name}}
                                    <br>
                                    ₱{{number_format($product->price,)}}
                                </p>

                        </a>
                        </div>
                    @endforeach

                    </div>

                </div>
            </div>  
</div><!--container-->
   

@endsection
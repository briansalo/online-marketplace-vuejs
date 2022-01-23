		
			<div class="card-header mb-2">
				<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="">
				  <ol class="breadcrumb">
				    
             		<li class="breadcrumb-item">
            			<i class="fa fa-home"></i><a href="/">Home</a> 
        			</li>
        			@for($i=3; $i<= count(Request::segments());$i++)
            			@if($i<count(Request::segments()) & $i>0)
	   						<li class="breadcrumb-item"> 
	   							<a href="{{URL::to(implode('/',array_slice(Request::segments(),0,$i,true)))}}">
	   								{{ucwords(Request::segment($i))}}</a>
	   						</li>
        			    @else   
       						<li class="breadcrumb-item"> {{ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
           				 @endif
        			@endfor
				  </ol>
				</nav>
			</div>
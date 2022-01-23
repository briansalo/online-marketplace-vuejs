
			<div class="card">
				<div class="card-body">
					<img src="{{Storage::url(auth()->user()->avatar)}}" class="img-thumbnail mx-auto d-block" style="width:150px; height: 150px;">
					<p class="text-center">{{ucwords(auth()->user()->name)}}
					(
							@switch(auth()->user()->count_penalty)
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
		             )
		         </p>
				</div>
				<div class="vertical-menu " style="border-top:2px solid #02c8eb; ">
					<a href="{{route('ads.create')}}" class="{{request()->is('ads/ads/create')?'active':''}}">Create ads</a>
					<a href="{{route('ads.index')}}" class="{{request()->is('ads/ads/index')?'active':''}}">Published ads</a>
					<a href="{{route('ads.pending')}}" class="{{request()->is('ads/ads/pending')?'active':''}}">Pending ads</a>
					<a href="{{route('message.view')}}" class="{{request()->is('message/view')?'active':''}}">Message</a>
					<a href="{{route('get.my.saved.ads')}}" class="{{request()->is('save_ads/get_my_ads')?'active':''}}">Saved ads</a>
				</div>	
			</div>	
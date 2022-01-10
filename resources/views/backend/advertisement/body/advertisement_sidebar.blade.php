			<div class="card">
				<div class="card-body">
					<img src="/user_image/image1.jpg" class="img-thumbnail mx-auto d-block" width="130">
					<p class="text-center">John Doe<b></b></p>
				</div>
				<hr style="border:2px solid blue">
				<div class="vertical-menu">
					<a href="">Dashboard</a>
					<a href="">Profile</a>
					<a href="{{route('ads.create')}}" class="{{request()->is('ads/ads/create')?'active':''}}">Create ads</a>
					<a href="{{route('ads.index')}}" class="{{request()->is('ads/ads/index')?'active':''}}">Published ads</a>
					<a href="{{route('message.view')}}" class="{{request()->is('message/view')?'active':''}}">Message</a>
				</div>	
			</div>	
	<div id="layerslider-container-fw">
		<div id="layerslider" style="width: 100%; height: 560px; margin: 0px auto;">
			@foreach(slideshow() as $slide)
			<div class="ls-layer">
				@if(!empty($slide->url))
				<a href="{{filter_link_url($slide->url)}}" target="_blank">
				@else
				<a href="#">
				@endif
					<img src="{{slide_image_url($slide->gambar)}}" alt="{{$slide->title}}" class="ls-bg"/>
				</a>
			</div>
			@endforeach
		</div>
	</div>
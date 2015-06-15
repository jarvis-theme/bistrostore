	<div id="layerslider-container-fw">
		<div id="layerslider" style="width: 100%; height: 560px; margin: 0px auto;">
			@foreach(slideshow() as $slide)
			<div class="ls-layer" style="slidedirection: right; slidedelay: 4000; durationin: 1500; durationout: 1500; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 0; delayout: 0; transition3d: all;">
				<a href="#">
					<img src="{{slide_image_url($slide->gambar)}}" alt="" class="ls-bg"/>
				</a>
			</div>
			@endforeach
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			$('#layerslider').layerSlider({
				skinsPath : '{{url::to(dirTemaToko()."bistrostore/assets/css/")}}/',
				skin : 'fullwidth',
				thumbnailNavigation : 'hover',
				hoverPrevNext : true,
				autoPlayVideos          : false,
				responsive : true,
				responsiveUnder : 1170,
				sublayerContainer : 1170,
				showCircleTimer     : false,
			});
		});
	</script>
	<div id="layerslider-container-fw">
		<div id="layerslider" style="width: 100%; height: 560px; margin: 0px auto;">
			<div class="ls-layer" style="slidedelay: 500;">
				<a href="#"><img src="{{URL::to(getPrefixDomain().'/galeri/banner-width1.jpg')}}" alt="" class="ls-bg"/></a>
			</div>
			<div class="ls-layer" style="slidedirection: right; slidedelay: 4000; durationin: 1500; durationout: 1500; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 0; delayout: 0; transition3d: all;">
				<a href="#"><img src="{{URL::to(getPrefixDomain().'/galeri/banner-width2.jpg')}}" alt="" class="ls-bg"/></a>
			</div>
			<div class="ls-layer" style="slidedirection: top; slidedelay: 4000; durationin: 1500; durationout: 1500; easingin: easeInOutQuint; easingout: easeInOutQuint; delayin: 0; delayout: 0;">
				<img src="{{URL::to(getPrefixDomain().'/galeri/banner-width3.png')}}" alt="" class="ls-bg"/>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			$('#layerslider').layerSlider({
				skinsPath : '{{url::to(dirTemaToko()."bistro/assets/css/")}}/',
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
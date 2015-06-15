<div class="row">
	<div class="span12">
		@foreach(horizontal_banner() as $item)
		<div id="banner" class="span12" style="margin-left:0px;">
			<div>
				<a href="{{url($item->url)}}">
					{{HTML::image(banner_image_url($item->gambar),'banner',array('class'=>'box-shadow','style'=>'display:block;width:100%;'))}}
				</a>
			</div>
		</div>
		@endforeach
    </div>
</div>

<!-- Start Carousels -->
<div class="row-fluid">
	<div class="span12">
        <h2 class="widget-title"><span>Produk</span></h2>
		<div class="sidebar-line"><span></span></div>
		<div class="for-womans flexslider flex-direction-nav-on-top">
			<ul class="slides">
				<li>
				{{-- */ $counter=0; /* --}}
				@foreach(list_product() as $key=>$myproduk)
					{{-- */ $counter++; /* --}}
					@if($counter==7)
					</li>
					<li>
					{{-- */ $counter=1; /* --}}
					@endif
					<div class="span2">
						<div class="wdt-product">
							<div class="wdt-products-wrapper">
								<div class="wdt-product active show">
									<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
										{{HTML::image(product_image_url($myproduk->gambar1), short_description($myproduk->nama,15))}}
									</a>
									<h4><a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">{{$myproduk->nama}}</a></h4>
									<div class="wdt-pricing">
										<span class="amount">
										@if($setting->checkoutType!=2)
											{{price($myproduk->hargaJual)}}
										@else
											Lihat
										@endif
										</span>
									</div>
									<div class="wdt-cart">
										<div class="wdt-cart-bar">
											<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}"><i class="icon-shopping-cart"></i> Lihat</a>
										</div>
									</div>
									<div class="wdt-overlay">
										<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
											<span class="amount">
											@if($setting->checkoutType!=2)
												{{price($myproduk->hargaJual)}}
											@else
												Lihat
											@endif
											</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Carousels -->   

<!-- Start Tab & Deal -->
<div class="services">
	<div class="row-fluid">
		<div class="span12">
			<ul id="wdtTab" class="nav nav-tabs">
				<li class="active"><a href="#new-arrival" data-toggle="tab">Terbaru</a></li>
				<li><a href="#best-sellers" data-toggle="tab">Terlaris</a></li>
			</ul>
			<div id="wdtTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="new-arrival">
					<div class="row-fluid">
					{{-- */ $counter = 0; /* --}}
					@foreach(new_product() as $key=>$myproduk)
						{{-- */ $counter++; /* --}}
						<div class="span2">
							<div class="wdt-product">
								<div class="wdt-products-wrapper">
									<div class="wdt-product active show">
										<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
											{{HTML::image(product_image_url($myproduk->gambar1), short_description($myproduk->nama, 15))}}
										</a>
										<h4><a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">{{$myproduk->nama}}</a></h4>
										<div class="wdt-overlay zoom-hover">
											<span class="amount zoom"><a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}"><i class="icon-zoom-in"></i></a></span>
										</div>
										<div class="wdt-pricing">
											<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
												<span class="amount">
												@if($setting->checkoutType!=2)
													{{price($myproduk->hargaJual)}}
												@else
													Lihat
												@endif
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@if($counter>=6)
						{{-- */ break; /* --}}
						@endif
					@endforeach
					</div>
				</div>

				<div class="tab-pane fade" id="best-sellers">
					<div class="row-fluid">
					{{-- */ $counter = 0; /* --}}
					@foreach(list_product() as $key=>$myproduk)
						@if($myproduk->terlaris=='1')
						{{-- */ $counter++; /* --}}
						<div class="span2">
							<div class="wdt-product">
								<div class="wdt-products-wrapper">
									<div class="wdt-product active show">
										<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
											{{HTML::image(product_image_url($myproduk->gambar1), short_description($myproduk->nama, 15))}}
										</a>
										<h4><a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">{{$myproduk->nama}}</a></h4>
										<div class="wdt-overlay zoom-hover">
											<span class="amount">
											@if($setting->checkoutType!=2)
												{{price($myproduk->hargaJual)}}
											@else
												Lihat
											@endif
											</span>
										</div>
										<div class="wdt-pricing">
											<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
												<span class="amount">
												@if($setting->checkoutType!=2)
													{{price($myproduk->hargaJual)}}
												@else
													Lihat
												@endif
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@if($counter>=6)
						{{-- */ break; /* --}}
						@endif

						@endif
					@endforeach
					</div>
				</div>				
			</div>
		</div>
	</div>   
</div> 
<!-- END Tab & Deal --> 

<!-- Start Services -->
<div class="footer-links">
	<div class="row-fluid">
		<div class="span7">
		<h2 class="widget-title"><span>Testimonials</span></h2>
			<div class="sidebar-line"><span></span></div>
			<div class="testimonials flexslider flex-direction-nav-on-top">
				<ul class="slides">
					<li>
					{{-- */ $counter = 0; /* --}}
					@foreach($testimonial as $testi)
						{{-- */ $counter++; /* --}}
						@if($counter==3)
						</li>
						<li>
						{{-- */ $counter = 1; /* --}}
						@endif
						<blockquote>
							<p>{{$testi->isi}}</p>
							<small>{{$testi->nama}}</small>
						</blockquote>
					@endforeach
					</li>
				</ul>
			</div>           
		</div>

		<div class="span5">
			<h2 class="widget-title"><span>STAY CONNECT</span></h2>
			<div class="sidebar-line"><span></span></div>
			<div class="row-fluid">
				<p>Get updates, discounts, and special offers to win free stuff and cash prizes!</p>
				<div class="span5">
					<ul class="footer-social">
						@if(@$kontak->fb)
						<li><a href="{{url($kontak->fb)}}"><i class="icon-facebook"></i></a></li>
						@endif
						@if(@$kontak->tw)
						<li><a href="{{url($kontak->tw)}}"><i class="icon-twitter"></i></a></li>
						@endif
						@if(@$kontak->gp)
						<li><a href="{{url($kontak->gp)}}"><i class="icon-google-plus"></i></a></li>
						@endif
						@if(@$kontak->pt)
						<li><a href="{{url($kontak->pt)}}"><i class="icon-pinterest"></i></a></li>
						@endif
					</ul>
				</div>

				<div class="span6">
					<div id="subscibe">
						<h5><i class="icon-envelope"></i> Subscribe to Mail List</h5>
						<form id="subscribe" target="_blank" method="post" action="{{@$mailing->action}}">
							<input type="text" placeholder="Email address">
							<button class="btn btn-general" name="subscribe" type="submit" {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}>Subscribe</button>
						</form>
					</div>
				</div>
			</div>
		</div><!-- .span4 -->

	</div><!-- .row -->
</div>     
<!-- End Services -->
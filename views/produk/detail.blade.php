<div class="row">
	<div class="span9 post">
		<h2 class="page-header"><span>{{ $produk->nama }}</span></h2>
		<div class="sidebar-line"><span></span></div>
		<div class="row-fluid product-info">
			<div class="span7">
				<div class="cf">
					<span class="productwrap">
						{{HTML::image(product_image_url($produk->gambar1,'large'), $produk->nama, array('id'=>'demo4'))}}
					</span>
					<ul id="demo4carousel" class="elastislide-list"> 
						@if($produk->gambar1!='')
						<li>
							<a href="#">
								{{HTML::image(product_image_url($produk->gambar1,'thumb'),'thumbnail 1',array('data-largeimg'=>product_image_url($produk->gambar1,'medium')))}}
							</a>
						</li>
						@endif 
						@if($produk->gambar2!='')
						<li>
							<a href="#">
								{{HTML::image(product_image_url($produk->gambar2,'thumb'),'thumbnail 2',array('data-largeimg'=>product_image_url($produk->gambar2,'medium')))}}
							</a>
						</li>
						@endif 
						@if($produk->gambar3!='')
						<li>
							<a href="#">
								{{HTML::image(product_image_url($produk->gambar3,'thumb'),'thumbnail 3',array('data-largeimg'=>product_image_url($produk->gambar3,'medium')))}}
							</a>
						</li>
						@endif 
						@if($produk->gambar4!='')
						<li>
							<a href="#">
								{{HTML::image(product_image_url($produk->gambar4,'thumb'),'thumbnail 4',array('data-largeimg'=>product_image_url($produk->gambar4,'medium')))}}
							</a>
						</li>
						@endif
					</ul>
				</div>
			</div>
			<div class="span5">
				<form action="#" id="addorder">
					<!--<h2 class="post-title">ini kolom nama</h2>-->
					@if($setting->checkoutType!=2)
						<div class="price"> 
							@if($produk->hargaCoret!=0)
							<span class="price-old">{{ price($produk->hargaCoret) }}</span>
							@endif 
							<span class="price-new">{{ price($produk->hargaJual) }}</span>
						</div>
					@endif  
					@if($setting->checkoutType!=3)
						<div class="row-fluid">
							<div class="span6">
								<span class="required">*</span>
								<b>Jumlah:</b>
								<br>
								<input class="span9" type="text" name="qty" size="2" value="1"> 
							</div>
							@if($opsiproduk->count() > 0)
							<div class="span6">
								<span class="required">*</span>
								<b>Opsi:</b>
								<br>
								<select name="opsiproduk">
									<option value="">-- Pilih Opsi --</option>
									@foreach ($opsiproduk as $key => $opsi)
									<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
										{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
									</option>
									@endforeach 
								</select>
							</div> 
							@endif 
						</div>
						<div class="row-fluid">
							<div class="span6">
								<button type="submit" id="button-cart" class="btn btn-general add_cart"><span><i class="icon-shopping-cart"></i> Add to Cart</span>
								</button>
							</div>
						</div>
						<div class="row-fluid">
							<hr>
							<div class="span12">
								{{ sosialShare(product_url($produk)) }}
							</div>
						</div>
					@elseif($setting->checkoutType==3) 
						@if(@$po)
							<div class="row-fluid">
								<div class="span12 post">
									<p> Tanggal mulai pemesanan : {{waktuDbBalik($po->tanggalmulai)}}
										<br>
										@if($po->kuota=='0') 
										Tanggal akhir pemesanan : {{waktuDbBalik($po->tanggalakhir)}}

										@elseif($po->tanggalakhir=='0000-00-00') 
										Kuota minimum proses pre-order : {{$po->kuota}}

										@endif
										<br> DP : {{$po->dp}}
									</p>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span6"> <span class="required">*</span> <b>Jumlah:</b>
									<br>
									<input class="span9" type="text" name="qty" size="2" value="1"> 
								</div>
								@if($opsiproduk->count() > 0)
								<div class="span6">
									<span class="required">*</span> <b>Opsi:</b>
									<br>
									<select name="opsiproduk">
										<option value="">-- Pilih Opsi --</option> 
										@foreach ($opsiproduk as $key => $opsi)
										<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
											{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
										</option>
										@endforeach 
									</select>
								</div>
								@endif 
							</div>
							<div class="row-fluid">
								<div class="span6">
									<button type="submit" id="button-cart" class="btn btn-general"><span><i class="icon-shopping-cart"></i> Pre-order</span>
									</button>
								</div>
							</div>
						@else
							<p>Belum memasuki periode pemesanan</p>
						@endif
					@endif 
					</div>
				</form>
			</div>
			<!-- Start Review Area" -->
			<section id="TabElements" class="product-info">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#information" data-toggle="tab">Product Info</a></li>
					<li><a href="#reviews" data-toggle="tab">Review</a></li>
					<li><a href="#comment" data-toggle="tab">Comment</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="information"> {{$produk->deskripsi}} </div>
					<div class="tab-pane fade" id="reviews">
						{{ pluginTrustklik() }}
					</div>
					<div class="tab-pane fade" id="comment">
						<div class="row-fluid">
							<div class="span12" id="tab-comment"> 
								{{$fbscript}}
								{{fbcommentbox(product_url($produk), '800px', '5', 'light')}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Start Related -->
			@if(count(other_product($produk)) > 0)
			<div class="row-fluid">
				<div class="span12">
					<h2 class="widget-title"><span>Related products</span></h2>
					<div class="sidebar-line"><span></span></div>
					<div class="for-womans flexslider flex-direction-nav-on-top">
						<ul class="slides">
							<li>
							{{-- */ $count = 0 /* --}}
							@foreach(other_product($produk) as $myproduk)
								{{-- */ $count++ /* --}}
								@if($count==4) 
									</li>
									<li>
									{{-- */ $count = 1 /* --}}
								@endif
								<div class="span4">
									<div class="wdt-product">
										<div class="wdt-products-wrapper">
											<div class="wdt-product active show">
												<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
													{{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array('alt' => ($myproduk->nama), 'title' => ($myproduk->nama), 'style'=>'min-height:273px'))}}
												</a>
												<h4>
													<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
														{{$myproduk->nama}}
													</a>
												</h4>
												<div class="wdt-pricing">
													<span class="amount">{{ price($myproduk->hargaJual) }}</span>
												</div>
												<div class="wdt-cart">
													<div class="wdt-cart-bar">
														<a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}"><i class="icon-shopping-cart"></i> Lihat</a>
													</div>
												</div>
												<div class="wdt-overlay">
													<span class="amount">
														<a href="{{product_url($myproduk)}}">
															{{price($myproduk->hargaJual)}}
														</a>
													</span>
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
			@endif
		</div>
		<!-- end post span -->
		<div class="span3 sidebar">
			<div class="widget">
			@if(count(list_category()) > 0)
				<h2 class="widget-title"><span>Site Categories</span></h2>
				<div class="sidebar-line"><span></span></div>
				<ul class="bullet_arrow2 categories">
				@foreach(list_category() as $side_menu)
					@if($side_menu->parent == '0') 
					<li>
						<a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
						@if($side_menu->anak->count() != 0)
						<ul>
							@foreach($side_menu->anak as $submenu)
								@if($side_menu->id == $submenu->parent)
								<li>
									<a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
									@if($submenu->anak->count() != 0)
										<ul>
										@foreach($submenu->anak as $submenu2)
											@if($submenu2->parent == $submenu->id)
											<li>
												<a href="{{category_url($submenu)}}">{{$submenu2->nama}}</a>
											</li>
											@endif
										@endforeach        
										</ul>
									@endif
								</li>
								@endif 
							@endforeach 
						</ul>
						@endif
					</li>
					@endif 
				@endforeach 
				</ul>
			@endif
			</div>
			<div class="widget powerup">
				{{pluginSidePowerup()}}
			</div>
			<div class="widget">
				@foreach(vertical_banner() as $item)
				<div>
					<a href="{{URL::to($item->url)}}">
						{{HTML::image(banner_image_url($item->gambar),'banner',array('class'=>'box-shadow','width'=>'220px','style'=>'display:block'))}}
					</a>
				</div>
				<br>
				@endforeach 
			</div>
		</div>
	</div>
</div>
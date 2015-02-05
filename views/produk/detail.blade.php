<div class="row">
	<div class="span9 post">
		<h2 class="page-header"><span>{{$produk->nama}}</span></h2>
		<div class="sidebar-line"><span></span></div>
		<div class="row-fluid product-info">
			<div class="span7">
				<div class="cf"> <span class="productwrap"><img id="demo4" src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}" /></span>
					<ul id="demo4carousel" class="elastislide-list"> 
						@if($produk->gambar1!='')
							<li><a href="#"><img src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}" data-largeimg="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}" /></a>
							</li>
						@endif 
						@if($produk->gambar2!='')
							<li><a href="#"><img src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar2)}}" data-largeimg="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar2)}}" /></a>
							</li>
						@endif 
						@if($produk->gambar3!='')
							<li><a href="#"><img src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar3)}}" data-largeimg="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar3)}}" /></a>
							</li>
						@endif 
						@if($produk->gambar4!='')
							<li><a href="#"><img src="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar4)}}" data-largeimg="{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar4)}}" /></a>
							</li>
						@endif
					</ul>
				</div>
			</div>
			<div class="span5">
				<form action="#" id='addorder'>
					<!--<h2 class="post-title">ini kolom nama</h2>-->
					@if($setting->checkoutType!=2)
						<div class="price"> 
						@if($produk->hargaCoret!=0)
							<span class="price-old">{{ jadiRUpiah($produk->hargaCoret) }}</span>
						@endif 
							<span class="price-new">{{ jadiRUpiah($produk->hargaJual) }}</span>
						</div>
					@endif  
					@if($setting->checkoutType!=3)
						<div class="row-fluid">
							<div class="span6"> <span class="required">*</span> <b>Jumlah:</b>
								<br>
								<input class="span9" type="text" name="qty" size="2" value="1"> 
							</div>
							@if($opsiproduk->count()>0)
							<div class="span6"> <span class="required">*</span> <b>Opsi:</b>
								<br>
								<select name="opsiproduk">
									<option value="">-- Pilih Opsi --</option>
									@foreach ($opsiproduk as $key => $opsi)
									<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
										{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}
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
							<div class="span6">
								<iframe src="//www.facebook.com/plugins/share_button.php?href={{URL::to(slugProduk($produk))}}&amp;layout=button" scrolling="no" style="border:none; overflow:hidden;height:20px;width:65px;" allowtransparency="true" frameborder="0"></iframe>
								<a class="twitter-share-button" href="https://twitter.com/share" data-count="none">Tweet </a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
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
								@if($opsiproduk->count()>0)
								<div class="span6">
									<span class="required">*</span> <b>Opsi:</b>
									<br>
									<select name="opsiproduk">
										<option value="">-- Pilih Opsi --</option> 
										@foreach ($opsiproduk as $key => $opsi)
										<option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
											{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}
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
						{{pluginTrustklik()}}
					</div>
					<div class="tab-pane fade" id="comment">
						<div class="row-fluid">
							<div class="span12" id="tab-comment"> 
								{{$fbscript}}
								{{fbcommentbox(slugProduk($produk), '800px', '5', 'light')}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Start Related -->
			@if(count($produklain) > 0)
			<div class="row-fluid">
				<div class="span12">
					<h2 class="widget-title"><span>Related products</span></h2>
					<div class="sidebar-line"><span></span></div>
					<div class="for-womans flexslider flex-direction-nav-on-top">
						<ul class="slides">
							<li>
							<?php $count=0; ?>
							@foreach($produklain as $myproduk)
								<?php $count++; ?> 
								@if($count==4) 
									</li>
									<li>
									<?php $count=1; ?>
								@endif
								<div class="span4">
									<div class="wdt-product">
										<div class="wdt-products-wrapper">
											<div class="wdt-product active show">
												<a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">
													{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array('alt' => ($myproduk->nama), 'title' => ($myproduk->nama)))}}
												</a>
												<h4><a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">{{$myproduk->nama}}</a></h4>
												<div class="wdt-pricing">
													<span class="amount">{{jadiRUpiah($myproduk->hargaJual)}}</span>
												</div>
												<div class="wdt-cart">
													<div class="wdt-cart-bar">
														<a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}"><i class="icon-shopping-cart"></i> Lihat</a>
													</div>
												</div>
												<div class="wdt-overlay">
													<span class="amount">{{jadiRUpiah($myproduk->hargaJual)}}</span>
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
				<h2 class="widget-title"><span>Site Categories</span></h2>
				<div class="sidebar-line"><span></span></div>
				<ul class="bullet_arrow2 categories">
				@foreach($kategori as $key=>$menu) 
					@if($menu->parent=='0')
					<li>
						<a href="{{slugKategori($menu)}}">{{$menu->nama}}</a>
						<!--SUbmenu Starts-->
						<ul>
						@foreach($kategori as $key=>$submenu) 
							@if($menu->id==$submenu->parent)
							<li><a href="{{slugKategori($submenu)}}">{{$submenu->nama}}</a></li>
							@endif 
						@endforeach 
						</ul>
						<!--SUbmenu Ends-->
					</li>
					@endif 
				@endforeach 
				</ul>
			</div>
			<div class="widget">
			@foreach(getBanner(1) as $item)
				<div>
					<a href="{{URL::to($item->url)}}"><img src="{{URL::to(getPrefixDomain().'/galeri/'.$item->gambar)}}" style="display:block" class="box-shadow" width="220px"/></a>
				</div>
				<br>
			@endforeach 
			</div>
		</div>
	</div>
</div>
<script>
	window.onload = function() {
		var link = document.URL;
		var appenddata = '<div class="fb-comments" data-href="' + link + '" data-width="750" data-numposts="5" data-colorscheme="light"></div>';
		$("#tab-review").html(appenddata);
	}
</script>
<script type="text/javascript">
	$(function() { //demo4   standard mode            var carsousel = $('#demo4carousel').elastislide({start:0,minItems:4,                onClick:function( el, pos, evt ) {                    el.siblings().removeClass("active");                    el.addClass("active");                    carsousel.setCurrent( pos );                    evt.preventDefault();                    // for imagezoom to change image                     var demo4obj = $('#demo4').data('imagezoom');                    demo4obj.changeImage(el.find('img').attr('src'),el.find('img').data('largeimg'));                },                onReady:function(){                    //init imagezoom with many options                    $('#demo4').ImageZoom({type:'standard',zoomSize:[480,360],bigImageSrc:"{{URL::to(getPrefixDomain().'/produk/'.$produk->gambar1)}}",offset:[10,-4],zoomViewerClass:'standardViewer',onShow:function(obj){obj.$viewer.hide().fadeIn(500);},onHide:function(obj){obj.$viewer.show().fadeOut(500);}});                                        $('#demo4carousel li:eq(0)').addClass('active');                                        // change zoomview size when window resize                    $(window).resize(function(){                        var demo4obj = $('#demo4').data('imagezoom');                        winWidth = $(window).width();                        if(winWidth>900)                        {                            demo4obj.changeZoomSize(480,360);                        }                        else                        {                            demo4obj.changeZoomSize( winWidth*0.4,winWidth*0.4*0.625);                        }                    });                                    }            });        });
</script>
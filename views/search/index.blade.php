<!-- ============== -->
<!-- Search section -->
<!-- ============== -->
<div class="row">
	<!-- Hasil cari produk-->
	<div class="span12 post">
		<h2 class="page-header"><span>Produk</span></h2>
		<div class="sidebar-line"><span></span></div>                    
		<div class="row-fluid">
			<div class="row-fluid">
				<?php
				$count=0;
				?>
				@foreach($hasilpro as $myproduk)
				<?php
				$count++;
				?>
				@if($count==5)
			</div>
			<div class="row-fluid">
				<?php
				$count=1;
				?>
				@endif
				<div class="span3">
					<div class="wdt-product">
						<div class="wdt-products-wrapper">
							<div class="wdt-product active show">
								<a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">
									{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array('alt' => ($myproduk->nama), 'title' => ($myproduk->nama)))}}
								</a>
								<h4><a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">{{$myproduk->nama}}</a></h4>
								<div class="wdt-pricing">
									<span class="amount"><a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">{{jadiRUpiah($myproduk->hargaJual)}}</a></span>
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
			</div>         
		</div>
	</div>
	<!--END hasil cari produk-->

	<!--hasil cari halaman-->
	<div class="span12 post">
		<h2 class="widget-title"><span>Halaman</span></h2>
		<div class="sidebar-line"><span></span></div>
		@foreach($hasilhal as $myhal)
			<a href={{URL::to('halaman/'.$myhal->slug)}}><h2>{{$myhal->judul}}</h2></a>
			<p>{{shortDescription($myhal->isi,100)}}</p>
		@endforeach
	</div>
	<!--END hasil cari halaman-->

	<!--hasil cari blog-->
	<div class="span12 post">
		<h2 class="widget-title"><span>Halaman</span></h2>
		<div class="sidebar-line"><span></span></div>
		@foreach($hasilblog as $myblog)
			<a href={{URL::to('blog/'.$myblog->slug)}}><h2>{{$myblog->judul}}</h2></a>
			<cite title>{{date("d M Y", strtotime($myblog->updated_at))}}</cite>
			<p>{{shortDescription($myblog->isi,100)}}</p>
		@endforeach
	</div>
	<!--END hasil cari blog-->
</div>
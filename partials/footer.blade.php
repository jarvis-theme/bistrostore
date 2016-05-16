<div class="container">
	<!-- Start Footer -->
	<footer class="footer-wrapper">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="span3">
					<h2 class="widget-title"><span>{{ Theme::place('title') }}</span></h2>
					<div class="sidebar-line"><span></span></div>
					<p>{{short_description(about_us()->isi,300)}} </p>
				</div>
				@foreach(all_menu() as $key=>$group)
				<div class="span3">
					<h2 class="widget-title"><span>{{$group->nama}}</span></h2>
					<div class="sidebar-line"><span></span></div>
					<ul class="contact-details">
					@foreach($group->link as $link)
						@if($group->id == $link->tautanId)
						<li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
						@endif
					@endforeach
					</ul>
				</div>
				@endforeach
			</div>

			<div class="row-fluid">
				<div class="span6">
					<h2 class="widget-title"><span>Bank</span></h2>
					<div class="sidebar-line"><span></span></div>
					<div class="clients flexslider flex-direction-nav-on-top">
						<ul class="slides">
							<li>
								@foreach(list_banks() as $value)
								<div class="list-bank">
									<img src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" title="{{$value->bankdefault->nama}}" />
								</div>
								@endforeach
								@foreach(list_payments() as $pay)  
									@if($pay->nama == 'ipaymu' && $pay->aktif == 1) 
									<div class="list-bank">
										<img src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Ipaymu" />
									</div>
									@endif
									@if($pay->nama == 'bitcoin' && $pay->aktif == 1)
									<div class="list-bank">
										<img src="{{url('img/bitcoin.png')}}" alt="Bitcoin" title="Bitcoin" />
									</div>
									@endif
									@if($pay->nama == 'paypal' && $pay->aktif == 1)
									<div class="list-bank">
										<img src="{{url('img/bank/paypal.png')}}" alt="Paypal" title="Paypal" />
									</div>
									@endif
								@endforeach
								@if(count(list_dokus()) > 0 && list_dokus()->status == 1)
								<div class="list-bank">
									<img src="{{url('img/bank/doku.jpg')}}" alt="Doku Payment" title="Doku">
								</div>
								@endif
								@if(count(list_veritrans()) > 0 && list_veritrans()->status == 1)
								<div class="list-bank">
									<img src="{{url('img/bank/veritrans.png')}}" alt="Veritrans" title="Veritrans">
								</div>
								@endif
							</li>
						</ul>
					</div>
				</div>
				<div class="span3">
					<h2 class="widget-title"><span>GET IN TOUCH</span></h2>
					<div class="sidebar-line"><span></span></div>
					<ul class="contact-details">
						<li><i class="icon-home"></i>{{$kontak->alamat}}</li>
						<li>
							<i class="icon-phone"></i>@if(empty($kontak->telepon) && empty($kontak->hp))
							-
							@elseif(!empty($kontak->telepon) && empty($kontak->hp))
							{{$kontak->telepon}}
							@elseif(empty($kontak->telepon) && !empty($kontak->hp))
							{{$kontak->hp}}
							@else
							{{$kontak->telepon.' - '.$kontak->hp}}
							@endif
						</li>
						<li><i class="icon-envelope-alt"></i> <a href="mailto:support@yoursite.com">{{$kontak->email}}</a></li>
					</ul>
				</div>
				<div class="span3">
					<h2 class="widget-title"><span>Live Chat</span></h2>
					<div class="sidebar-line"><span></span></div>
					<div class="livechat">
						{{$kontak->ym ? ymyahoo($kontak->ym) : ''}}
					</div>
					<div>
						<ul class="footer-social">
							@if(@$kontak->fb)
							<li><a href="{{url($kontak->fb)}}" title="Facebook" target="_blank"><i class="icon-facebook"></i></a></li>
							@endif
							@if(@$kontak->tw)
							<li><a href="{{url($kontak->tw)}}" title="Twitter" target="_blank"><i class="icon-twitter"></i></a></li>
							@endif
							@if(@$kontak->ig)
							<li><a href="{{url($kontak->ig)}}" title="Instagram" target="_blank"><i class="icon-instagram"></i></a></li>
							@endif
							@if(@$kontak->gp)
							<li><a href="{{url($kontak->gp)}}" title="Google Plus" target="_blank"><i class="icon-google-plus"></i></a></li>
							@endif
							@if(@$kontak->pt)
							<li><a href="{{url($kontak->pt)}}" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a></li>
							@endif
							@if(@$kontak->tl)
							<li><a href="{{url($kontak->tl)}}" title="Tumblr" target="_blank"><i class="icon-tumblr"></i></a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Start Copyright -->
	<div class="copyright">
		<div class="footer-menu left"></div>
		<div>&copy; {{date('Y')}} {{ Theme::place('title') }}.  Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a></div>
	</div>
	<!-- End Copyright -->
	<div class="wdttop">Scroll To Top</div>
</div>
{{pluginPowerup()}}
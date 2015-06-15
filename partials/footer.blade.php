<div class="container">
	<!-- Start Footer -->
	<footer class="footer-wrapper">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="span3">
					<h2 class="widget-title"><span>{{ Theme::place('title') }}</span></h2>
					<div class="sidebar-line"><span></span></div>
					<p>{{short_description($aboutUs[1]->isi,300)}} </p>
				</div>
				@foreach($tautan as $key=>$group)
				<div class="span3">
					<h2 class="widget-title"><span>{{$group->nama}}</span></h2>
					<div class="sidebar-line"><span></span></div>
					<ul class="contact-details">
					@foreach($quickLink as $link)
						@if($group->id == $link->tautanId)
						<li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
						@endif
					@endforeach
					</ul>
				</div>
				@endforeach
			</div>
			<!-- .row -->

			<div class="row-fluid">
				<div class="span6">
					<h2 class="widget-title"><span>Bank</span></h2>
					<div class="sidebar-line"><span></span></div>
					<div class="clients flexslider flex-direction-nav-on-top">
						<ul class="slides">
							<li>
								@foreach(list_banks() as $value)
								<div class="list-bank">
									<img src="{{bank_logo($value)}}" alt="{{$value->bankdefault->nama}}" />
								</div>
								@endforeach
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
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Start Copyright -->
	<div class="copyright">
		<div class="footer-menu left">
		</div>
		<div>&copy; {{date('Y')}} {{ Theme::place('title') }}.  Powered by <a href="http://jarvis-store.com" target="_blank">Jarvis Store</a></div>
	</div>
	<!-- End Copyright -->
	<div class="wdttop">Scroll To Top</div>
</div>
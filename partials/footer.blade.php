<div class="container">
	<!-- Start Footer -->
	<footer class="footer-wrapper">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="span3">
					<h2 class="widget-title"><span>{{ Theme::place('title') }}</span></h2>
					<div class="sidebar-line"><span></span></div>
					<p>{{shortDescription($aboutUs[1]->isi,300)}} </p>
				</div>
				@foreach($tautan as $key=>$group)
				<div class="span3">
					<h2 class="widget-title"><span>{{$group->nama}}</span></h2>
					<div class="sidebar-line"><span></span></div>
					<ul class="contact-details">
						@foreach($quickLink as $key=>$link)
							@if($group->id==$link->tautanId)
							<li>
								@if($link->halaman=='1')
								<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@elseif($link->halaman=='2')
								<a href={{"'".URL::to("blog/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@elseif($link->url=='1')
								<a href="{{strtolower($link->linkTo)}}">{{$link->nama}}</a>
								@else
								<a href="{{URL::to(strtolower($link->linkTo))}}">{{$link->nama}}</a>
								@endif
							</li>
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
								<?php
								$i=0;
								?>
								@foreach($bank as $value)
								<?php
								$i++;
								?>
								<div class="span4">
									<img style="" src="{{URL::to('img/'.$value->bankdefault->logo)}}" alt="" />
								</div>
								@if($i>3)
							</li>
							<li>
								<?php
								$i=0;
								?>
								@endif
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
						<li><i class="icon-phone"></i>{{$kontak->telepon}}</li>
						<li><i class="icon-envelope-alt"></i> <a href="mailto:support@yoursite.com">{{$kontak->email}}</a></li>
					</ul>
				</div>
				<div class="span3">
					<h2 class="widget-title"><span>Live Chat</span></h2>
					<div class="sidebar-line"><span></span></div>
					<div class="livechat">
						{{ymyahoo($kontak->ym)}}
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
		<div>&copy; {{date('Y')}} {{ Theme::place('title') }}.  Powered by <a href="http://jarvis-store.com">Jarvis Store</a> </div>
	</div>
	<!-- End Copyright -->
	<div class="wdttop">Scroll To Top</div>
</div>
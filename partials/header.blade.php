	<div class="container tophead">
		<div class="left span3">
			<ul class="social">
				@if(!empty($kontak->fb))
				<li><a title="Like us on Facebook" data-placement="bottom" data-toggle="tooltip" href="{{url($kontak->fb)}}"><i class="icon-facebook"></i></a>
				</li>
				@endif
				@if(!empty($kontak->tw))
				<li><a title="Follow us on Twitter" data-placement="bottom" data-toggle="tooltip" href="{{url($kontak->tw)}}"><i class="icon-twitter"></i></a>
				</li>
				@endif
				@if(!empty($kontak->gp))
				<li><a title="Circle us on Google Plus" data-placement="bottom" data-toggle="tooltip" href="{{url($kontak->gp)}}"><i class="icon-google-plus"></i></a>
				</li>
				@endif
				@if(!empty($kontak->pt))
				<li><a title="Pin it on Pinterest" data-placement="bottom" data-toggle="tooltip" href="{{url($kontak->pt)}}"><i class="icon-pinterest"></i></a>
				</li>
				@endif
				@if(!empty($kontak->ig))
				<li><a title="Follow us on Instagram" data-placement="bottom" data-toggle="tooltip" href="{{url($kontak->ig)}}"><i class="icon-instagram"></i></a>
				</li>
				@endif
				@if(!empty($kontak->tl))
				<li><a title="Tumblr" data-placement="bottom" data-toggle="tooltip" href="{{url($kontak->tl)}}"><i class="icon-tumblr"></i></a>
				</li>
				@endif
				@if(!empty($kontak->picmix))
				<li>
					<a title="Picmix" data-placement="bottom" data-toggle="tooltip" href="{{url($kontak->picmix)}}">
						<img src="https://s3-ap-southeast-1.amazonaws.com/cdn2.jarvis-store.com/blogs/event/icon-picmix.png" style="height: 25px;margin-top: -5px;">
					</a>
				</li>
				@endif
			</ul>
		</div>
		<div class="right">
			<div id="wdt-links">
				<ul>
					<li class="dropdown hover cart" id="shoppingcartplace"> {{ shopping_cart() }} </li>
					@if ( !is_login() )
					<li class="register">{{HTML::link('register', 'Daftar')."<i class='icon-user'></i>"}}</li>
					<li>{{HTML::link('member', 'Login')."<i class='icon-unlock-alt'></i>"}}</li>
					
					@else
					<li class="register">{{HTML::link('member', user()->nama)."<i class='icon-user'></i>"}}</li>
					<li>{{HTML::link('logout', 'Logout')."<i class='icon-signout'></i>"}}</li>
					@endif 
				</ul>
			</div>
		</div>
	</div>
	<!-- Start Header Bar -->
	<div class="container header-wrap make-bg">
		<div class="left brand">
			<a href="{{url('home')}}">
				{{HTML::image(logo_image_url(),'logo '.Theme::place('title'),array('style'=>'max-height:120px'))}}
			</a>
			<!-- <h1><a href="{{url('home')}}">Bistro</a></h1>-->
		</div>
		<div class="right">
			<div class="searchbar span3">
				<form action="{{url('search')}}" class="form-search" method="post">
					<input type="text" placeholder="Search" data-provide="typeahead" name="search" required >
				</form>
			</div>
		</div>
	</div>
	<div class="container make-bg">
		<div class="navbar">
			<div class="container">
				<div class="navbar-inner">
					<button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<div class="nav-collapse collapse">
						<ul class="nav pull-left">
							<li class="active"><a href="{{url('home')}}">Home</a></li>
                    		@if(count(category_menu()) > 0)
							@foreach(category_menu() as $key=>$menu) 
								@if($menu->parent=='0')
								<li class="dropdown dropdown-hover">
									<a class="dropdown-toggle" href="{{category_url($menu)}}">{{$menu->nama}}
										@if(count($menu->anak) >= 1)
										<span class="caret"></span>
										@endif
									</a>
									@if(count($menu->anak) >= 1)
									<div class="dropdown-menu span6">
										<div class="row"> 
										@foreach($menu->anak as $submenu1) 
											@if($submenu1->parent == $menu->id) 
											<div class="span2">
												<ul class="mega-menu-links">
													<li><a href="{{category_url($submenu1)}}">{{$submenu1->nama}}</a></li>
													@foreach($submenu1->anak as $key1=>$submenu2) 
													@if($submenu2->parent == $submenu1->id)
													<li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
													@endif 
													@endforeach 
												</ul>
											@endif 
											</div> 
										@endforeach 
										</div>
									</div>
									@endif
								</li>
								@endif 
							@endforeach 
							@endif
						</ul>
						<ul class="nav pull-right">
							<li class="dropdown dropdown-hover"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">User CP <span class="caret"></span></a>
								<div class="dropdown-menu span4">
									<div class="row">
										<div class="span2">
											<p>{{ Theme::place('title') }}</p>
											<p><i class="icon-home"></i> {{$kontak->alamat}}</p>
											<p><i class="icon-phone"></i> {{$kontak->telepon}}</p>
											<p><i class="icon-envelope"></i> {{$kontak->email}}</p>
										</div>
										<div class="span2">
											<ul class="mega-menu-links">
												<li><a href="{{url('member')}}">My Account</a></li>
												<li><a href="{{url('member')}}">History Order</a></li>
												<li><a href="{{url('konfirmasiorder')}}">Konfirmasi Pembayaran</a></li>
											</ul>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
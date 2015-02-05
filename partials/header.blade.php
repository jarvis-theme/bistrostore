    <!-- Start Top Bar -->
    <div class="container tophead">
        <div class="left span3">
            <ul class="social">
                <li><a title="Like us on Facebook" data-placement="bottom" data-toggle="tooltip" href="#"><i class="icon-facebook"></i></a>
                </li>
                <li><a title="Follow us on Twitter" data-placement="bottom" data-toggle="tooltip" href="#"><i class="icon-twitter"></i></a>
                </li>
                <li><a title="Circle us on Google Plus" data-placement="bottom" data-toggle="tooltip" href="#"><i class="icon-google-plus"></i></a>
                </li>
                <li><a title="Pin it on Pinterest" data-placement="bottom" data-toggle="tooltip" href="#"><i class="icon-pinterest"></i></a>
                </li>
            </ul>
        </div>
        <div class="right">
            <div id="wdt-links">
                <ul>
                    <li class="dropdown hover cart" id="shoppingcartplace"> {{$ShoppingCart}} </li> 
                    @if ( ! Sentry::check())
                    <li class="register">{{HTML::link('register', 'Daftar')."<i class=icon-user></i>"}}</li>
                    <li>{{HTML::link('member', 'Login')."<i class=icon-unlock-alt></i>"}}</li> 
                    
                    @else
                    <li class="register">{{HTML::link('member', Sentry::getUser()->nama)."<i class=icon-user></i>"}}</li>
                    <li>{{HTML::link('logout', 'Logout')."<i class=icon-signout></i>"}}</li> 
                    @endif 
                </ul>
            </div>
        </div>
    </div>
    <!-- END Top Bar -->
    <!-- Start Header Bar -->
    <div class="container header-wrap make-bg">
        <div class="left brand">
            <a href="{{URL::to('home')}}"><img style="max-height:120px" src="{{URL::to(getPrefixDomain().'/galeri/'.$toko->logo)}}" alt="" /></a>
            <!-- <h1><a href="index.html">Bistro</a></h1>-->
       </div>
        <div class="right">
            <div class="searchbar span3">
                <form action="{{URL::to('search')}}" class="form-search" method='post'>
                    <input type="text" placeholder="Search" data-provide="typeahead">
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
                            <li class="active"><a href="{{URL::to('home')}}">Home</a>
                            </li>
                            <!-- NANTI DIJADIIN CATEG LIST -->
                            @if($katMenu!='1') 
                                @foreach($katMenu as $key=>$menu) 
                                    @if($menu->parent=='0')
                                    <li class="dropdown dropdown-hover"> <a class="dropdown-toggle" href="{{slugKategori($menu)}}">{{$menu->nama}}<span class="caret"></span></a>
                                        <!-- Submenu -->
                                        <div class="dropdown-menu span6">
                                            <div class="row"> 
                                            @foreach($anMenu as $bug) 
                                                @if($bug->parent==$menu->id) 
                                                    @foreach($anMenu as $key1=>$submenu) 
                                                        @if($submenu->parent==$menu->id)
                                                            <div class="span2">
                                                                <ul class="mega-menu-links">
                                                                    <li><a href="{{slugKategori($submenu)}}">{{$submenu->nama}}</a></li>
                                                                </ul>
                                                            </div> 
                                                        @endif 
                                                    @endforeach 
                                                @endif 
                                            @endforeach 
                                            </div>
                                        </div>
                                        <!-- End submenu -->
                                    </li>
                                    @endif 
                                @endforeach 
                            @endif 
                        </ul>
                        <!-- SAMPAI SINI -->
                        <ul class="nav pull-right">
                            <li class="dropdown dropdown-hover"> <a class="dropdown-toggle" href="#" data-toggle="dropdown">User CP <span class="caret"></span></a>
                                <div class="dropdown-menu span4">
                                    <div class="row">
                                        <div class="span2">
                                            <p>{{ Theme::place('title') }}</p>
                                            <p><i class="icon-home"></i>{{$kontak->alamat}}</p>
                                            <p><i class="icon-phone"></i>{{$kontak->telepon}}</p>
                                            <p><i class="icon-envelope"></i>{{$kontak->email}}</p>
                                        </div>
                                        <div class="span2">
                                            <ul class="mega-menu-links">
                                                <li><a href="{{URL::to('member')}}">My Account</a></li>
                                                <li><a href="{{URL::to('member')}}">History Order</a></li>
                                                <li><a href="{{URL::to('konfirmasiorder')}}">Konfirmasi Pembayaran</a></li>
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
    <!-- END Header Bar -->
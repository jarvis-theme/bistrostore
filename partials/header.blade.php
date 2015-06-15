    <!-- Start Top Bar -->
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
            </ul>
        </div>
        <div class="right">
            <div id="wdt-links">
                <ul>
                    <li class="dropdown hover cart" id="shoppingcartplace"> {{$ShoppingCart}} </li> 
                    @if ( !is_login() )
                    <li class="register">{{HTML::link('register', 'Daftar')."<i class=icon-user></i>"}}</li>
                    <li>{{HTML::link('member', 'Login')."<i class=icon-unlock-alt></i>"}}</li> 
                    
                    @else
                    <li class="register">{{HTML::link('member', user()->nama)."<i class=icon-user></i>"}}</li>
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
            <a href="{{url('home')}}">
                {{HTML::image(logo_image_url(),'logo',array('style'=>'max-height:120px'))}}
            </a>
            <!-- <h1><a href="index.html">Bistro</a></h1>-->
       </div>
        <div class="right">
            <div class="searchbar span3">
                <form action="{{url('search')}}" class="form-search" method='post'>
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
                            <li class="active"><a href="{{url('home')}}">Home</a>
                            </li>
                            <!-- NANTI DIJADIIN CATEG LIST -->
                            @if($katMenu != '1') 
                                @foreach(category_menu() as $key=>$menu) 
                                    @if($menu->parent=='0')
                                    <li class="dropdown dropdown-hover">
                                        <a class="dropdown-toggle" href="{{category_url($menu)}}">{{$menu->nama}}
                                        @if(count($menu->anak) >= 1)
                                            <span class="caret"></span>
                                        @endif
                                        </a>
                                        @if(count($menu->anak) >= 1)
                                        <!-- Submenu -->
                                        <div class="dropdown-menu span6">
                                            <div class="row"> 
                                            @foreach(list_category() as $submenu1) 
                                                @if($submenu1->parent == $menu->id) 
                                                    @foreach(list_category() as $key1=>$submenu2) 
                                                        @if($submenu2->parent == $menu->id)
                                                            <div class="span2">
                                                                <ul class="mega-menu-links">
                                                                    <li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
                                                                </ul>
                                                            </div> 
                                                        @endif 
                                                    @endforeach 
                                                @endif 
                                            @endforeach 
                                            </div>
                                        </div>
                                        <!-- End submenu -->
                                        @endif
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
    <!-- END Header Bar -->
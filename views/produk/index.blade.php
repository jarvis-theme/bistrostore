<div class="row">
    <div class="span9 post">
        <h2 class="page-header"><span>{{$name}}</span></h2>
        <div class="sidebar-line"><span></span>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <section id="wrap-cat">
                    <header class="wrap-header">
                        <div class="display">
                            <b>Display:</b>
                            <a id="gridbutton" class="grid grid-icon" data-toggle="tooltip" data-placement="top" data-original-title="View Grid Style" style="cursor:pointer;">Grid View</a>
                            <a id="listbutton" class="list list-icon" data-toggle="tooltip" data-placement="top" data-original-title="View List Style" style="cursor:pointer;">List View</a>
                        </div>
                        <div class="limit">
                            <b>Show:</b>
                            <select id="show" data-rel="{{URL::current()}}">
                                <option value="10" {{Input::get('show')==10?'selected="selected"':''}}>10</option>
                                <option value="20" {{Input::get('show')==20?'selected="selected"':''}}>20</option>
                            </select>
                        </div>
                    </header>
                </section>
            </div>
        </div>
        <div id="listview" style="display:none;">
            <section id="product-list"> 
            @foreach(list_product(null, @$category, @$collection) as $myproduk)
                <div class="row-fluid">
                    <div class="span3">
                        <div class="wdt-product">
                            <div class="wdt-products-wrapper">
                                <div class="wdt-product active show">
                                    <a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
                                        {{HTML::image(product_image_url($myproduk->gambar1), $myproduk->nama, array('alt' => ($myproduk->nama), 'title' => ($myproduk->nama), 'style'=>'min-height:199px'))}}
                                    </a>
                                    <h4><a href="{{product_url($myproduk)}}" title="Title Here">{{$myproduk->nama}}</a></h4>
                                    <div class="wdt-overlay">
                                        <span class="amount">
                                        @if(@$checkouttype!=2)
                                            {{price($myproduk->hargaJual)}}
                                        @else
                                            Lihat
                                        @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span7 grid-desc">
                        <div class="grid-title-header">
                            <a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
                                <h4>{{$myproduk->nama}}</h4>
                            </a>
                        </div>
                        <p>{{short_description($myproduk->deskripsi,100)}}</p>
                    </div>
                    <div class="span2 list-button">
                        <a href="{{product_url($myproduk)}}" class="btn btn-general" title="Add to Cart"><span><i class="icon-shopping-cart"></i> Lihat</span></a>
                    </div>
                </div> 
            @endforeach 
            </section>
        </div>
        <div id="gridview">
            <div class="row-fluid">
            {{-- */ $count = 0 /* --}}
            @foreach(list_product(null, @$category, @$collection) as $myproduk)
                {{-- */ $count++ /* --}}
                @if($count==4) 
                </div>
                <div class="row-fluid">
                {{-- */ $count = 1 /* --}}
                @endif
                <div class="span3">
                    <div class="wdt-product">
                        <div class="wdt-products-wrapper">
                            <div class="wdt-product active show">
                                <a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">
                                    {{HTML::image(product_image_url($myproduk->gambar1), $myproduk->nama, array('alt' => '($myproduk->nama)', 'title' => ($myproduk->nama), 'style'=>'min-height:199px'))}}
                                </a>
                                <h4><a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}">{{$myproduk->nama}}</a></h4>
                                <div class="wdt-pricing">
                                    <span class="amount">{{price($myproduk->hargaJual)}}</span>
                                </div>
                                <div class="wdt-cart">
                                    <div class="wdt-cart-bar">
                                        <a href="{{product_url($myproduk)}}" title="{{$myproduk->nama}}"><i class="icon-shopping-cart"></i> Lihat</a>
                                    </div>
                                </div>
                                <div class="wdt-overlay">
                                    <span class="amount">
                                    <a href="{{product_url($myproduk)}}">
                                    @if(@$checkouttype!=2)
                                        {{price($myproduk->hargaJual)}}
                                    @else
                                        Lihat
                                    @endif
                                    </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach 
            </div>
        </div>
        <div class="pagination pagination-left">
            {{list_product(null, @$category, @$collection)->links()}}
        </div>
    </div>
    <!-- end post span -->
    <div class="span3 sidebar">
        <div class="widget">
            <h2 class="widget-title"><span>Site Categories</span></h2>
            <div class="sidebar-line"><span></span></div>
            <ul class="bullet_arrow2 categories">
            @if(count(list_category()) > 0)
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
            @endif
            </ul>
        </div>
        <div class="widget">
            @foreach(vertical_banner() as $item)
            <div>
                <a href="{{url($item->url)}}">
                    {{HTML::image(banner_image_url($item->gambar), 'banner', array('class'=>'box-shadow', 'width'=>'220px', 'style'=>'display: block'))}}
                </a>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
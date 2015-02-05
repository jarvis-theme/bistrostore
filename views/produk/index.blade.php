<div class="row">
    <div class="span9 post">
        <h2 class="page-header"><span>{{$name}}</span></h2>
        <div class="sidebar-line"><span></span>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <section id="wrap-cat">
                    <header class="wrap-header">
                        <div class="display"> <b>Display:</b> <a id="gridbutton" class="grid grid-icon" data-toggle="tooltip" data-placement="top" data-original-title="View Grid Style" style="cursor:pointer;">Grid View</a> <a id="listbutton" class="list list-icon" data-toggle="tooltip" data-placement="top" data-original-title="View List Style" style="cursor:pointer;">List View</a> </div>
                        <div class="limit"> <b>Show:</b>
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
            @foreach($produk as $myproduk)
                <div class="row-fluid">
                    <div class="span3">
                        <div class="wdt-product">
                            <div class="wdt-products-wrapper">
                                <div class="wdt-product active show">
                                    <a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">
                                        {{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array('alt' => ($myproduk->nama), 'title' => ($myproduk->nama)))}}
                                    </a>
                                    <h4><a href="{{slugProduk($myproduk)}}" title="Title Here">{{$myproduk->nama}}</a></h4>
                                    <div class="wdt-overlay">
                                        <span class="amount">
                                        @if(@$checkouttype!=2)
                                            {{jadiRUpiah($myproduk->hargaJual)}}
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
                        <div class="grid-title-header"> <a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}"><h4>{{$myproduk->nama}}</h4></a> </div>
                        <p>{{shortDescription($myproduk->deskripsi,100)}}</p>
                    </div>
                    <div class="span2 list-button"> <a href="{{slugProduk($myproduk)}}" class="btn btn-general" title="Add to Cart"><span><i class="icon-shopping-cart"></i> Lihat</span></a> </div>
                </div> 
            @endforeach 
            </section>
        </div>
        <div id="gridview">
            <div class="row-fluid">
            <?php $count=0; ?> 
            @foreach($produk as $myproduk)
                <?php $count++; ?> 
                @if($count==4) 
                </div>
            <div class="row-fluid">
                <?php $count=1; ?> 
                @endif
                <div class="span3">
                    <div class="wdt-product">
                        <div class="wdt-products-wrapper">
                            <div class="wdt-product active show">
                                <a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">
                                    {{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array('alt' => ($myproduk->nama), 'title' => ($myproduk->nama)))}}
                                </a>
                                <h4><a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}">{{$myproduk->nama}}</a></h4>
                                <div class="wdt-pricing"> <span class="amount">{{jadiRUpiah($myproduk->hargaJual)}}</span> </div>
                                <div class="wdt-cart">
                                    <div class="wdt-cart-bar"> <a href="{{slugProduk($myproduk)}}" title="{{$myproduk->nama}}"><i class="icon-shopping-cart"></i> Lihat</a> </div>
                                </div>
                                <div class="wdt-overlay">
                                    <span class="amount">
                                    @if(@$checkouttype!=2)
                                        {{jadiRUpiah($myproduk->hargaJual)}}
                                    @else
                                        Lihat
                                    @endif
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
            {{$produk->links()}}
        </div>
    </div>
    <!-- end post span -->
    <div class="span3 sidebar">
        <div class="widget">
            <h2 class="widget-title"><span>Site Categories</span></h2>
            <div class="sidebar-line"><span></span>
            </div>
            <ul class="bullet_arrow2 categories">
            @foreach($kategori as $key=>$menu)
                <li>
                @if($menu->parent=='0') 
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
                @endif 
                </li>
            @endforeach 
            </ul>
        </div>
        <div class="widget">
        @foreach(getBanner(1) as $item)
            <div><a href="{{URL::to($item->url)}}"><img src="{{URL::to(getPrefixDomain().'/galeri/'.$item->gambar)}}" style="display:block" class="box-shadow" width="220px"/></a>
            </div>
            <br>
        @endforeach
        </div>
    </div>
</div>
<script>
    $("#gridbutton").click(function() {
        $("#listview").hide();
        $("#gridview").show('fast');
    });
    $("#listbutton").click(function() {
        $("#gridview").hide();
        $("#listview").show('fast');
    });
</script>
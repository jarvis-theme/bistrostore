define(['jquery','kreaturamedia','transitions','flexslider','jflickrfeed','jq_transit','elastislide','modernizr','imagezoom','jq_easing'], function($,layerSlider)
{
    return new function(){
        var self = this;
        self.run = function(){
            $(document).ready(function() {
                $('#layerslider').layerSlider({
                    skinsPath : dirTema+'/assets/css/',
                    skin : 'fullwidth',
                    thumbnailNavigation : 'hover',
                    hoverPrevNext : true,
                    autoPlayVideos          : false,
                    responsive : true,
                    responsiveUnder : 1170,
                    sublayerContainer : 1170,
                    showCircleTimer     : false,
                });

                $('.main-slider').flexslider({
                    slideshow: false
                });

                $('.typeahead').typeahead();

                $('.for-mans, .for-womans, .clients').flexslider({
                    animation: 'slide',
                    slideshow: true,
                    animationLoop: true,
                    controlNav: false
                });

                $('.recent-blog, .testimonials').flexslider({
                    animation: 'slide',
                    slideshow: false,
                    animationLoop: false,
                    controlNav: false
                });

                $('#wdtTab a:first').tab('show');

                $(".hover").hover(
                    function () {
                        $("ul.topcart").stop().slideDown(500);
                    }, 
                    function () {
                        $("ul.topcart").stop().slideUp(500);
                    }
                );

                $('.social, .store-categories, .display').tooltip({
                    selector: "a[data-toggle=tooltip]"
                });

                $('.social, .store-categories, .display').tooltip();
            });


            $(window).scroll(function(){
                if ($(this).scrollTop() > 1) {
                    $('.wdttop').css({bottom:"25px"});
                } else {
                    $('.wdttop').css({bottom:"-100px"});
                }
            });

            $('.wdttop').click(function(e){
                e.preventDefault();
                $('html, body').animate({scrollTop: '0px'}, 800);
            });

            $("#gridbutton").click(function() {
                $("#listview").hide();
                $("#gridview").show('fast');
            });
            $("#listbutton").click(function() {
                $("#gridview").hide();
                $("#listview").show('fast');
            });

            $(document).ready(function() {
                $(document).find('.wdt-product').each(function(i, widget) {
                    widget = $(widget);
                    
                    if(!widget.hasClass('active')) {
                        widget.addClass('active');
                        wdtGallery(widget);
                    }
                    
                });
            });

            window.onload = function() {
                var link = document.URL;
                var appenddata = '<div class="fb-comments" data-href="' + link + '" data-width="750" data-numposts="5" data-colorscheme="light"></div>';
                $("#tab-review").html(appenddata);
            }
        };

        var wdtGallery = function(widget) {
            widget.find('.wdt-product').each(function(i, img) {
                img = $(img);
                
                img.mouseenter(function() {
                    widget.attr('data-stop', 1);
                    img.addClass('hover');
                });
                
                img.mouseleave(function() {
                    widget.attr('data-stop', 0);
                    img.removeClass('hover');
                });     
            });
        };
    }
});
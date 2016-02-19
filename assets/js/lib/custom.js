jQuery(document).ready(function() {
	/*$('#layerslider').layerSlider({
		// skinsPath       : '../css/',

		skinsPath          : '{{url::to(dirTemaToko()."bistrostore/assets/css/")}}/',
		skin               : 'fullwidth',
		thumbnailNavigation: 'hover',
		hoverPrevNext      : true,
		autoPlayVideos     : false,
		responsive         : true,
		responsiveUnder    : 1170,
		sublayerContainer  : 1170,
		showCircleTimer    : false,
	});*/
	
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
  
	$("#countdown").countdown({
		date: "23 december 2013 23:59:59", // add your date here.
		format: "on"
	},
	function() { 
		//alert("done!") 
	});
	
	$(function () {
		$('#wdtTab a:first').tab('show');
	});

	$(".hover").hover(
		function () {
			$("ul.topcart").slideDown(500);
		}, 
		function () {
			$("ul.topcart").slideUp(500);
		}
	);

    $('.social, .store-categories, .display').tooltip({
      selector: "a[data-toggle=tooltip]"
    });

	$('.social, .store-categories, .display').tooltip();
});

jQuery(window).scroll(function(){
	if (jQuery(this).scrollTop() > 1) {
		jQuery('.wdttop').css({bottom:"25px"});
	} else {
		jQuery('.wdttop').css({bottom:"-100px"});
	}
});

jQuery('.wdttop').click(function(e){
	e.preventDefault();
	jQuery('html, body').animate({scrollTop: '0px'}, 800);
});

jQuery(document).ready(function() {
	jQuery(document).find('.wdt-product').each(function(i, widget) {
		widget = jQuery(widget);
		
		if(!widget.hasClass('active')) {
			widget.addClass('active');
			wdtGallery(widget);
		}
		
	});
});

var wdtGallery = function(widget) {
	widget.find('.wdt-product').each(function(i, img) {
		img = jQuery(img);
		
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

$("#gridbutton").click(function() {
    $("#listview").hide();
    $("#gridview").show('fast');
});
$("#listbutton").click(function() {
    $("#gridview").hide();
    $("#listview").show('fast');
});
window.onload = function() {
	var link = document.URL;
	var appenddata = '<div class="fb-comments" data-href="' + link + '" data-width="750" data-numposts="5" data-colorscheme="light"></div>';
	$("#tab-review").html(appenddata);
}
$(function(){
	//demo4   standard mode
	var carsousel = $('#demo4carousel').elastislide({start:0,minItems:4,
	    onClick:function( el, pos, evt ) {
	        el.siblings().removeClass("active");
	        el.addClass("active");
	        carsousel.setCurrent( pos );
	        evt.preventDefault();
	        // for imagezoom to change image 
	        var demo4obj = $('#demo4').data('imagezoom');
	        demo4obj.changeImage(el.find('img').attr('src'),el.find('img').data('largeimg'));
	    },
	    onReady:function(){
	        //init imagezoom with many options
	        $('#demo4').ImageZoom({type:'standard',zoomSize:[480,360],bigImageSrc:"http://bistrostore.jstore.co/bistrostore-upload/produk/2.gif",offset:[10,-4],zoomViewerClass:'standardViewer',onShow:function(obj){obj.$viewer.hide().fadeIn(500);},onHide:function(obj){obj.$viewer.show().fadeOut(500);}});
	        
	        $('#demo4carousel li:eq(0)').addClass('active');
	        
	        // change zoomview size when window resize
	        $(window).resize(function(){
	            var demo4obj = $('#demo4').data('imagezoom');
	            winWidth = $(window).width();
	            if(winWidth>900)
	            {
	                demo4obj.changeZoomSize(480,360);
	            }
	            else
	            {
	                demo4obj.changeZoomSize( winWidth*0.4,winWidth*0.4*0.625);
	            }
	        });
	        
	    }
	});
});
var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=002",
    waitSeconds : 60,
	shim: {
		"jq_ui" : {
			deps : ['jquery']
		},
		"noty" : {
			deps : ['jquery']
		},
		"kreaturamedia" : {
			deps : ['jquery','transitions']
		},
		"flexslider" : {
			deps : ['jquery']
		},
		"jflickrfeed" : {
			deps : ['jquery']
		},
		"bootstrap" : {
			deps : ['jquery']
		},
		"jq_transit" : {
			deps : ['jquery']
		},
		"elastislide" : {
			deps : ['jquery']
		},
		"imagezoom" : {
			deps : ['jquery']
		},
		"jq_easing" : {
			deps : ['jquery']
		}
	},

	paths: {
		// LIBRARY
		jquery 			: dirTema+'/assets/js/lib/jquery-1.8.3.min',
		bootstrap		: dirTema+'/assets/js/lib/bootstrap.min',
		html5shiv		: dirTema+'/assets/js/lib/html5shiv.min',
		jflickrfeed		: dirTema+'/assets/js/lib/jflickrfeed.min',
		jq_easing		: dirTema+'/assets/js/lib/jquery-easing-1.3',
		jq_transit		: dirTema+'/assets/js/lib/jquery-transit-modified',
		elastislide		: dirTema+'/assets/js/lib/jquery.elastislide',
		flexslider		: dirTema+'/assets/js/lib/jquery.flexslider.min',
		imagezoom		: dirTema+'/assets/js/lib/jquery.imagezoom.min',
		kreaturamedia	: dirTema+'/assets/js/lib/layerslider.kreaturamedia.jquery',
		transitions		: dirTema+'/assets/js/lib/layerslider.transitions',
		modernizr		: dirTema+'/assets/js/lib/modernizr.custom.17475',

		// MAIN LIBRARY
		router          : 'js/router',
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',

		// CONTROLLER
		main            : dirTema+'/assets/js/controller/default',
	}
});
require([
	'router',
	'main',
	'cart',
	'bootstrap'
], function(router,main,cart,b)
{
	main.run();
	router.run();
	cart.run();
});
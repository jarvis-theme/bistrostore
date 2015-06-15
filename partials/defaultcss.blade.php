	<!-- Default css-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,700italic,800" rel="stylesheet" type="text/css">  
	{{generate_theme_css('bistrostore/assets/css/bootstrap.css')}}
	{{generate_theme_css('bistrostore/assets/css/media.css')}}
	{{generate_theme_css('bistrostore/assets/css/flexslider.css')}}
	{{generate_theme_css('bistrostore/assets/css/style.css')}}
	{{generate_theme_css('bistrostore/assets/css/layerslider.css')}}

	<!-- Other -->
	<script type="text/javascript">
		// Add Google Font name here
		WebFontConfig = { google: { families: [ 'Bangers', 'Lato' ] } };
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>

	<style type="text/css">
		/* Add Google Font name here */
		.wf-active {font-family: 'Lato',serif; font-size: 14px;}
		.wf-active .logo {font-family: 'Bangers', serif;}
	</style>

	{{favicon()}}
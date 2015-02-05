<!DOCTYPE html>
<html lang="en">
	<head>
		{{ Theme::partial('seostuff') }}	
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		{{ Theme::partial('defaultcss') }}	
		{{ Theme::asset()->styles() }}	
	</head>
	<body>
		{{ Theme::partial('header') }}	
		<div class="container make-bg">
			{{ Theme::place('content') }}	
		</div>
		{{ Theme::partial('footer') }}	
		{{ Theme::partial('defaultjs') }}	
		{{ Theme::asset()->scripts() }}	
		{{ Theme::partial('analytic') }}	
	</body>
</html>
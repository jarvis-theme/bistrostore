<!DOCTYPE html>
<html lang="en">
	<head>
		{{ Theme::partial('seostuff') }}	
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
		{{ Theme::partial('defaultcss') }}	
		{{ Theme::asset()->styles() }}	
		{{ Theme::partial('defaultjs') }}	
	</head>
	<body>
		{{ Theme::partial('header') }}	
		<div class="container make-bg">
			{{ Theme::partial('slider') }}	
			<br>
			{{ Theme::place('content') }}	
		</div>
		{{ Theme::partial('footer') }}	
		{{ Theme::asset()->scripts() }}	
		{{ Theme::partial('analytic') }}	
	</body>
</html>
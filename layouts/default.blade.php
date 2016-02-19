<!DOCTYPE html>
<html lang="en">
	<head>
		{{ Theme::partial('seostuff') }}
		<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
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
		{{ Theme::partial('analytic') }}
	</body>
</html>
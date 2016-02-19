<!-- ==================== -->
<!-- Testimonial template -->
<!-- ==================== -->
<div class="row">
	<div class="span12 post">
		<h2 class="widget-title"><span>Testimonial</span></h2>
		<div class="sidebar-line"><span></span></div>
		@foreach(list_testimonial() as $value)
			<h2>{{$value->nama}}</h2>
			<cite title>{{date("d M Y", strtotime($value->created_at))}}</cite>
			{{$value->isi}}
		@endforeach
	</div>
</div>
@if(Session::has('msg1'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, Testimonial anda sudah terkirim.</p>
</div>
@endif
@if(Session::has('msg2'))
<div class="success" id='message' style='display:none'>
	<p>404</p>
</div>
@endif

<!-- ================= -->
<!-- Testimonial index -->
<!-- ================= -->
<div class="row">
	<div class="span8 post">
		<h2 class="widget-title"><span>Testimonial</span></h2>
		<div class="sidebar-line"><span></span></div>

		@foreach(list_testimonial() as $key=>$value)
		<h2>{{$value->nama}}</h2>
		<cite title>{{date("d M Y", strtotime($value->updated_at))}}</cite> ~
		{{$value->isi}}
		@endforeach
	</div>

	<div class="span4 sidebar">
		<div class="widget">
			<h2 class="widget-title"><span>Write Testimoni</span></h2>
			<div class="sidebar-line"><span></span></div>
			<div class="row-fluid">
				<form class="signin-form" action="{{URL::to('testimoni')}}" method="post">
					<input class="input-block-level" name="nama" type="text" placeholder="Enter your name"/>
					<textarea class="input-block-level" name="testimonial" id="field_05" placeholder="write your testimoni here"></textarea>
					<button class="btn btn-medium btn-general input-block-level" type="submit">Send testimoni</button>
				</form>
			</div>
		</div>
	</div>
</div>
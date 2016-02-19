<!-- ============ -->
<!-- Contact page -->
<!-- ============ -->
<div class="row">
	<div class="span12 post">
		<div class="row-fluid">
			<div class="span12">
				@if($kontak->lat!='0' || $kontak->lng!='0')
					<iframe width="1170" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{$kontak->lat}},{{$kontak->lng}}&amp;aq=&amp;sll={{$kontak->lat}},{{$kontak->lng}}&amp;sspn={{$kontak->lat}},{{$kontak->lng}}&amp;ie=UTF8&amp;t=m&amp;z=15&amp;output=embed"></iframe><br />
					<div class="googlemap" id="googlemap1" data-center="{{ $kontak->alamat }}" data-zoom="12"></div>
				@endif
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6">
				<p>{{$kontak->alamat}}</p>
				<p>
					<strong>Telepon</strong>: 
					@if(empty($kontak->telepon) && empty($kontak->hp))
					-
					@elseif(!empty($kontak->telepon) && empty($kontak->hp))
					{{$kontak->telepon}}
					@elseif(empty($kontak->telepon) && !empty($kontak->hp))
					{{$kontak->hp}}
					@else
					{{$kontak->telepon.' - '.$kontak->hp}}
					@endif
				</p>
				<p><strong>E-mail</strong>: {{$kontak->email}}</p>
			</div>
			<div class="span6">
				<h2>Send us message</h2>
				<form class="signin-form" action="{{url('kontak')}}" method="post">
					<input class="input-block-level" name="namaKontak" type="text" placeholder="Name" required />
					<input class="input-block-level" name="emailKontak" placeholder="Email" type="email" required />
					<textarea name="messageKontak" placeholder="Your message here" required></textarea>
					<button class="btn btn-medium btn-general input-block-level" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
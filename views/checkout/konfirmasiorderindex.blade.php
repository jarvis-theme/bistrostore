@if(Session::has('message'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, kode order anda tidak ditemukan.</p>					
</div>		
@endif

<div class="row">
	<div class="span12 post">
		<div class="row-fluid">
			<div class="span12">
				<h2 class="widget-title"><span>Konfirmasi Order</span></h2>
				<div class="sidebar-line"><span></span></div>
				{{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'signin-form'))}}
					<div class="span6">
						<input class="input-block-level" name="kodeorder" type="text" placeholder="Order ID" />
					</div>
					<div class="span2">
						<button class="btn btn-medium btn-general input-block-level" type="submit">Search Code</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
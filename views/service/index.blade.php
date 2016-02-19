<!-- ======= -->
<!-- Service -->
<!-- ======= -->
<div class="row">
	<div class="span12 post">
		<div class="row-fluid">
			<div class="span12">
				<!-- <h2 class="page-header">Service</h2> -->
				<div class="sidebar-line"><span></span></div>
				<div class="accordion" id="checkout">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout" href="#collapseOne">
								<h3>Kebijakan Layanan</h3>
							</a>
						</div>
						<div id="collapseOne" class="accordion-body collapse in">
							<div class="accordion-inner">
								{{$service->tos}}
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout" href="#collapseTwo">
								<h3>Kebijakan Pengembalian</h3>
							</a>
						</div>
						<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner">
								{{$service->refund}}
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout" href="#collapseThree">
								<h3>Kebijakan Privasi</h3>
							</a>
						</div>
						<div id="collapseThree" class="accordion-body collapse">
							<div class="accordion-inner">
								{{$service->privacy}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
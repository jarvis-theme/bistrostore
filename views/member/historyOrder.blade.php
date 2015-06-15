<!-- ================== -->
<!-- History order Page -->
<!-- ================== -->
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span9">
				<h2>History Transaksi</h2>
			</div>
		</div>
		<div class="tab-content">
			<div class="tab-pane active" id="step1">
				<div class="row-fluid">
					<div class="span12">
						@if($order->count()>0)
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="15%">ID Order</th>
									<th width="15%">Tanggal Order</th>
									<th width="30%">Detail Order</th>
									<th width="20%">Total Order</th>
									<th width="10%">No. Resi</th>
									<th width="5%">Status</th>
									<th width="5%"></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($order as $item)
								<tr>
									<td>{{prefixOrder()}}{{$item->kodeOrder}}</td>
									<td>{{waktu($item->tanggalOrder)}}</td>
									<td>
										<ul>
										@foreach ($item->detailorder as $detail)
											<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
										@endforeach
										</ul>
									</td>
									<td>{{ price($item->total)}}</td>
									<td>{{ $item->noResi}}</td>
									<td>
										@if($item->status==0)
										<span class="label label-warning">Pending</span>
										@elseif($item->status==1)
										<span class="label label-important">Konfirmasi diterima</span>
										@elseif($item->status==2)
										<span class="label label-info">Pembayaran diterima</span>
										@elseif($item->status==3)
										<span class="label label-success">Terkirim</span>
										@elseif($item->status==4)
										<span class="label label-default">Batal</span>
										@endif
									</td>
									<td>
										<a href="{{url('konfirmasiorder/'.$item->id)}}" class="btn btn-primary">Konfirmasi Pembayaran</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@else
						<center><h4>Daftar order anda masih kosong.</h4></center>
						@endif
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
</div>

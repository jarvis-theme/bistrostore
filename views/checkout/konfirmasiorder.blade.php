<div class="row">
	<div class="span12 post">
		<div class="row-fluid">
			<div class="span12">
				<h2 class="page-header">Konfirmasi Pembayaran</h2>
				<div class="sidebar-line"><span></span></div>
				<table class="table wishlist table-hover table-bordered">
					<thead>
						<tr>
							<th align="center">Kode Order</th>
							<th align="center">Tanggal Order</th>
							<th align="center" class="hidden-phone">Order</th>
							<th align="center" class="hidden-phone">Jumlah</th>
							@if($checkouttype != 1)
							<th align="center">Jumlah yg belum di bayar</th>
							@endif
							<th align="center">No Resi</th>
							<th align="center">Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{prefixOrder().$order->kodeOrder}}</td>
							<td>{{waktu($order->tanggalOrder)}}</td>
							<td class="hidden-phone">
								<ul>
									@foreach ($order->detailorder as $detail)
									<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
									@endforeach
								</ul>
							</td>
							<td class="hidden-phone">{{ price($order->total) }}</td>
							@if($checkouttype != 1)
							<td>
								- {{($order->status==2 || $order->status==3) ? price(0) : price($order->total)}}
							</td>
							@endif
							<td>{{ $order->noResi }}</td>
							<td>
								@if($order->status==0)
								<span class="label label-warning">Pending</span>
								@elseif($order->status==1)
								<span class="label label-important">Konfirmasi diterima</span>
								@elseif($order->status==2)
								<span class="label label-info">Pembayaran diterima</span>
								@elseif($order->status==3)
								<span class="label label-success">Terkirim</span>
								@elseif($order->status==4)
								<span class="label label-default">Batal</span>
								@endif
							</td>
						</tr>
					</tbody>
				</table>

				<div class="clearfix"></div>
				<div id="konfirm">
					@if($paymentinfo!=null)
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-parent="#checkout">Use a Discount / Coupon Code</a>
						</div>
						<div class="accordion-body">
							<div class="accordion-inner">
								<h3><center>Paypal Payment Details</center></h3>
								<hr>
								<table>
									<tr>
										<td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td>
									</tr>
									<tr>
										<td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td>
									</tr>
									<tr>
										<td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td>
									</tr>
									<tr>
										<td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td>
									</tr>
									<tr>
										<td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td>
									</tr>
									<tr>
										<td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td>
									</tr>
									<tr>
										<td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
									</tr>
								</table>
								<p>Thanks you for your order.</p>
							</div>
						</div>
					</div>
					@endif
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" href="#transferbank">{{trans('content.step5.confirm_btn')}}</a>
						</div>
						<div id="transferbank" class="accordion-body collapse in"">
							<div class="accordion-inner">
								@if($order->status==1 || $order->status==0)
									@if($order->jenisPembayaran==1)
									<div class="span6 offset3">
										<h3 class="text-center">{{trans('content.step3.transfer')}}</h3>
										{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'signin-form'))}}
											<input class="input-block-level" name="nama" value="{{Input::old('nama')}}" type="text" placeholder="Enter your name" required />
											<input class="input-block-level" name="noRekPengirim" value="{{Input::old('noRekPengirim')}}" type="text" placeholder="Account number" required/>
											<select name="bank" style="width: 100%">
												<option value="">-- Pilih Bank Tujuan --</option>
												@foreach ($banktrans as $bank)
												<option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
												@endforeach
											</select>
											<input class="input-block-level" name="jumlah" value="{{$order->total}}" type="text" required />
											<button class="btn btn-medium btn-general input-block-level" type="submit">{{trans('content.step5.confirm_btn')}}</button>
										{{Form::close()}}
										<br>
									</div>
									@elseif($order->jenisPembayaran==2)
									<div class="span8 offset2">
										<h2 class="text-center">{{trans('content.step5.confirm_btn')}} Paypal</h2><br>
										<p class="text-center">{{trans('content.step5.paypal')}}</p>
										<center id="paypal">{{$paypalbutton}}</center>
										<br>
									</div>
									@elseif($order->jenisPembayaran==4) 
										@if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
										<div class="span8 offset2">
											<center>
												<h3><b>{{trans('content.step5.confirm_btn')}} iPaymu</b></h3><br>
												<p>{{trans('content.step5.ipaymu')}}</p>
												<a class="btn btn-info" href="{{url('ipaymu/'.$order->id)}}" target="_blank">{{trans('content.step5.ipaymu_btn')}}</a>
											</center>
											<br>
										</div>
										@endif
									@elseif($order->jenisPembayaran==5 && $order->status == 0)
									<div class="span8 offset2">
										<center>
											<h3><strong>{{trans('content.step5.confirm_btn')}} DOKU MyShortCart</strong></h3><br>
											<p>{{trans('content.step5.doku')}}</p>
											{{ $doku_button }}
										</center>
										<br>
									</div>
									@elseif($order->jenisPembayaran==6 && $order->status == 0)
									<div class="span8 offset2">
										<h2 class="text-center">{{trans('content.step5.confirm_btn')}} Bitcoin</h2><br>
										<p class="text-center">{{trans('content.step5.bitcoin')}}</p>
										<center>{{$bitcoinbutton}}</center>
										<br>
									</div>
									@elseif($order->jenisPembayaran == 8 && $order->status == 0)
									<div class="span8 offset2">
										<h2 class="text-center">{{trans('content.step5.confirm_btn')}} Veritrans</h2><br>
										<p class="text-center">{{trans('content.step5.veritrans')}}</p>
										<center>
											<button class="btn btn-info" onclick="location.href='{{ $veritrans_payment_url }}'">{{trans('content.step5.veritrans_btn')}}</button>
										</center>
										<br>
									</div>
									@endif
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
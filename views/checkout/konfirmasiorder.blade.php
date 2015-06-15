@if(Session::has('success'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, konfirmasi anda sudah terkirim.</p>					
</div>		
@endif
	
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
							<th align="center"class="hidden-phone">Order</th>
							<th align="center"class="hidden-phone">Jumlah</th>
							<th align="center">Jumlah yg belum di bayar</th>
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
							<td class="hidden-phone">
								{{price($order->total)}}
							</td>
							<td>
								- {{($order->status==2 || $order->status==3) ? price(0) : price($order->total)}}
							</td>
							<td>
								{{$order->noResi}}
							</td>
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
								<a class="accordion-toggle" data-parent="#checkout">
									Use a Discount / Coupon Code
								</a>
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
							<a class="accordion-toggle">
								Konfirmasi pembayaran
							</a>
						</div>
						<div class="accordion-body">
							<div class="accordion-inner">
								@if($order->status==1 || $order->status==0)           
									@if($order->jenisPembayaran==1)
										<h3><center>Konfirmasi Form</center></h3>
										{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put', 'class'=> 'signin-form'))}}	
											<input class="input-block-level" name="nama" value='{{Input::old("nama")}}' type="text" placeholder="Enter your name" required/>
											<input class="input-block-level" name="noRekPengirim" value='{{Input::old("noRekPengirim")}}' type="text" placeholder="Account number" required/>
											<select name='bank'>
												<option value=''>-- Pilih Bank Tujuan --</option>
												@foreach ($banktrans as $bank)
													<option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
												@endforeach
											</select>
											<input class="input-block-level" name="jumlah" value='{{$order->total}}' type="text" required />
											<button class="btn btn-medium btn-general input-block-level" type="submit">Konfirmasi Order</button>
										{{Form::close()}}
									@endif
									@if($order->jenisPembayaran==2)
										<h2><center>Konfirmasi Pemabayaran Via Paypal</center></h2>
										<p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum {{$expired}}. Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
										{{$paypalbutton}}
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
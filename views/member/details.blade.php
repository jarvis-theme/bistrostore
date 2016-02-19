<!-- ================== -->
<!-- Member detail Page -->
<!-- ================== -->
<div class="row">
	<div class="span12 post">
		<div class="row-fluid">
			<div class="span12">
				<h2 class="page-header">Shopping Cart</h2>
				<div class="sidebar-line"><span></span></div>
				<table class="table wishlist table-hover table-bordered">
					@if($setting->checkoutType==2)
					<thead>
						<tr>
							<th>ID Inquiry</th>
							<th>Tanggal Order</th>
							<th>Detail Order</th>
							<th>Status</th>
						</tr>
					</thead>
					@else
					<thead>
						<tr>
							<th>ID Order</th>
							<th>Tanggal Order</th>
							<th>Detail Order</th>
							<th>Total Order</th>
							<th>No. Resi</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					@endif
					<tbody>
						@if($setting->checkoutType==1)
							@if(list_order()->count()>0)
								@foreach (list_order() as $item)
								<tr>
									<td>{{prefixOrder().$item->kodeOrder}}</td>
									<td>{{waktu($item->tanggalOrder)}}</td>
									<td>
										<ul>
										@foreach ($item->detailorder as $detail)
											<li>{{@$detail->produk->nama}} {{@$detail->opsiSkuId !=0 ? '('.@$detail->opsisku->opsi1.(@$detail->opsisku->opsi2 != '' ? ' / '.@$detail->opsisku->opsi2:'').(@$detail->opsisku->opsi3 !='' ? ' / '.@$detail->opsisku->opsi3:'').')':''}} - {{@$detail->qty}}</li>
										@endforeach
										</ul>
									</td>
									<td>{{ price($item->total) }}</td>
									<td>{{ $item->noResi }}</td>
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
									<td class="text-center">
										@if($item->status==0)
										<a href="{{URL::to('konfirmasiorder/'.$item->id)}}" class="btn btn-general">Konfirmasi Pembayaran</a>
										@endif
									</td>
								</tr>
								@endforeach
							@else
								<tr><td><p>Belum ada data order</p></td></tr>
							@endif
						@elseif($setting->checkoutType==2)
							@if($inquiry->count()>0)
								@foreach ($inquiry as $item)
								<tr>
									<td>{{prefixOrder().$item->kodeInquiry}}</td>
									<td>{{waktu($item->tanggalInquiry)}}</td>
									<td>
										<ul>
										@foreach ($item->detailInquiry as $detail)
											<li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
										@endforeach
										</ul>
									</td>
									<td>
										@if($item->status==0)
											<span class="label label-warning">Pending</span>
										@elseif($item->status=1)
											<span class="label label-important">Konfirmasi diterima</span>
										@elseif($item->status==2)
											<span class="label label-default">Batal</span>
										@endif
									</td>
								</tr>
								@endforeach
							@else
								<tr><td><p>Belum ada data inquiry</p></td></tr>
							@endif
						@elseif($setting->checkoutType==3)
							@if(list_order()->count() > 0)
								@foreach (list_order() as $item)
								<tr>
									<td>{{ prefixOrder().$item->kodePreorder }}</td>
									<td>{{ waktu($item->tanggalPreorder) }}</td>
									<td>
										<ul>
											<li>({{$item->opsiSkuId==0 ? 'No Opsi' : $item->opsisku->opsi1.($item->opsisku->opsi2!='' ? ' / '.$item->opsisku->opsi2:'').($item->opsisku->opsi3!='' ? ' / '.$item->opsisku->opsi3:'')}}) - {{$item->jumlah}}</li>
										</ul>
									</td>
									<td>{{ price($item->total) }}</td>
									<td>{{ $item->noResi }}</td>
									<td>
										@if($item->status==0)
										<span class="label label-warning">Pending</span>
										@elseif($item->status==1)
										<span class="label label-important">Konfirmasi DP diterima</span>
										@elseif($item->status==2)
										<span class="label label-info">DP terbayar</span>
										@elseif($item->status==3)
										<span class="label label-info">Menunggu pelunasan</span>
										@elseif($item->status==4)
										<span class="label label-info">Pembayaran lunas</span>
										@elseif($item->status==5)
										<span class="label label-success">Terkirim</span>
										@elseif($item->status==6)
										<span class="label label-default">Batal</span>
										@elseif($item->status==7)
										<span class="label label-info">Konfirmasi Pelunasan diterima</span>
										@endif
									</td>
									<td class="text-center">
										<a href="{{URL::to('konfirmasipreorder/'.$item->id)}}" class="btn btn-general">Konfirmasi Pembayaran</a>
									</td>
								</tr>
								@endforeach
							@else
								<tr><td><p>Belum ada data order</p></td></tr>
							@endif
						@endif
					</tbody>
				</table>

				<div class="clearfix"></div>
				<div class="accordion" id="checkout">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#checkout" href="#collapseOne">
								<h3>Member Details</h3>
							</a>
						</div>
						<div id="collapseOne" class="accordion-body collapse in">
							<div class="accordion-inner">
								{{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
									<div class="row-fluid">
										<div class="span6">
											<h4>Biodata</h4>
											<div class="control-group">
												<label class="control-label" for="companyname">Nama</label>
												<div class="controls">
													<input name="nama" type="text" placeholder="Nama" value="{{$user->nama}}">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companytradingregister">Email</label>
												<div class="controls">
													<input name="email" type="text" placeholder="Email@email.com" value="{{$user->email}}">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companytaxregister">Alamat</label>
												<div class="controls">
													<textarea name="alamat" rows="3">{{$user->alamat}}</textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companycontact">Negara</label>
												<div class="controls">
													{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara, ($user ? $user->negara :(Input::old("negara") ? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara'))}}
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companyemail">Provinsi</label>
												<div class="controls">
													{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi, ($user ? $user->provinsi :(Input::old("provinsi") ? Input::old("provinsi") :"")),array('id'=>'provinsi'))}}
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companyaddress">Kota</label>
												<div class="controls">
													{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota, ($user ? $user->kota : (Input::old("kota") ? Input::old("kota") :"")),array('id'=>'kota'))}}
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companyzip">Kode Pos</label>
												<div class="controls">
													<input name="kodepos" type="text" placeholder="Kode Pos" value="{{$user->kodepos}}">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companyname">Telepon / HP</label>
												<div class="controls">
													{{Form::input('text', 'telp', $user->telp)}}
												</div>
											</div>
										</div>
										<div class="span6">
											<h4>Ubah Password</h4>
											<div class="control-group">
												<label class="control-label" for="companypostaladdress">Password Lama</label>
												<div class="controls">
													<input name="oldpassword" type="password">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companypostalzip">Password Baru</label>
												<div class="controls">
													<input name="password" type="password" >
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="companypostalcity">Ulangi Password Baru</label>
												<div class="controls">
													<input name="password_confirmation" type="password">
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span1"></div>
										<div class="span10"><button class="btn btn-general">Update</button></div>
									</div>
								{{Form::close()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<a href="#"><i class="icon-shopping-cart"></i> Your Cart <span class="label label-success font14">{{Shpcart::cart()->total_items()}} item(s)</span> - {{price(Shpcart::cart()->total())}} <i class="icon-arrow-down"></i></a>
<ul class="dropdown-menu topcart">
	<li class="mycart">
		@if(Shpcart::cart()->total() > 0)
		<table>
			<tbody>
				@foreach (Shpcart::cart()->contents() as $key => $cart)
				<tr>
					<td class="image"><a href="#">{{HTML::image(product_image_url($cart['image'],'thumb'), $cart['name'], array('width'=>'50px'));}}</a></td>
					<td class="name"><a href="#">{{$cart['name']}}</a></td>
					<td class="quantity">x {{$cart['qty']}}</td>
					<td class="total">{{ price($cart['qty'] * $cart['price'])}}</td>
					<td class="remove-item"><a href="{{'javascript:deletecartdialog('."'".$cart['rowid']."'".')'}}"><i class="icon-remove "></i></a></td>
				</tr>
				@endforeach
				<tr>
					<td class="textright"><b>Total:</b></td>
					<td class="textright" colspan="4">{{price(Shpcart::cart()->total())}}</td>
				</tr>
			</tbody>
		</table>
		<div class="well pull-right">
			<a href="{{url('checkout')}}" class="btn btn-general">Checkout</a>
		</div>
		@else
		<table>
			<tbody>
				<tr>
					<td class="name">
						<span>Keranjang masih kosong!</span>
					</td>
				</tr>
			</tbody>
		</table>
		@endif
	</li>
</ul>
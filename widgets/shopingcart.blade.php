<a href="#"><i class="icon-shopping-cart"></i> Your Cart <span class="label label-success font14">{{Shpcart::cart()->total_items()}} item(s)</span> - {{price(Shpcart::cart()->total())}} <i class="icon-arrow-down"></i></a>
<ul class="dropdown-menu topcart">
	<li>
		<table>
			<tbody>
			@if(Shpcart::cart())
				@foreach (Shpcart::cart()->contents() as $key => $cart)
				<tr>
					<td class="image"><a href="#">{{HTML::image(getPrefixDomain().'/produk/thumb/'.$cart['image'], $cart['name'], array('width'=>'50px'));}}</a></td>
					<td class="name"><a href="#">{{$cart['name']}}</a></td>
					<td class="quantity">x {{$cart['qty']}}</td>
					<td class="total">{{ price($cart['qty'] * $cart['price'])}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<table>
			<tbody>
				<tr>
					<td class="textright"><b>Total:</b></td>
					<td class="textright">{{price(Shpcart::cart()->total())}}</td>
				</tr>
			</tbody>
		</table>
		<div class="well pull-right">
			<a href="{{url('checkout')}}" class="btn btn-general">Checkout</a>
		</div>
		@else
		<table>
			<tr>
				<td class="name">
					<span>Cart masih kosong!</span>
				</td>
			</tr>	
		</table>
		@endif
	</li>
</ul>
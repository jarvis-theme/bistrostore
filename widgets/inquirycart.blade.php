<!-- Bubble Cart Item -->
<a href="#"><i class="icon-shopping-cart"></i> Your Cart <span class="label label-success font14">{{Shpcart::wishlist()->total_items()}} item(s)</span><i class="icon-arrow-down"></i></a>
<ul class="dropdown-menu topcart">
	<li>
		<table>
			<tbody>
		@if(Shpcart::wishlist())
				@foreach (Shpcart::wishlist()->contents() as $key => $cart)
				<tr>
					<td class="image"><a href="#">{{HTML::image(getPrefixDomain().'/produk/thumb/'.$cart['image'], $cart['name'], array('width'=>'50px'));}}</a></td>
					<td class="name"><a href="#">{{$cart['name']}}</a></td>
					<td class="quantity">x&nbsp;{{$cart['qty']}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="well pull-right">
			<a href="checkout.html" class="btn btn-general">Checkout</a>
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
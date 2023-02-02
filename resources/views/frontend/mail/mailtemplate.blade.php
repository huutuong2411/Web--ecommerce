<!DOCTYPE html>
<html>
<head>
	<title>Cam on ban da lua chon san pham</title>
</head>
<body>
	<h3>xin chào {{$data['name']}}</h3>
	<h3>{{$data['email']}}</h3>
	<h3>{{$data['phone']}}</h3>
	<h3>{{$data['address']}}</h3>
	<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $tong=0 ?>
						@if(session()->has('cart'))
						@foreach(session()->get('cart') as $value )
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{$value['cartImg']}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$value['productName']}}</a></h4>
								<p>Web ID:{{$value['productID']}}</p>
							</td>
							<td class="cart_price">
								<p>{{$value['productPrice']}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="javascript:void(0)"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$value['cartQty']}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="javascript:void(0)"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$value['productPrice']*$value['cartQty']}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:void(0)"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $tong=$tong+$value['productPrice']*$value['cartQty']; ?>
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tbody><tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td id="totalbill"><span>{{$tong}}</span></td>
									</tr>
								</tbody></table>
								
							</td>
						</tr>

						@endif
					</tbody>
				</table>
			</div>
</body>
</html>
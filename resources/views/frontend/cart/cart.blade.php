@extends('frontend.layout.frame')
@section('title')
	<title> Account | E-Shopper</title>
@endsection
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
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
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li id="totalbill">Total <span>{{$tong}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->			
<script type="text/javascript">
	  $(document).ready(function(){
	  				$.ajaxSetup({
		                headers: { 
		                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
		               			 } 
		            			}); 
	  				$(".cart_quantity_up").click(function() {
						// tách id từ text ra
						var id = $(this).closest("tr").find("td.cart_description").find("p").text().replace("Web ID:", "")
						// tách đơn giá từ price bỏ $ 
						var dongia = parseInt($(this).closest("tr").find("td.cart_price").find("p").text())
						// lấy số lượng từ input
						var soluong = $(this).closest(".cart_quantity_button").find("input.cart_quantity_input").val()
						$(this).closest(".cart_quantity_button").find("input.cart_quantity_input").val(++soluong)
						// tính tổng tiền mỗi sp
						$(this).closest("tr").find("p.cart_total_price").text(dongia * soluong)
						// tăng đơn giá vào tổng tiền: 
						var tongtien = parseInt($("#totalbill").find("span").text())
						$("#totalbill").find("span").text(tongtien + dongia)
						// đưa qua ajax
						$.ajax({
                                method: "POST",
                                url : "{{route('updatecart')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    idUP: id,
                                } ,
                            });

					})
					$(".cart_quantity_down").click(function() {
						// tách id từ text ra
						var id = $(this).closest("tr").find("td.cart_description").find("p").text().replace("Web ID:", "")
						// lấy số lượng từ input
						var soluong = $(this).closest(".cart_quantity_button").find("input.cart_quantity_input").val()
						// tách đơn giá từ price bỏ $ 
						var dongia = parseInt($(this).closest("tr").find("td.cart_price").find("p").text())

						if (soluong <= 1) {
							$(this).closest("tr").remove()
						} else {
							$(this).closest(".cart_quantity_button").find("input.cart_quantity_input").val(--soluong)
						}
						// tính tổng tiền mỗi sp
						$(this).closest("tr").find("p.cart_total_price").text(dongia * soluong)
						// tăng đơn giá vào tổng tiền: 
						var tongtien = parseInt($("#totalbill").find("span").text())
						$("#totalbill").find("span").text(tongtien - dongia)
						// đưa qua ajax
						$.ajax({
                                method: "POST",
                                url : "{{route('updatecart')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    idDOWN: id,
                                } ,
                            });
					})
					$(".cart_quantity_delete").click(function() {
						// tách id từ text ra
						var id = $(this).closest("tr").find("td.cart_description").find("p").text().replace("Web ID:", "")
						// tách đơn giá từ price bỏ $ 
						var dongia = parseInt($(this).closest("tr").find("td.cart_price").find("p").text())
						// lấy số lượng từ input
						var soluong = $(this).closest("tr").find("input.cart_quantity_input").val()
						// xóa html
						$(this).closest("tr").remove()
						// thay đổi tổng tiền
						var tongtien = parseInt($("#totalbill").find("span").text())
						$("#totalbill").find("span").text( tongtien - soluong*dongia)
						// đưa qua aja
						$.ajax({
                                method: "POST",
                                url : "{{route('updatecart')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    idDEL: id,
                                } ,
                            });
					})

	  })
</script>
			
@endsection
@extends('frontend.layout.frame')
@section('title')
	<title> Checkout | E-Shopper</title>
@endsection
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="shopper-informations">
				<div class="row">
					@if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                {{session('success')}}
                            </div>
                    @endif
                    @if($errors->any())
                      		    <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    @if(!Auth::check())
					<div class="step-one">
						<h2 class="heading">Bạn chưa login! Vui lòng đăng ký tài khoản</h2>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->              
                         
                        			
	                       			<h2>Register your account</h2>
				                    <form action="{{route('postregister')}}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
				                                    @csrf
				                                    <div class="form-group">
				                                        <label class="col-md-12">Full Name</label>
				                                        <div class="col-md-12">
				                                            <input type="text" value="" name="name" class="form-control form-control-line">
				                                        </div>
				                                    </div>
				                                    <div class="form-group">
				                                        <label for="example-email" class="col-md-12">Email</label>
				                                        <div class="col-md-12">
				                                            <input type="email" value="" class="form-control form-control-line" name="email" id="example-email">
				                                        </div>
				                                    </div>
				                                    <div class="form-group">
				                                        <label class="col-md-12">Password</label>
				                                        <div class="col-md-12">
				                                            <input type="password" value="" class="form-control form-control-line" name="password">
				                                        </div>
				                                    </div>
				                                    <div class="form-group">
				                                        <label class="col-md-12">Phone No</label>
				                                        <div class="col-md-12">
				                                            <input type="text" placeholder="nhap so dien thoai" class="form-control form-control-line" name="phone">
				                                        </div>
				                                    </div>
				                                    <div class="form-group">
				                                        <label class="col-md-12">Address</label>
				                                        <div class="col-md-12">
				                                            <input type="text" name="address" class="form-control form-control-line">
				                                        </div>
				                                    </div>
				                                    <div class="form-group">
				                                        <label class="col-md-12">Avatar</label>
				                                        <div class="col-md-12">
				                                            <input type="file" name="avatar" class="form-control form-control-line">
				                                        </div>
				                                    </div>
				                                    <div class="form-group">
				                                        <label class="col-sm-12">Select Country</label>
				                                        <div class="col-sm-12">
				                                            <select name="id_country" class="form-control form-control-line">
				                                         @foreach($infor as $value)
				                                            <option 
				                                             value="{{$value->id}}">{{$value->name}}</option>
				                                        @endforeach
				                                                
				                                            </select>
				                                        </div>
				                                    </div>
				                                    <div class="form-group">
				                                        <div class="col-sm-6">
				                                        	<a href="{{route('postregister')}}"><button type="submit" class="btn btn-success">Register</button></a>
				                                            
				                                        </div>
				                                    </div>
				                    </form>
						
                    </div><!--/login form-->
               		</div>	
               		@endif		
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
								<a href="{{route('sendmail')}}"><button>send to email</button></a>
							</td>
						</tr>

						@endif
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section>
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
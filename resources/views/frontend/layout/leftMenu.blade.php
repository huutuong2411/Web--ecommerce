<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="500000" data-slider-step="5" data-slider-value="[50000,300000]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 500.000</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="">
						</div><!--/shipping-->
					</div>
				</div>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajaxSetup({
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                } 
        }); 
		$('.slider-track').click(function(){
			var gia=$('.tooltip-inner').text();
			 $.ajax({
                                method: "POST",
                                url : "{{route('pricesearch')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    gia: gia,
                                } ,
                                success:function(data){
                                	var html="";

                                	Object.keys(data).map(function(key,index)
                                	{
                                	var getId=data[key]['id'];
                                	var href = "{{ url('/product/detail/')}}" +"/"+ getId;


                                	// var href="{{route('productDetails',['id'=>"+id+"])}}";
                                	console.log(href);

                                	var xx = JSON.parse(data[key]['image']);
                                	var	img="{{url('frontend/images/product/')}}"+"/"+data[key]['id_user']+"/"+xx[0];
							            html+="<div class='col-sm-4'>" +
							             			"<div class='product-image-wrapper'>" +
							             					"<div class='single-products'>"+
							             					"<div  class='productinfo text-center'>"+
							             						"<img src='"+img+"'><h2>$"+data[key]['price']+"</h2>"+
							             						 "<p>"+data[key]['name']+"</p>"+
							             						 		"<a href='' class='btn btn-default add-to-cart'>"+
							             						 		"<i class='fa fa-shopping-cart'></i>"+"View ProductDetails</a>" +
							             						 		"</div> <div class='product-overlay'>"+
							             						 		"<div class='overlay-content'> <h2>$"+data[key]['price']+"</h2> <p>"+data[key]['name']+"</p>"+"<a href='"+href+"' class='btn btn-default add-to-cart'>"+"<i class='fa fa-shopping-cart'>"+"</i>"+"View ProductDetails</a>"+ 
							             						 		"</div>"+
							             						 		"</div>"+
							             						 		"</div>"
							             						 		+"<div class='choose'>"+"<ul class='nav nav-pills nav-justified'>"+"<li><a href='"+href+"'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>"+"<li><a href=''><i class='fa fa-plus-square'></i>Add to compare</a></li>"+"</ul>"+
							             						 			"</div>"+
							             						 			"</div>"+
							             						 			"</div>"
										
									})
							        $('.features_items').html("<h2 class='title text-center'>Features Items</h2>"+html);
                               }
                            });
					})

	})
</script>

	
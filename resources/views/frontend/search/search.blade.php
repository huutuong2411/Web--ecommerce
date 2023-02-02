@extends('frontend.layout.frame')
@section('title')
	<title> Home | E-Shopper</title>
@endsection

@section('content')
<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1" class=""></li>
                            <li data-target="#slider-carousel" data-slide-to="2" class=""></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl1.jpg" class="girl img-responsive" alt="">
                                    <img src="images/home/pricing.png" class="pricing" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl2.jpg" class="girl img-responsive" alt="">
                                    <img src="images/home/pricing.png" class="pricing" alt="">
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/girl3.jpg" class="girl img-responsive" alt="">
                                    <img src="images/home/pricing.png" class="pricing" alt="">
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
</section>
			<div class="row">
                    @include('frontend.layout.leftMenu')                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Search Result</h2>
                            <form action="{{route('postsearch')}}" method="POST">
                                                    @csrf
                                <div class="col-sm-12">
                                    <ul class="col-sm-12">
                                        <li class="col-sm-3"><input type="text" name="name" placeholder="name"></li>
                                        <li class="col-sm-3"><select name="price"><option disabled selected>Select Price</option>
                                            <option value="1">100k-150k</option>
                                            <option value="2">150k-200k</option>
                                        </select></li>
                                        <li class="col-sm-2"><select name="brand"><option disabled selected>Select brand</option>
                                            @foreach($brand as $value)
                                            <option value="{{$value->id}}">{{$value->brand}}</option>
                                            @endforeach
                                        </select></li>
                                        <li class="col-sm-2"><select name="category"><option disabled selected>Category</option>
                                            @foreach($category as $value)
                                            <option value="{{$value->id}}">{{$value->category}}</option>
                                            @endforeach
                                        </select></li>
                                        <li class="col-sm-2"><select name="status"><option disabled selected>Status</option>
                                            <option value="0" >New</option>
                                            <option value="1" >Sale</option>
                                        </select></li>
                                        </ul> 
                                        <button type="submit" class="btn btn-default check_out">Search</button>
                                </div>
                          </form>
                       
                        @foreach ($infor as $value)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{url('frontend/images/product/'.$value->id_user.'/'.json_decode($value->image)[0]);}}" alt="">
                                            <h2>${{$value->price}}</h2>
                                            <p>{{$value->name}}</p>
                                            <a href="{{route('productDetails',['id'=>$value->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View ProductDetails</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{$value->price}}</h2>
                                                <p>{{$value->name}}</p>
                                                <a href="{{route('productDetails',['id'=>$value->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View ProductDetails</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                     
                    </div><!--features_items-->
                </div>
            </div>
@endsection
@extends('frontend.layout.frame')
@section('title')
	<title> My product | E-Shopper</title>
@endsection
@section('content')
			<div class="row">
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<div>
							<h2 id="account">ACCOUNT</h2>
                            <ul>	
                                <li><a class="btn btn-primary" href="{{route('account')}}">Account</a></li>
                                <li><a class="btn btn-primary" href="{{route('myproduct')}}">My product</a></li>
                            </ul>
                        </div>		
					</div><!--/sign up form-->
				</div>
				<div class="col-sm-8">
                    <table class="table table-condensed">
                        @if($infor->count()>0)
                            <thead>
                                <tr class="cart_menu">
                                    <td class="id">Id</td>
                                    <td class="name"> Name</td>
                                    <td class="image">Image</td>
                                    <td class="price">Price</td>
                                    <td class="">Sale</td>
                                    <td class="total">Acction</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($infor as $value)
                                    <tr>
								    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td><img width="100px" height="100px" src="{{url('frontend/images/product/'.$value->id_user.'/'.json_decode($value->image)[0]);}}"></td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->sale}}</td>
                                    <td><a  href="{{route('editproduct',['id'=>$value->id])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a style="margin-left: 20px" href="{{route('deleteproduct',['id'=>$value->id])}}"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        @else 
                            <h2>không có dữ liệu nào</h2>
                        @endif
				    </table>
                    <a class="btn btn-primary" href="{{route('addproduct')}}">Add item</a>
             {{$infor->links('pagination::bootstrap-4')}}
                </div>

			</div>
			
@endsection
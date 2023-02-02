@extends('frontend.layout.frame')
@section('title')
	<title> Account | E-Shopper</title>
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
				<div class="col-sm-5">
								@if ($errors->any())
                                    <div class="alert alert-danger">
                                       <ul>
                                        @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
						<div class="shopper-info">
							<h3>Member Information</h3>
							<form method="post" action="{{route('update_profile')}}" enctype="multipart/form-data">
								@csrf
								<h3><img width="150px" height="130px" id="imgAVT" src="{{asset('admin/assets/images/users/'.$infor->avatar)}}" alt="">{{$infor->name}}</h3>
								
								<p>Email: </p>
								<input type="text" name="email" readonly="" value="{{$infor->email}}">
								<p>username: </p>
								<input type="text" name="name" value="{{$infor->name}}">
								<p>Phone: </p>
								<input type="text" name="phone" value="{{$infor->phone}}" >
								<p>Address: </p>
								<input type="text" name="address" value="{{$infor->address}}">
								
								<p>Nhập password mới: </p>
								<input  type="password" name="password" value="">
								<p>Nhập lại pass mới: </p>
								<input  type="password" name="confirm_password" value="">
								<p>Country: </p>
								<select name="id_country" class="form-control form-control-line">
								 		@foreach($country as $value)
                                            <option 
                                            {{$value->id == Auth::user()->id_country? "selected" : " "}}
                                             value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
								</select>
								<p>thay đổi avatar:</p>
								<input name="avatar" type="file">
							
								<button  type="submit" class="btn btn-primary">Update</button>
								<h1 style="color: red"></h1>
							</form>
							
							
						</div>
					</div>
			</div>
			
@endsection
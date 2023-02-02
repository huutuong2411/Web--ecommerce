@extends('frontend.layout.frame')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
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
						<form method="POST">
							@csrf
							<input type="email" placeholder="Email Address" name="email">
							<input type="password" name="password">
							<span>
								<input name="remember_me" type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<span></span>
							<button type="submit" class="btn btn-default">Login</button>
							<a href="{{url('member/register')}}"><button type="button" class="btn btn-default">Sigup</button></a>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section>
@endsection
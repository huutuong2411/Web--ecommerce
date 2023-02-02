@extends('frontend.layout.frame')
@section('title')
	<title> Add product | E-Shopper</title>
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
                        <form method="POST" action="" class="form-horizontal form-material" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" value="" name="name" class="form-control form-control-line">
                                       	</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">price</label>
                                        <div class="col-md-12">
                                            <input type="text" name="price" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Category</label>
                                        <div class="col-md-12">
                                            <select name="category">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($category as $value)
                                                <option value="{{$value->id}}">{{$value->category}}</option>    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Brand</label>
                                        <div class="col-md-12">
                                            <select name="brand">
                                                <option value="" disabled selected>Select Brand</option>
                                                @foreach ($brand as $value)
                                                <option value="{{$value->id}}">{{$value->brand}}</option>    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Status(Sale/New)</label>
                                        <div class="col-md-12">
                                            <select class="status" name="status">
                                                <option value="0">New</option>
                                                <option value="1">sale</option>
                                            </select>
                                        </div>
                                    </div>              
                                    <div id="inputsale" class="form-group">
                                        <label class="col-md-12">Sale</label>
                                        <div class="col-md-12">
                                            <input  type="text" name="sale" value="0"> %
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Company</label>
                                        <div class="col-md-12">
                                            <input type="text" name="company" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Image</label>
                                        <div class="col-md-12">
                                            <input required type="file" name="image[]" class="form-control form-control-line" multiple>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    	<div class="col-md-12">
                                          <button type="submit" class="btn btn-primary">Add item</button>   
                                        </div>	
                                    </div>       
                                </form>       
                </div>

			</div> <br>
			
<script>
    $(document).ready(function(){
        $('#inputsale').hide();
        $('.status').change(function(){
                if($('.status').val()==1){
                    $('#inputsale').show();
                }else{
                    $('#inputsale').hide();
                }          
        })             
    })
</script>

@endsection

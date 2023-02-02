@extends('frontend.layout.frame')
@section('title')
	
  <link type="text/css" rel="stylesheet" href="{{asset('frontend/rate/css/rate.css')}}">
  <title>{{$infor->title}}</title>

    
@endsection
@section('content')
		<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{$infor->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<!-- <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span> -->
							</div>
							{!!$infor->content!!}
							<div class="pager-area">
								<ul class="pager pull-right">
									@if(isset($previous)) 
									<li><a href="{{route('blogsingle',['id'=>$previous->id])}}">Pre</a></li>
									 @endif 
									@if(isset($next)) 
									<li><a href="{{route('blogsingle',['id'=>$next->id])}}">Next</a></li>
									@endif 
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					
						<div class="rate">
                			<div class="vote">
			                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
			                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
			                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
			                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
			                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
			                    <span class="rate-np">{{$sao}}</span>
                			</div> 
            
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					 <div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="{{asset('frontend/images/blog/man-one.jpg')}}" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div> Comments
					<div class="response-area">
						<h2>3 RESPONSES</h2>
						<ul class="media-list">
							@foreach ($comment as $value) 
							<li class="media">	
								<a class="pull-left" href="#">
									<img width="50px" height="50px" class="media-object" src="{{url('admin/assets/images/users/'.$value->avatar)}}" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>{{$value->name}}</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>{{$value->cmt}}</p>
									<a class="btn btn-primary replay" href="javascript:void(0)"><i class="fa fa-reply"></i>Replay</a> <br>
									<form class="binhluan" method="post" action="{{route('comment',['id'=>$infor->id])}}">
										@csrf
										<input type="hidden" name="level" value="{{$value->id}}">
										<div class="blank-arrow">
											<label></label>
										</div>
										<br>
										<textarea class="noidung" name="message" rows="4"></textarea>
										<button class="btn btn-primary comment" type="submit">post comment</button>
									</form>
								</div>
							</li>
							@endforeach 



							
							<li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-four.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
							<li class="media second-media">
								<a class="pull-left" href="#">
									<img class="media-object" src="images/blog/man-three.jpg" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>Janis Gallagher</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li>
						</ul>					
					</div>
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Leave a replay</h2>
								
								<div class="text-area">
									<form method="post" action="{{route('comment',['id'=>$infor->id])}}">
										@csrf
										<div class="blank-arrow">
											<label>Your Name</label>
										</div>
										<span>*</span>
										<textarea class="noidung" name="message" rows="11"></textarea>
										<button class="btn btn-primary comment" type="submit">post comment</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>	
	<script>
    	$(document).ready(function(){
    		$('.star_{{$sao}}').prevAll().andSelf().addClass('ratings_over');

			$.ajaxSetup({
				headers: { 
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
				} 
			});	

			//vote
			$('.ratings_stars').hover(
	            // Handles the mouseover
	            function() {
	                $(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
	                $(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );

			$('.ratings_stars').click(function(){
				var Values = $(this).find("input").val();
				let login = "{{Auth::check()}}";
				console.log(login);
				if(login==true){
			        $.ajax({
					method: "POST",
					url : "{{route('rating',['id'=>$infor->id])}}",
					data: {
						blogID: Values ,
						
					} ,
					success : function(data){
						alert(data);
					}
					});

			    	if ($(this).hasClass('ratings_over')) {
			            $('.ratings_stars').removeClass('ratings_over');
			            $(this).prevAll().andSelf().addClass('ratings_over');
			        } else {
			        	$(this).prevAll().andSelf().addClass('ratings_over');
			        }	
				} else {
					alert("Vui long login de danh gia");
				}
			});	
			$('.comment').click(function(){
				let login = "{{Auth::check()}}";
				if(login==true){	
					let message = $('.noidung').val();
					if(message==""){	
						alert("Vui lòng nhập nội dung bình luận");
						return false;
					}
					return true;
					} else {
						alert("Vui lòng đăng nhập để bình luận");
						return false;
					}
			});


			$('.binhluan').hide()
			$('.replay').click(function(){

				$('.binhluan').show();
			})
		});		
    </script>	
@endsection





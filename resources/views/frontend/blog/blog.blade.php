@extends('frontend.layout.frame')
@section('title')
	<title> Blog | E-Shopper</title>
@endsection
@section('content')
				<div class="col-sm-9">			
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						@foreach ($infor as $value)
						<div class="single-blog-post">
							<a href="{{route('blogsingle',['id'=>$value->id])}}"><h3>{{$value->title}}</h3></a>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="{{route('blogsingle',['id'=>$value->id])}}">
								<img src="{{url('admin/assets/images/blog/'.$value->image)}}" alt="">
							</a>
							<p>{{$value->description}}</p>
							<a  class="btn btn-primary" href="{{route('blogsingle',['id'=>$value->id])}}">Read More</a>
						</div>
						@endforeach 
						<div class="pagination-area">
							{{$infor->links('pagination::bootstrap-4')}}
						</div>
					</div>
				</div>
@endsection
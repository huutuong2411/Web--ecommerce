@extends('admin.layout.frames')
@section('content')
<div class="page-wrapper">
<div class="table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-1" scope="col">#</th>
                                                <th class="col-lg-3" scope="col">Title</th>
                                                <th class="col-lg-2" scope="col">Image</th>
                                                <th class="col-lg-5" scope="col">Description</th>
                                                <th class="col-lg-1" scope="col">Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($infor as $value) 
                                            <tr>
                                                <th scope="row">{{$value->id}}</th>
                                                <td>{{$value->title}}</td>                
                                                <td><img src="{{url('admin/assets/images/blog/'.$value->image)}}" height="80" width="80"></td>
                                                <td>{{$value->description}}</td>     
                                                <td>
                                                    <a href="{{route('deleteblog',['id'=>$value->id])}}"><i class="m-r-10 mdi mdi-delete">delete</i></a>
                                                    <a href="{{route('geteditblog',['id'=>$value->id])}}"><i class="m-r-10 mdi mdi-account-edit">Edit</i></a>
                                                </td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table> <br>
                                    <a href="{{route('getaddblog')}}"><button  class="btn btn-success">ADD</button></a>
                                    {{$infor->links('pagination::bootstrap-4')}}
                                     
                                    
</div>
</div>
@endsection
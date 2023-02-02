@extends('admin.layout.frames')
@section('content')
	<div class="page-wrapper">
           <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($infor as $value) 
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>{{$value->name}}</td>
                                            <td><a href="{{route('deletecountry',['id'=>$value->id])}}"><i class="m-r-10 mdi mdi-delete">delete</i></a> </td>
                                            
                                        </tr>
                                        @endforeach                                    
                                    </tbody>
                                </table>
                                
                                
             </div>
             <button class="btn btn-success"><a href="{{route('getaddcountry')}}">ADD</a></button>
             {{$infor->links('pagination::bootstrap-4')}}
                           
    </div>
@endsection
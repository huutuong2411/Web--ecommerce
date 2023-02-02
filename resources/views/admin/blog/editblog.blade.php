@extends('admin.layout.frames')
@section('content')
	<div class="page-wrapper">
			<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
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
                            <h4 class="card-title">EDIT BLOG</h4>
                            <form method="post" class="form-horizontal m-t-30" enctype="multipart/form-data">
                                 @csrf
                            	
                                <div class="form-group">
                                	
                                    <label>Title (*)</label>
                                    <input name="title" type="text" class="form-control"  value="{{$infor->title}}">
                                    <label>Image  : </label> <br>
                                    <img src="{{url('admin/assets/images/blog/'.$infor->image)}}" height="120" width="120">
                                    <input name="image" type="file" class="form-control">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3">{{$infor->description}}</textarea>
                                    <label>Content</label>
                                    <textarea  name="content" id="editor1" class="form-control" rows="8">{{$infor->content}}</textarea> <br>
                                    <button type="submit" class="btn btn-success">ADD</button>
                                </div>  
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	</div>
@endsection


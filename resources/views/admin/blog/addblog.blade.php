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
                            <h4 class="card-title">CREATE BLOG</h4>
                            <form method="post" class="form-horizontal m-t-30" enctype="multipart/form-data">
                                 @csrf
                            	
                                <div class="form-group">
                                    <label>Title (*)</label>
                                    <input name="title" type="text" class="form-control" placeholder="vui long nhap title">
                                    <label>Image</label>
                                    <input name="image" type="file" class="form-control">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                    <label>Content</label>
                                    <textarea name="content" id="editor1" class="form-control" rows="8"></textarea> <br>
                                    <button class="btn btn-success">ADD</button>
                                </div>  
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	</div>
@endsection

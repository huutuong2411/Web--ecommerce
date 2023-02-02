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
                            <h4 class="card-title">ADD COUNTRY</h4>
                            <form method="post" class="form-horizontal m-t-30">
                            	@csrf
                                <div class="form-group">
                                    <input name="country" type="text" class="form-control" placeholder="vui long nhap country">
                                    <button class="btn btn-success">ADD</button>
                                </div>       
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	</div>
@endsection

<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="application" hidden>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Suppliers Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Suppliers Management</li>
                            <li class="breadcrumb-item active">Supplier</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <form id="form4submit" enctype="multipart/form-data" method="post" action="javascript:void(0)">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card">
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="app_name">Application Name</label>
                                           <input class="form-control" type="text" id="app_name" name="app_name">
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="app_title">Application Title</label>
                                           <input class="form-control" type="text" id="app_title" name="aapp_title">
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Upload Application Logo</label>
                                           <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp" name="app_logo">
                                        </span>
                                    </span>
                                               <input type="text" class="form-control" readonly>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6 text-center" id="imghere">
                                       <img width="150" id='img-upload' src="{{asset('image/employee/d.jpg')}}"/>
                                   </div>
                                </div>
                           </div>
                           <div class="card-footer">
                               <div class="text-right">
                                   <button type="submit" class="btn btn-primary" value="update" id="state">Update Application</button>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
                </form>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


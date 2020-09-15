<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="employee" hidden>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Setting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">Setting</li>
                            <li class="breadcrumb-item active">Employee</li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Employee</h3>
                                <div class="text-right">
                                    <button type="button" class="btn btn-info" id="modalshow">Add New Employee
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Photo</th>
                                                <th>Name/ID</th>
                                                <th>Information</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($s=1)
                                            @foreach($emp as $e)
                                            <tr>
                                                <td>{{$s++}}</td>
                                                <td>
                                                    <img id="imgSrc" src="{{asset('image/employee/'.$e->emp_image)}}" alt="" style="width: 50px;">
                                                </td>
                                                <td class="font-weight-bold">
                                                    {{$e->emp_name}}
                                                    <div class="small">
                                                        ID:
                                                        <span>{{$e->emp_id}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    Email: {{$e->emp_email}}
                                                    <br>
                                                    Contact: {{$e->emp_phone}}
                                                    <br>
                                                    Employee: {{date('d-m-Y', strtotime($e->created_at))}}
                                                    <br>
                                                    Address: {{$e->emp_address}}

                                                </td>
                                                <td>
                                                    Role
                                                    <label class="label bg-success p-1 rounded">
                                                        @switch($e->emp_type)
                                                            @case(1) Manager @break
                                                            @case(2) Waiter @break
                                                            @case(3) Kitchen @break
                                                            @default Unkonown
                                                        @endswitch
                                                    </label>
                                                    <br>

                                                      <div class="here">
                                                        @switch($e->emp_status)
                                                            @case(1)Status <label class="label bg-success p-1 rounded " id="ch{{$e->id}}">Enabled</label>@break
                                                            @default Status <label class="label bg-danger p-1 rounded" id="ch{{$e->id}}">Disabled</label>
                                                        @endswitch
                                                      </div>
                                                    <div class="">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width: 150px; display: block;">
                                                        <button class="btn bg-info st_change px-2" value="{{$e->id}}" title="Enable/Disable"><i class="fas fa-infinity"></i></button>
                                                        <button class="btn bg-warning edit" value="{{$e->id}}" title="Edit"><i class="fas fa-edit"></i></button>
                                                        <button class="btn bg-danger delete" value="{{$e->id}}" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Photo</th>
                                                <th>Name/ID</th>
                                                <th>Information</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="modal-title">Add New</span>  Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form id="form4submit" enctype="multipart/form-data" method="post" action="javascript:void(0)">
                <div class="modal-body">
                    <div class="row">
                        <input id="id4update" type="text" name="id4update" value="" hidden>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_name">Name</label>
                                <input class="form-control" type="text" id="emp_name" name="emp_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_type">Employee Type</label>
                                <select class="form-control select2" style="width: 100%;" id="emp_type" name="emp_type">
                                    <option selected>Choose...</option>
                                    <option value="1">Manager</option>
                                    <option value="2">Waiter</option>
                                    <option value="3">Kitchen</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_phone">Phone</label>
                                <input class="form-control" type="text" id="emp_phone" name="emp_phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_email">Email</label>
                                <input class="form-control" type="text" id="emp_email" name="emp_email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_password">Password</label>
                                <input class="form-control" type="password" id="emp_password" name="emp_password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emp_address">Address</label>
                                <textarea class="form-control" rows="1" placeholder="Enter ..." id="emp_address" name="emp_address"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upload Image</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp" name="emp_image">
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
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" value="save" id="state">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

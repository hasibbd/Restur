<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="all-dish" hidden>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dish Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dish Management</li>
                            <li class="breadcrumb-item active">Dish</li>
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
                                <h3 class="card-title">All Dish Details</h3>
                                <div class="text-right">
                                    <button type="button" class="btn btn-info" id="modalshow">Add New Dish
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Dish Image</th>
                                                <th>Dish Info</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($s = 1)
                                            @foreach($emp as $e)
                                            <tr>
                                                <th>{{$s++}}</th>
                                                <th>
                                                    <img src="{{asset('image/dish/'.$e->dish_image)}}" style="width: 200px;" alt="">
                                                </th>
                                                <th>
                                                    Name: {{$e->dish_name}} <br>
                                                    Type: {{$e->dish_type}} <br>
                                                    Unit: {{$e->dish_unit}} / @foreach($unit as $u) @if($u->unit_val == $e->dish_unit) {{$u->unit_name}} @endif  @endforeach <br>
                                                    Price: {{$e->dish_price}} <br>
                                                    Vat: {{$e->dish_vat}} % <br>
                                                    Discount: {{$e->dish_discount}} %<br>
                                                    Grand Price: {{$e->dish_price+($e->dish_vat/100)-($e->dish_price*($e->dish_discount/100))}}
                                                </th>
                                                <td>
                                                    @switch($e->dish_status)
                                                        @case(1) <label class="label bg-success p-1 rounded" id="ch{{$e->id}}">Enabled </label>@break
                                                        @default <label class="label bg-danger p-1 rounded" id="ch{{$e->id}}">Disabled</label>
                                                    @endswitch
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
                                                <th>Dish Image</th>
                                                <th>Dish Info</th>
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
                    <h4 class="modal-title"><span id="modal-title">Add New</span>  Dish</h4>
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
                                    <label for="dish_name">Name</label>
                                    <input class="form-control" type="text" id="dish_name" name="dish_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dish_type">Dish Type</label>
                                    <select class="form-control select2" style="width: 100%;" id="dish_type" name="dish_type">
                                        <option selected>Choose...</option>
                                        @foreach($pdt as $v)
                                            <option value="{{$v->pdt_name}}">{{$v->pdt_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dish_vat">Dish Vat</label>
                                    <select class="form-control select2" style="width: 100%;" id="dish_vat" name="dish_vat">
                                        <option selected>Choose...</option>
                                        <option value="0">No Vat</option>
                                        @foreach($vat as $v)
                                        <option value="{{$v->vat_price}}">{{$v->vat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dish_discount">Dish Discount</label>
                                    <select class="form-control select2" style="width: 100%;" id="dish_discount" name="dish_discount">
                                        <option selected>Choose...</option>
                                        <option value="0">No Discount</option>
                                        @foreach($dis as $v)
                                            <option value="{{$v->discount_price}}">{{$v->discount_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dish_unit">Dish Unit</label>
                                    <select class="form-control select2" style="width: 100%;" id="dish_unit" name="dish_unit">
                                        <option selected>Choose...</option>
                                        @foreach($unit as $v)
                                            <option value="{{$v->unit_val}}">{{$v->unit_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dish_price">Price</label>
                                    <input class="form-control" type="text" id="dish_price" name="dish_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="imgInp" name="dish_image">
                                        </span>
                                    </span>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center" id="imghere">
                                <img width="150" id='img-upload' src="{{asset('image/employee/20200180.jpg')}}"/>
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


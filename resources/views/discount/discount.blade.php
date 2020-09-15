<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="discount" hidden>
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
                            <li class="breadcrumb-item active">Discount</li>
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
                                <h3 class="card-title">All Discount</h3>
                                <div class="text-right">
                                    <button type="button" class="btn btn-info" id="modalshow">Add New Discount
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                        <<table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Discount Name</th>
                                                <th>Percentage</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($s=1)
                                            @foreach($emp as $e)
                                                <tr>
                                                    <td>{{$s++}}</td>
                                                    <td>{{$e->discount_name}}</td>
                                                    <td class="font-weight-bold">
                                                        {{$e->discount_price}} %
                                                    </td>
                                                    <td>
                                                        @switch($e->discount_status)
                                                            @case(1) <label class="label bg-success p-1 rounded" id="ch{{$e->id}}">Enabled </label>@break
                                                            @default <label class="label bg-danger p-1 rounded" id="ch{{$e->id}}">Disabled</label>
                                                        @endswitch
                                                    </td>
                                                    <td >
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
                                                <th>Discount Name</th>
                                                <th>Percentage</th>
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
                    <h4 class="modal-title"><span id="modal-title">Add New</span>  Discount</h4>
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
                                    <label for="discount_name">Discount Name</label>
                                    <input class="form-control" type="text" id="discount_name" name="discount_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_price">Discount Percent</label>
                                    <input class="form-control" type="text" id="discount_price" name="discount_price">
                                </div>
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

<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="item" hidden>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Stock Managements</li>
                            <li class="breadcrumb-item active">Item</li>
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
                    <input type="text" id="re" value="6" hidden>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Order</h3>
                                <div class="text-right">
                                    <button type="button" class="btn btn-info" id="modalshow">Add New Products
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Item Name</th>
                                        <th>Item Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($rs=1)
                                      @foreach($st as $s)
                                          <tr>
                                              <td>{{$rs++}}</td>
                                              <td class="font-weight-bold">{{$s->item_name}}</td>
                                              <td>Status

                                                  @switch($s->item_status)
                                                      @case(1) <label class="label bg-success p-1 rounded" id="ch{{$s->id}}">Enabled </label>@break
                                                      @default <label class="label bg-danger p-1 rounded" id="ch{{$s->id}}">Disabled</label>
                                                  @endswitch</td>
                                              <td>
                                                  <div style="width: 150px; display: block;">
                                                      <button class="btn bg-info st_change px-2" value="{{$s->id}}" title="Enable/Disable"><i class="fas fa-infinity"></i></button>
                                                      <button class="btn bg-warning edit" value="{{$s->id}}" title="Edit"><i class="fas fa-edit"></i></button>
                                                      <button class="btn bg-danger delete" value="{{$s->id}}" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                  </div>

                                              </td>
                                          </tr>
                                      @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Item Name</th>
                                        <th>Item Status</th>
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
                    <h4 class="modal-title"><span id="modal-title">Add New</span>  Stock Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form4submit" enctype="multipart/form-data" method="post" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row">
                            <input id="id4update" type="text" name="id4update" value="" hidden>
                            <div class="col-md-6 offset-3">
                                <div class="form-group">
                                    <label for="item_name">Name</label>
                                    <input class="form-control" type="text" id="item_name" name="item_name">
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

<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="all-item" hidden>
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Stock Managements</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Stock Managements</li>
                            <li class="breadcrumb-item active">Stock Item</li>
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
                               <h3 class="card-title">All Stock Item</h3>
                               <div class="text-right">
                                   <button type="button" class="btn btn-info" id="modalshow">Add New Stock
                                   </button>
                               </div>
                           </div>
                           <div class="card-body">
                               <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                   <thead>
                                   <tr>
                                       <th>SL.</th>
                                       <th>Item Name</th>
                                       <th>Supplier Name</th>
                                       <th>Date</th>
                                       <th>Information</th>
                                       <th>Payment Status</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @php($s =1)
                                   @foreach($ss as $t)
                                       <tr>
                                           <td>{{$s++}}</td>
                                           <td class="font-weight-bold">{{$t->item_name}} <br> ID :  <a href="javascript:void(0)" onclick="location.href='{{URL::to('stock-details/'.$t->item_id)}}'" >{{$t->item_id}}</a></td>
                                           <td class="font-weight-bold">  <a href="javascript:void(0)" onclick="location.href='{{URL::to('supplier-stock/'.$t->item_sup)}}'" >{{$t->item_sup}}</a></td>
                                           <td>Buy Date: {{$t->created_at->format('d-m-Y')}} <br> Update Date: {{$t->updated_at->format('d-m-Y')}}</td>
                                           <td>
                                               Quantity: <span>{{$t->item_q}}</span> Kg/L <br>
                                               Price:  <span>{{$t->item_p}}</span>   <br>
                                           </td>
                                           <td>
                                               @if($t->item_s == 1)
                                                   <button class="btn btn-success">Paid
                                                   @if($t->item_d != 0) <br>(Refund: {{$t->item_d}}) @endif</button>
                                               @elseif($t->item_s == 0)
                                                   <button class="btn btn-danger">Unpaid <br>(Due: {{$t->item_d}})</button>
                                               @else
                                                   <button class="btn btn-warning">Partial Paid <br>(Due: {{$t->item_d}})</button>
                                               @endif
                                           </td>

                                           <td>
                                               <div style="width: 150px; display: block;">
                                                  <button class="btn bg-warning edit" value="{{$t->id}}" title="Edit"><i class="fas fa-edit"></i></button>
                                                   <button class="btn bg-danger delete" value="{{$t->id}}" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                               </div>
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>

                                   <tfoot>
                                   <tr>
                                       <th>SL.</th>
                                       <th>Item Name</th>
                                       <th>Supplier Name</th>
                                       <th>Date</th>
                                       <th>Information</th>
                                       <th>Payment Status</th>
                                       <th>Action</th>
                                   </tr>
                                   </tfoot>

                               </table>
                           </div>
                       </div>
               </div>
            </div><!-- /.container-fluid -->
            </div>
        </section>
        <!-- /.content -->
    </div>


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span id="modal-title">Add New</span> Stock</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form4submit" enctype="multipart/form-data" method="post" action="javascript:void(0)">
                    <div class="modal-body">
                        <div class="row">
                            <input id="id4update" type="text" name="id4update" value="" hidden>

                            <div class="col-md-6">
                                <label for="item_name">Item Name</label>
                                <select class="form-control select2" style="width: 100%;" id="item_name" name="item_name">
                                    <option value="0" selected>Choose...</option>
                                    @foreach($st as $v)
                                        <option value="{{$v->item_name}}">{{$v->item_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sup_name">Supplier Name</label>
                                    <select class="form-control select2" style="width: 100%;" id="sup_name" name="sup_name">
                                        <option value="0" selected>Choose...</option>
                                        @foreach($sp as $v)
                                            <option value="{{$v->splr_name}}">{{$v->splr_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item_q">Quantity (Kg/L)</label>
                                    <input class="form-control" type="text" id="item_q" name="item_q">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item_p">Price</label>
                                    <input class="form-control" type="text" id="item_p" name="item_p">
                                </div>
                            </div>
                            <div class="col-md-6" id="dis1">
                                <div class="form-group">
                                    <label for="item_p_p">Pay</label>
                                    <input class="form-control" type="text" id="item_p_p" name="item_p_p">
                                </div>
                            </div>
                            <div class="col-md-6" id="dis2">
                                <div class="form-group">
                                    <label for="item_p_d" id="i_d_t">Due</label>
                                    <input class="form-control" type="text" id="item_p_d" name="item_p_d" disabled value="0">
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

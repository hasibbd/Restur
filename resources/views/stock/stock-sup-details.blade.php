<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
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
                            <li class="breadcrumb-item active">Stock Supply Details</li>
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
                        <div class="card" id="printthis">
                            <div class="card-header">
                                <h3 class="card-title"> Stock Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 font-weight-bold">
                                               Supplier: {{$sup->splr_name}} <br>
                                                Contact: {{$sup->splr_phone}}<br>
                                                Email: {{$sup->splr_email}}<br>
                                                Address: {{$sup->splr_address}}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-right"> <button class="btn btn-warning" id="printtable"><i class="fas fa-print"></i></button></div>
                                            </div>

                                        </div>

                                        <br>
                                        <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                            <thead class="bg-dark">
                                            <tr>
                                                <th>SL</th>
                                                <th>Stock Name/Stock ID</th>
                                                <th>Stock Date</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Stock Payment</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($s=1)
                                            @foreach($st as $t)
                                                <tr>
                                                    <td>{{$s++}}</td>
                                                    <td class="font-weight-bold">{{$t->item_name}} <br> ID :  <a href="javascript:void(0)" onclick="location.href='{{URL::to('stock-details/'.$t->item_id)}}'">{{$t->item_id}}</a></td>
                                                    <td>{{$t->created_at->format('d-m-Y')}}</td>
                                                    <td>{{$t->item_q}}</td>
                                                    <td>{{$t->item_p}}</td>
                                                    <td>
                                                        @if($t->item_d > 0 && $t->item_s == 1 )
                                                            Paid <br>
                                                            Refund: {{$t->item_d}}
                                                        @elseif($t->item_d >= 0 && $t->item_s == 2)
                                                            Partial Paid <br>
                                                            Due: {{$t->item_d}}
                                                        @elseif($t->item_d >= 0 && $t->item_s == 0)
                                                            Unpaid <br>
                                                            Due: {{$t->item_d}}
                                                        @else
                                                            Paid
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="text-right font-weight-bold">
                                            Total Price: {{$st->sum('item_p')}} <br>
                                            @if($t->item_d > 0 && $t->item_s == 1 )
                                                Refund: {{$t->sum('item_d')}} <br>
                                            @else
                                                Due: {{$t->sum('item_d')}}

                                            @endif
                                        </div>



                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
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
                    <h4 class="modal-title">Add New Expense</h4>
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
                                    <label for="ex_name">Expense Name</label>
                                    <input class="form-control" type="text" id="ex_name" name="ex_name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ex_price">Expense Amount</label>
                                    <input class="form-control" type="text" id="ex_price" name="ex_price">
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

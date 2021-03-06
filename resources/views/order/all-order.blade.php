<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="all-order" hidden>
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Order</a></li>
                            <li class="breadcrumb-item active">All Order List</li>
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
                                <h3 class="card-title">All Order List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Order Number/Table</th>
                                        <th>Kitchen Status</th>
                                        <th>Payment Status</th>
                                        <th>Order By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($s=1)
                                    @foreach($p->unique('order_id') as $e )
                                    <tr>
                                        <td>{{$s++}}</td>
                                        <td class="font-weight-bold">
                                            Order: <span>{{$e->order_id}}</span> <br>
                                            Table: <span>{{$e->order_tbl}}</span> <br>
                                            @if($e->dish_status == 9 ||$e->dish_status < 5)

                                            @elseif(Session::get('emp_type') == 1)
                                                <a href="javascript:void(0)" onclick="location.href='{{URL::to('or-can/'.$e->order_id)}}'"><button class="btn-sm btn-danger">Order Cancel</button></a>
                                            @endif

                                        </td>
                                        <td>
                                            @if($e->dish_status == 2)
                                                <button class="btn btn-secondary">Ready</button>
                                            @elseif($e->dish_status == 1)
                                                <button class="btn btn-info">Cocking</button>
                                            @elseif($e->dish_status == 3)
                                                <button class="btn btn-success">Complete</button>
                                            @elseif($e->dish_status == 6)
                                                <button class="btn btn-dark">Order Cancelled</button>
                                            @elseif($e->dish_status == 9)
                                                <button class="btn btn-success">Order Delivered</button>
                                            @else
                                              <button class="btn btn-warning">Pending</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($e->pay_status == 0)
                                                <button class="btn btn-danger">Unpaid</button>
                                                @elseif($e->pay_status == 2)
                                                    <button class="btn btn-warning">Partial Paid</button>
                                            @elseif($e->pay_status >= 5)
                                                <button class="btn btn-dark">Order Cancelled</button>
                                            @else
                                                <button class="btn btn-success">Paid</button>
                                            @endif
                                        </td>
                                        <td><span class="font-weight-bold">{{$e->order_by}}</span><br>{{$e->emp_id}} <br>@if($e->emp_type == 1) Admin @else Waiter @endif</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="location.href='{{URL::to('details-order/'.$e->order_id)}}'"><button class="btn btn-primary">Details</button></a>
                                            @if($e->dish_status == 2)
                                                <a href="javascript:void(0)" onclick="location.href='{{URL::to('deliver/'.$e->order_id)}}'"><button class="btn btn-warning">Deliver</button></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Order Number/Table</th>
                                        <th>Kitchen Status</th>
                                        <th>Payment Status</th>
                                        <th>Order By</th>
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
@endsection

<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="admin-dash" hidden>
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
                            <li class="breadcrumb-item active">Waiter Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$orderwithpay->unique('order_id')->count()}}</h3>

                                <p>Today's Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-indigo">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('dish_status',9)->unique('order_id')->count()}}</h3>

                                <p>Today's Completed</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('dish_status',1)->unique('order_id')->count()}}</h3>

                                <p>On Processing</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-fuchsia">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('dish_status',2)->unique('order_id')->count()}}</h3>

                                <p>Ready Dish</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('dish_status',3)->unique('order_id')->count()}}</h3>

                                <p>Ready For Delivery</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-black">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('dish_status',6)->unique('order_id')->count()}}</h3>

                                <p>Cancelled Delivery</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('pay_status',">",0)->sum('grand_price')}}</h3>

                                <p>Today's Sell</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('pay_status',0)->sum('pay_price')}}</h3>

                                <p>Today's Unpaid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('unpaid-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                Waiter Sale Information
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                       <th>Table/Order ID</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($e =1)
                                    @foreach($orderwithpay->unique('order_id') as $r)
                                    <tr>
                                       <td>{{$e++}}</td>
                                        <td>{{$r->order_tbl}}<br>
                                            Order ID: <a href="{{URL::to('details-order/'.$r->order_id)}}">{{$r->order_id}}
                                            </a> <br>
                                            @foreach($kitchen as $k) @if($k->or_id == $r->order_id) Cooking By: {{$k->ki_by}} @endif  @endforeach
                                        </td>
                                        <td>
                                            @php($w =1)
                                            @foreach($orderwithpay as $rr)
                                                @if($r->order_id == $rr->order_id)
                                                {{$w++}} . {{$rr->dish_name}} - {{$rr->dish_q}} <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($r->dish_status == 0)
                                                <button class="btn btn-warning">Pending</button>
                                                @foreach($orderwithpay as $pa)
                                                    @if($r->order_id == $pa->order_id)
                                                        <button class="btn btn-outline-danger">Due: {{$pa->pay_price}}</button>
                                                    @endif
                                                @endforeach
                                            @elseif($r->dish_status == 1)
                                                <button class="btn btn-primary">Cocking</button>
                                                @foreach($orderwithpay as $pa)
                                                    @if($r->order_id == $pa->order_id)
                                                        <button class="btn btn-outline-danger">Due: {{$pa->pay_price}}</button>
                                                    @endif
                                                @endforeach
                                            @elseif($r->dish_status == 2)
                                                <button class="btn btn-outline-success">Ready</button>
                                              @foreach($orderwithpay as $pa)
                                                  @if($r->order_id == $pa->order_id)
                                                        <button class="btn btn-outline-danger">Due: {{$pa->pay_price}}</button>
                                                    @endif
                                                @endforeach
                                            @elseif($r->dish_status == 3)
                                                <button class="btn btn-outline-success">Ready For Serve</button>
                                                @foreach($orderwithpay as $pa)
                                                    @if($r->order_id == $pa->order_id)
                                                        <button class="btn btn-outline-danger">Due: {{$pa->pay_price}}</button>
                                                    @endif
                                                @endforeach
                                            @elseif($r->dish_status == 9)
                                                <button class="btn btn-success">Delivered</button>
                                                @foreach($orderwithpay as $pa)
                                                    @if($r->order_id == $pa->order_id)
                                                        <button class="btn btn-outline-danger">Due: {{$pa->pay_price}}</button>
                                                    @endif
                                                @endforeach
                                            @else
                                                <button class="btn btn-danger">Cancelled</button>
                                                @foreach($orderwithpay as $pa)
                                                    @if($r->order_id == $pa->order_id)
                                                        <button class="btn btn-outline-danger">Due: {{$pa->pay_price}}</button>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if($r->dish_status == 3)
                                                <a href="{{URL::to('deliver/'.$r->order_id)}}"><button class="btn btn-warning">Deliver</button></a>
                                            @endif
                                                <a href="{{URL::to('details-order/'.$r->order_id)}}"><button class="btn btn-primary">Details</button></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-cyan">
                                Order Information
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Dish Name</th>
                                        <th>Order</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                             @php($s=1)
                             @foreach($orderwithpay->unique('dish_name') as $r)
                                     <tr>
                                         <td>{{$s++}}</td>
                                         <td class="font-weight-bold">{{$r->dish_name}}</td>
                                         <td>
                                             @php($d=0)
                                         @foreach($orderwithpay as $e)
                                             @if($r->dish_name == $e->dish_name)
                                                 @php($d++)
                                                 @endif
                                             @endforeach
                                             {{$d}}
                                         </td>
                                     </tr>
                             @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

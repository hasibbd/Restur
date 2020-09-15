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
                        <li class="breadcrumb-item active">Admin Dashboard</li>
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
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$orderwithpay->where('pay_status',">",0)->sum('grand_price')}}</h3>

                            <p>Today's Sell</p>
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
                            <h3>{{$expense}}</h3>

                            <p>Today's Expense</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{URL::to('expense')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$thisorder}}</h3>

                            <p>This Month's Orders</p>
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
                            <h3>{{$thisincome}}</h3>

                            <p>This Month's Income</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{URL::to('income')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-pink">
                        <div class="inner">
                            <h3>{{$thisexpense}}</h3>

                            <p>This Month's Expense</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{URL::to('expense')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-fuchsia">
                        <div class="inner">
                            <h3>{{$thiscan}}</h3>

                            <p>Cancelled in This month</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{URL::to('all-orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            Today's Waiter Sale Information
                        </div>
                        <div class="card-body text-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    @foreach($employee as $or)
                                    <th scope="col">{{$or->emp_name}} <br> <span class="small">ID: {{$or->emp_id}}</span></th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    @foreach($employee as $or)
                                        @php($t=0)
                                        @foreach($orderwithpay->unique('order_id') as $oe)
                                            @if($or->emp_name == $oe->order_by)
                                            @php($t++)
                                            @endif
                                    @endforeach
                                            <td><button class="btn btn-success">{{$t}}</button></td>
                                    @endforeach

                                </tr>

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
                           Today's Kitchen Cooking Information
                        </div>
                        <div class="card-body text-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    @foreach($kitemployee as $or)
                                        <th scope="col">{{$or->emp_name}} <br> <span class="small">ID: {{$or->emp_id}}</span></th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>

                                    @foreach($kitemployee as $or)
                                        @php($t=0)
                                        @foreach($kit as $oe)
                                            @if($or->emp_id == $oe->ki_by)
                                                @php($t++)
                                            @endif
                                        @endforeach
                                        <td><button class="btn btn-success">{{$t}}</button></td>
                                    @endforeach

                                </tr>

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
                            <h3 class="card-title">All Stock Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Item Name</th>
                                    <th>Total Stock (KG/L)</th>
                                    <th>Used Stock (KG/L)</th>
                                    <th>Available Stock (KG/L)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($r = 1)
                                @foreach($stock as $s)
                                    <tr>
                                        <td>{{$r++}}</td>
                                        <td class="font-weight-bold">{{$s->s_name}}</td>
                                        <td>{{$s->s_q/1000}}</td>
                                        <td>{{$s->s_u/1000}}</td>
                                        <td class="font-weight-bold">
                                            @if(($s->s_q - $s->s_u)/1000 > 10)
                                                <span class="text-success">{{($s->s_q - $s->s_u)/1000}}</span>
                                            @elseif(($s->s_q - $s->s_u)/1000 > 5 )
                                                <span class="text-warning">{{($s->s_q - $s->s_u)/1000}}</span>
                                            @else
                                                <span class="text-danger">{{($s->s_q - $s->s_u)/1000}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL.</th>
                                    <th>Item Name</th>
                                    <th>Total Stock (KG/L)</th>
                                    <th>Used Stock (KG/L)</th>
                                    <th>Available Stock (KG/L)</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            Cocking Information
                        </div>
                        <div class="card-body">
                        <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Item</th>
                                    <th>Uncooked</th>
                                    <th>Cooking</th>
                                    <th>Cancelled</th>
                                    <th>Ready</th>
                                    <th>Ready For Serve</th>
                                    <th>Delivered</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($s= 1)
                                @foreach($orderwithpay->unique('dish_name') as $or)
                                    <tr>
                                        <td>{{$s++}}</td>
                                        <td>{{$or->dish_name}}</td>
                                        <td>
                                            <button class="btn btn-primary">{{$orderwithpay->where('dish_name',$or->dish_name)->where('dish_status',0)->count()}}</button>
                                        </td>

                                        <td>
                                            <button class="btn btn-warning">{{$orderwithpay->where('dish_name',$or->dish_name)->where('dish_status',1)->count()}}</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger">{{$orderwithpay->where('dish_name',$or->dish_name)->where('dish_status',6)->count()}}</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success">{{$orderwithpay->where('dish_name',$or->dish_name)->where('dish_status',2)->count()}}</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success">{{$orderwithpay->where('dish_name',$or->dish_name)->where('dish_status',3)->count()}}</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success">{{$orderwithpay->where('dish_name',$or->dish_name)->where('dish_status',9)->count()}}</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-cyan">
                            Order Information
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped example1">
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
                                        <td>{{$r->dish_name}}</td>
                                        <td class="font-weight-bold">
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

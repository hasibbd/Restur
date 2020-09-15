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
                            <li class="breadcrumb-item active">Kitchen Dashboard</li>
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
                            <a href="{{URL::to('kitchen/1')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('dish_status',2)->unique('order_id')->count()}}</h3>

                                <p>Today's Completed</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{URL::to('kitchen/2')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="{{URL::to('kitchen/3')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-black">
                            <div class="inner">
                                <h3>{{$orderwithpay->where('dish_status',6)->unique('order_id')->count()}}</h3>

                                <p>Cancelled Order</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('kitchen/4')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                Cocking Information
                            </div>
                            <div class="card-body">
                                <table  class="table table-bordered table-striped example1">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Item</th>
                                        <th>Uncooked</th>
                                        <th>Cooking</th>
                                        <th>Cancelled</th>
                                        <th>Ready</th>
                                        <th>Delivered</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($s= 1)
                                    @foreach($allorder->unique('dish_name') as $or)
                                      <tr>
                                          <td>{{$s++}}</td>
                                          <td>{{$or->dish_name}}</td>
                                          <td>
                                              <button class="btn btn-primary">{{$allorder->where('dish_name',$or->dish_name)->where('dish_status',0)->count()}}</button>
                                          </td>

                                          <td>
                                              <button class="btn btn-warning">{{$allorder->where('dish_name',$or->dish_name)->where('dish_status',1)->count()}}</button>
                                          </td>
                                          <td>
                                              <button class="btn btn-danger">{{$allorder->where('dish_name',$or->dish_name)->where('dish_status',6)->count()}}</button>
                                          </td>
                                          <td>
                                              <button class="btn btn-success">{{$allorder->where('dish_name',$or->dish_name)->where('dish_status',2)->count()}}</button>
                                          </td>
                                          <td>
                                              <button class="btn btn-success">{{$allorder->where('dish_name',$or->dish_name)->where('dish_status',9)->count()}}</button>
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
                                    @foreach($allorder->unique('dish_name') as $r)
                                        <tr>
                                            <td>{{$s++}}</td>
                                            <td>{{$r->dish_name}}</td>
                                            <td class="font-weight-bold">
                                                @php($d=0)
                                                @foreach($allorder as $e)
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-cyan">
                               Stock Information
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped example1">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Product Name</th>
                                        <th>Available (KG/L)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($t =1)
                                    @foreach($stock as $e)
                                    <tr>
                                        <td>{{$t++}}</td>
                                        <td>{{$e->s_name}}</td>
                                        <td class="font-weight-bold">
                                        @if(($e->s_q - $e->s_u)/1000 > 10) <span class="text-success">{{($e->s_q - $e->s_u)/1000}}</span>   @elseif(($e->s_q - $e->s_u)/1000 <= 10 && ($e->s_q - $e->s_u)/1000 >= 0  ) <span class="text-warning">{{($e->s_q - $e->s_u)/1000}}</span>  @else <span class="text-danger">{{($e->s_q - $e->s_u)/1000}}</span> @endif

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

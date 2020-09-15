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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                                <h3 class="card-title"> Stock Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-dark">
                                            <tr>
                                                <th>SL</th>
                                                <th>Order ID</th>
                                                <th>Item</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($s = 1)
                                            @foreach($data->unique() as $d)
                                            <tr>
                                                <td>{{$s++}}</td>
                                                <td>{{$d->order_id}}</td>
                                                <td>
                                                    @php($r =1)
                                                    @foreach($data as $d1)
                                                        @if($d->order_id == $d1->order_id)
                                                        {{$r++}} : {{$d1->dish_name}}, Q: {{$d1->dish_q}} <br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($d->dish_status == 2)
                                                        <button class="btn btn-secondary">Ready</button>
                                                    @elseif($d->dish_status == 1)
                                                        <button class="btn btn-info">Cocking</button>
                                                    @elseif($d->dish_status == 3)
                                                        <button class="btn btn-success">Complete</button>
                                                    @elseif($d->dish_status == 6)
                                                        <button class="btn btn-dark">Order Cancelled</button>
                                                    @elseif($d->dish_status == 9)
                                                        <button class="btn btn-success">Order Delivered</button>
                                                    @else
                                                        <button class="btn btn-warning">Pending</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <hr>
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
@endsection

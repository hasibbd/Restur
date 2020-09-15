<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="details-order" hidden>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Order</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
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
                <div class="row" id="pr">
                    <div class="col-md-12">
                        <div class="card" id="printthis">
                            <div class="card-header">
                                <h3 class="card-title">Order Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" >
                               <div class="row" >
                                   <div class="col-6">
                                       <div class="font-weight-bold">
                                           @foreach($o->unique('order_id') as $of)
                                               Table: {{$of->order_tbl}} <br>
                                               Order By: {{$of->order_by}} <br>
                                               Order ID: {{$of->order_id}} <br>
                                           @endforeach
                                           Payment:@foreach($p as $pa) @if($pa->pay_status == 0) Unpaid @elseif($pa->pay_status > 1) Partial Paid @else Paid @endif @endforeach<br>
                                       </div>
                                   </div>
                                   <div class="col-6 text-right">
                                       <div class="text-right"> <button class="btn btn-warning" id="printtable"><i class="fas fa-print"></i></button></div>
                                   </div>
                               </div>
                                <div class="table-responsive-sm">
                               <table class="table ">
                                   <thead>
                                   <tr class="bg-black ">
                                       <th>SL</th>
                                       <th>Dish</th>
                                       <th>Q.</th>
                                       <th>P/V/D</th>
                                       <th>Kitchen Status</th>
                                       <th>Total Price</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @php($s=1)
                                   @foreach($o as $or)
                                   <tr>
                                       <td>{{$s++}}</td>
                                       <td class="font-weight-bold">
                                           {{$or->dish_name}} <br>
                                           <span class="small">({{$or->dish_type}})</span>
                                       </td>
                                       <td>{{$or->dish_q}}</td>
                                       <td>
                                           @foreach($d as $di)
                                               @if($or->dish_name == $di->dish_name && $or->dish_type == $di->dish_type)
                                           Price: <span>{{$or->dish_q*$di->dish_price}}</span>, Vat: <span>{{$or->dish_q*($di->dish_price*($di->dish_vat/100))}}</span>, Discount: <span>{{$or->dish_q*($di->dish_price*($di->dish_discount/100))}}</span>
                                               @endif
                                           @endforeach
                                       </td>
                                       <td>@if($or->dish_status == 0) Pending @elseif($or->dish_status == 1) Cocking @else Completed @endif</td>
                                       <td class="font-weight-bold">
                                           @foreach($d as $di)
                                               @if($or->dish_name == $di->dish_name && $or->dish_type == $di->dish_type)
                                                   {{$or->dish_q*($di->dish_price + $di->dish_price*($di->dish_vat/100) - $di->dish_price*($di->dish_discount/100))}}
                                               @endif
                                           @endforeach
                                       </td>
                                   </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                                </div>
                                <div class="text-right font-weight-bold">
                                    @foreach($p as $pa)
                                    Total: <span> {{$pa->grand_price}}</span> <br>
                                    Due:<span id="td">{{$pa->pay_price }}</span> <br>
                                    @if($pa->pay_price > 0)
                                    <div class="form-group">
                                        <input class="form-control-sm" type="text" placeholder="Payment" id="ppp">
                                    </div>
                                        <div class="form-group">
                                            <input class="form-control-sm" type="text" placeholder="Change" id="ppc" disabled>
                                        </div>
                                    <div class="form-group">
                                        <a href="{{URL::to('payafter/'.$pa->id)}}"><button class="btn-sm btn-primary">Pay</button></a>
                                    </div>
                                        @endif
                                    @endforeach
                                </div>
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

<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="kitchen-live" hidden>
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
                            <li class="breadcrumb-item"><a href="#">Kitchen</a></li>
                            <li class="breadcrumb-item active">Live Kitchen</li>
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
                    <input type="text" id="re" value="5" hidden>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Order</h3>
                                <div class="text-right text-success"><p>Order list wll be update within <span id="chere"></span> seconds</p> </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               <div class="row" id="rere">
                                   @foreach($eee->unique('order_id') as $es)
                                       @php($sr =1)
                                       <div class="col-md-3">
                                           <div class="card bg-dark">
                                               <div class="card-header">
                                                   Order ID: {{$es->order_id}}
                                               </div>
                                               <div class="card-body example-1 scrollbar-ripe-malinka">
                                                       <h5 class="card-title">{{$es->dish_name}}</h5>
                                                       <p class="card-text m-0">{{$es->dish_type}}</p>
                                                       <div class="text-right">
                                                           Quantity: <span>{{$es->dish_q}}</span>
                                                       </div>


                                                   <a href="{{URL::to('change/'.$es->order_id)}}" class="btn btn-danger">Ok</a>
                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                                   @foreach($e->unique('order_id') as $es)
                                       @php($sr =1)
                                   <div class="col-md-3">
                                       <div class="card bg-gradient-blue ">
                                           <div class="card-header">
                                               Order ID: {{$es->order_id}}
                                           </div>
                                           <div class="card-body  example-1 scrollbar-ripe-malinka">
                                               @foreach($e as $t)
                                                   @if($es->order_id == $t->order_id)

                                               <h5 class="card-title">{{$sr++}}. {{$es->dish_name}}<span class="small"> ({{$es->dish_type}})</span></h5>
                                                       <br>
                                               <div class="text-right">
                                                 Quantity: <span>{{$es->dish_q}}</span>
                                               </div>
                                                       <hr>
                                                   @endif
                                               @endforeach
                                               <a href="{{URL::to('change/'.$es->order_id)}}" class="btn btn-danger">Start</a>
                                           </div>
                                       </div>
                                   </div>
                                   @endforeach
                                       @foreach($oncook->where('dish_status', 1)->unique('order_id') as $es)
                                           @php($sr =1)
                                               <div class="col-md-3">
                                                   <div class="card bg-gradient-lime">
                                                       <div class="card-header">
                                                           Order ID: {{$es->order_id}}
                                                       </div>
                                                       <div class="card-body example-1 scrollbar-ripe-malinka">
                                                           @foreach($oncook as $t)
                                                               @if($es->order_id == $t->order_id)

                                                                   <h5 class="card-title">{{$sr++}}. {{$es->dish_name}}<span class="small"> ({{$es->dish_type}})</span></h5>
                                                                   <br>
                                                                   <div class="text-right">
                                                                       Quantity: <span>{{$es->dish_q}}</span>
                                                                   </div>
                                                                   <hr>
                                                               @endif
                                                           @endforeach
                                                           <a href="{{URL::to('change/'.$es->order_id)}}" class="btn btn-danger">Complete</a>
                                                       </div>
                                                   </div>
                                               </div>
                                       @endforeach
                                       <br>
                                       @foreach($oncook->where('dish_status', 2)->unique('order_id') as $es)
                                           @php($sr =1)
                                           <div class="col-md-3">
                                               <div class="card bg-success">
                                                   <div class="card-header">
                                                       Order ID: {{$es->order_id}} <br>
                                                       Order By: {{$es->order_by}}
                                                   </div>
                                                   <div class="card-body example-1 scrollbar-ripe-malinka">
                                                       @foreach($oncook as $t)
                                                           @if($es->order_id == $t->order_id)

                                                               <h5 class="card-title">{{$sr++}}. {{$es->dish_name}}<span class="small"> ({{$es->dish_type}})</span></h5>
                                                               <br>
                                                               <div class="text-right">
                                                                   Quantity: <span>{{$es->dish_q}}</span>
                                                               </div>
                                                               <hr>
                                                           @endif
                                                       @endforeach
                                                       <a href="{{URL::to('change/'.$es->order_id)}}" class="btn btn-danger">Hand Over</a>
                                                   </div>
                                               </div>
                                           </div>
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

<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="expense" hidden>
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
                            <li class="breadcrumb-item"><a href="#">Accounting</a></li>
                            <li class="breadcrumb-item active">Expense</li>
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
                               <h3 class="card-title"> All Expense</h3>
                                <div class="text-right">
                                    <button class="btn btn-primary" id="modalshow">Add Expense</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @php($si = 1)
                                        @foreach($ac->unique('ex_year') as $a1)
                                            @foreach($ac->where('ex_year',$a1->ex_year)->unique('ex_month') as $a2)
                                                @php($s = 1)

                                                <div class="card" id="pr{{$si}}">
                                                    <div class="card-header bg-cyan">
                                                        <h3 class="card-title">
                                                            @switch($a2->ex_month)
                                                                @case(1) January @break
                                                                @case(2) February @break
                                                                @case(3) March @break
                                                                @case(4) April @break
                                                                @case(5) May @break
                                                                @case(6) June @break
                                                                @case(7) July @break
                                                                @case(8) August @break
                                                                @case(9) September @break
                                                                @case(10) October @break
                                                                @case(11) November @break
                                                                @case(12) December @break
                                                                @default N/A
                                                            @endswitch
                                                            -{{$a2->ex_year}}, Total Expense: <span id="inco{{$si}}">5</span></h3>
                                                        <div class="text-right">
                                                            <button type="button" class="btn btn-warning printtable"   value="{{$si}}">Print
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">


                                                        <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Order Item</th>
                                                                <th>Date</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php($sum = 0)
                                                            @foreach($acc->where('or_year',$a2->or_year)->where('or_month',$a2->or_month) as $a3)
                                                                <tr>
                                                                    <td class="font-weight-bold">{{$s++}}</td>
                                                                    <td class="font-weight-bold">{{$a3->ex_name}} <br>
                                                                        @if($a3->ex_type == 1)
                                                                            ID : <a href="{{URL::to('expense-details/'.$a3->ex_id)}}">{{$a3->ex_id}} </a>
                                                                            <button class="btn btn-warning edit" value="{{$a3->id}}" title="Edit"><i class="fas fa-edit"></i></button>
                                                                        @else
                                                                            ID : <a href="{{URL::to('stock-details/'.$a3->ex_id)}}">{{$a3->ex_id}} </a>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$a3->created_at->format('d-m-Y')}}</td>
                                                                    <td class="font-weight-bold">{{$a3->ex_amount}}</td>

                                                                </tr>
                                                                @php($sum = $sum + $a3->ex_amount)

                                                            @endforeach
                                                            <input type="text" id="sum{{$si++}}" value="{{$sum}}" hidden>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Order Item</th>
                                                                <th>Date</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endforeach

                                        @endforeach
                                        <input type="text" id="idmax" value="{{$si}}" hidden>



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

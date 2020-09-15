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
                            <li class="breadcrumb-item"><a href="#">Accounting</a></li>
                            <li class="breadcrumb-item active">Expense Details</li>
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
                                            <div class="col-md-6">
                                                @foreach($st as $t)
                                                    <div class="font-weight-bold">
                                                        Expense ID: {{$t->ex_id}} <br>
                                                        Expense By: {{$t->ex_by}} <br>
                                                        Expense Date:  {{$t->created_at->format('d-m-Y')}}</div><br>
                                                @endforeach
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-right"> <button class="btn btn-warning" id="printtable"><i class="fas fa-print"></i></button></div>
                                            </div>

                                        </div>


                                        <table class="table" id="example-table">
                                            <thead class="bg-dark">
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Expense</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($s=1)
                                            @foreach($st as $t)
                                                <tr>
                                                    <td>{{$s++}}</td>
                                                    <td class="font-weight-bold">{{$t->ex_name}}</td>
                                                    <td>{{$t->ex_amount}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <hr>
                               <div class="text-right font-weight-bold">
                                   Total: {{$t->ex_amount}}
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
@endsection

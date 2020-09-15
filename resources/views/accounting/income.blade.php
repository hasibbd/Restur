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
                            <li class="breadcrumb-item"><a href="#">Accounting</a></li>
                            <li class="breadcrumb-item active">Income</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                 <div class="card">
                                     <div class="card-body">
                                         <div class="row">
                                             <div class="col-md-4 offset-2">
                                                 <div class="form-group">
                                                     <label for="mmmm">Month</label>
                                                     <select class="form-control select2bs4 sl" style="width: 100%;" id="mmmm" name="mmmm">
                                                         <option value="0" selected>Choose...</option>
                                                         <option value="1" >January</option>
                                                         <option value="2" >February</option>
                                                         <option value="3" >March</option>
                                                         <option value="4" >April</option>
                                                         <option value="5" >May</option>
                                                         <option value="6" >June</option>
                                                         <option value="7" >July</option>
                                                         <option value="8" >August</option>
                                                         <option value="9" >September</option>
                                                         <option value="10" >October</option>
                                                         <option value="11" >November</option>
                                                         <option value="12" >December</option>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-md-4">
                                                 <div class="form-group">
                                                     <label for="yy">Year</label>
                                                     <input class="form-control" type="text" name="yy" id="yy">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-6 offset-3">
                                                     <button class="btn btn-primary btn-block" id="getincome">Get Data</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Order ID</th>
                                                <th>Order By</th>
                                                <th>Price</th>
                                                <th>Vat</th>
                                                <th>Discount</th>
                                                <th>Grand Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Order ID</th>
                                                <th>Order By</th>
                                                <th>Price</th>
                                                <th>Vat</th>
                                                <th>Discount</th>
                                                <th>Grand Price</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="card container">
                                    <div class="row py-4">
                                        <div class="col-md-6">
                                            <p class="lead font-weight-bold px-2">Total Income: <span id="inco">0</span></p>

                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button class="btn btn-primary" id="printtable">Print</button>
                                        </div>
                                    </div>
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

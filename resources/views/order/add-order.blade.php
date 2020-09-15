<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="add-order" hidden>
    <div class="content-wrapper py-3">
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

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="table_name">Table</label>
                                                        <select class="form-control select2 sld" style="width: 100%;" id="table_name" name="table_name">
                                                            <option value="0" selected>Choose...</option>
                                                            @foreach($table as $v)
                                                                <option value="{{$v->tbl_name}}">{{$v->tbl_name}} ({{$v->tbl_capacity}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="dish_type">Dish Type</label>
                                                        <select class="form-control select2 sl" style="width: 100%;" id="dish_type" name="dish_type">
                                                            <option value="0" selected>Choose...</option>
                                                            @foreach($dish as $v)
                                                                <option value="{{$v->pdt_name}}">{{$v->pdt_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="dish_name">Dish Name</label>
                                                        <select class="form-control select2 sl" style="width: 100%;" id="dish_name" name="dish_name">
                                                            <option value="0" selected>Choose...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                               <div class="col-md-3">
                                                   <div class="form-group">
                                                       <label for="dish_type">Quantity</label>
                                                       <input class="form-control" type="text" value="0" id="quan">
                                                   </div>
                                               </div>
                                               <div class="col-md-3">
                                                   <div class="form-group">
                                                       <label for="dish_type">Discount (%)</label>
                                                       <input class="form-control" type="text" disabled value="0" id="disc">
                                                   </div>
                                               </div>
                                               <div class="col-md-3">
                                                   <div class="form-group">
                                                       <label for="dish_type">Vat (%)</label>
                                                       <input class="form-control" type="text" disabled value="0" id="vat">
                                                   </div>
                                               </div>
                                               <div class="col-md-3">
                                                   <div class="form-group">
                                                       <label for="dish_type">Price</label>
                                                       <input class="form-control" type="text" disabled value="0" id="price">
                                                   </div>
                                               </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-4">
                                                <div class="form-group text-center">
                                                    <button class="btn btn-info" id="button1">Add Dish</button>
                                                    <button class="btn btn-warning" id="pagerefresh">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table" id="example-table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Dish Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Q</th>
                                                <th scope="col">P</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <hr>
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="font-weight-bold">
                                                     Price: <span id="g_p">0</span><br>
                                                     Vat: <span id="g_v">0</span><br>
                                                     Discount: <span id="g_d">0</span><br>
                                                     Total Price: <span id="g_g_p">0</span>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 text-right">
                                                 <div class="form-group">
                                                     <label for="">Payment</label>
                                                 <input id="payin" class="form-control-sm" type="text" value="">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="">Change</label>
                                                 <input id="paych" class="form-control-sm" type="text" value="0" disabled>
                                                     </div>
                                                 <div class="form-group text-right">
                                                     <button id="orderdone" class="btn btn-info">Order Dish</button>
                                                 </div>
                                             </div>
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

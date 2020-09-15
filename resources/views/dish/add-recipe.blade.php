<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="add-recipe" hidden>
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
                            <li class="breadcrumb-item"><a href="#">Dish</a></li>
                            <li class="breadcrumb-item active">Recipe</li>
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
                    <input type="text" id="re" value="6" hidden>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Dish Recipe</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <img src="{{asset('image/dish/'.$emp->dish_image)}}" alt="" style="width: 250px;">
                                      <h3>Dish Name: <span>{{$emp->dish_name}}</span></h3>
                                      <h5>Dish Type: <span>{{$emp->dish_type}}</span></h5>
                                  </div>
                                  <div class="col-md-6">
                                      <form method="post" action="{{URL::to('add-recipe')}}">
                                          @csrf
                                      <div class="row">
                                          <input type="text" hidden name="d_name" value="{{$emp->dish_name}}">
                                          <input type="text" hidden name="d_type" value="{{$emp->dish_type}}">
                                          <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label for="ite">Item/Product</label>
                                                      <select class="form-control select2" style="width: 100%;" id="ite" name="ite">
                                                          <option value="0" selected>Choose...</option>
                                                          @foreach($item->unique('item_name') as $v)
                                                              <option value="{{$v->item_name}}">{{$v->item_name}}</option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="form-group">
                                              <label for="r_q">Quantity (gm/ml)</label>
                                              <input class="form-control" type="text" name="r_q" id="r_q">
                                              </div>
                                          </div>
                                      </div>
                                          <div class="text-right">
                                              <button class="btn btn-primary " type="submit">Save</button>
                                          </div>
                                      </form>

                                  </div>
                              </div>
                                <hr>
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Item Name</th>
                                            <th>Item Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($s=1)
                                        @foreach($re as $r)
                                        <tr>
                                            <td>{{$s++}}</td>
                                            <td>{{$r->i_name}}</td>
                                            <td>{{$r->i_q}} gm/ml</td>
                                            <td>
                                                <a href="{{URL::to('delete-recipe/'.$r->id)}}"><button class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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

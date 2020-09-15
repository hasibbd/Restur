<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="recipe" hidden>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dish Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dish Management</li>
                            <li class="breadcrumb-item active">Dish Recipe</li>
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
                                <h3 class="card-title">All Dish Recipe</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Dish Image</th>
                                                <th>Dish Info</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($s = 1)
                                            @foreach($emp as $e)
                                                <tr>
                                                    <th>{{$s++}}</th>
                                                    <th>
                                                        <img src="{{asset('image/dish/'.$e->dish_image)}}"
                                                             style="width: 140px;" alt=""> <br>
                                                        Name: {{$e->dish_name}} <br>
                                                        Type: {{$e->dish_type}}
                                                    </th>
                                                    <th>
                                                        <table class="table table-sm">
                                                            <tbody>
                                                            @foreach($re as $r)
                                                                <tr>
                                                                    <th>
                                                                        @if($e->dish_name == $r->d_name)
                                                                            {{$r->i_name}}
                                                                        @endif
                                                                    </th>
                                                                    <td>
                                                                        @if($e->dish_name == $r->d_name)
                                                                            {{$r->i_q}} gm/ml
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>

                                                    </th>
                                                    <td>
                                                        <a href="{{URL::to('add-recipe/'.$e->id)}}">
                                                            <button class="btn bg-info">Add/Edit</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>


                                            <tfoot>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Dish Image</th>
                                                <th>Dish Info</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
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



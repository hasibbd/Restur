<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="all-stock" hidden>
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
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item">Stock Managements</li>
                            <li class="breadcrumb-item active">All Stock</li>
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
                                <h3 class="card-title">All Stock Info</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-responsive-sm example" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Item Name</th>
                                        <th>Total Stock (KG/L)</th>
                                        <th>Used Stock (KG/L)</th>
                                        <th>Available Stock (KG/L)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($r = 1)
                                    @foreach($st as $s)
                                    <tr>
                                        <td>{{$r++}}</td>
                                        <td class="font-weight-bold">{{$s->s_name}}</td>
                                        <td>{{$s->s_q/1000}}</td>
                                        <td>{{$s->s_u/1000}}</td>
                                        <td class="font-weight-bold">
                                        @if(($s->s_q - $s->s_u)/1000 > 10)
                                                <span class="text-success">{{($s->s_q - $s->s_u)/1000}}</span>
                                                @elseif(($s->s_q - $s->s_u)/1000 > 5 )
                                                    <span class="text-warning">{{($s->s_q - $s->s_u)/1000}}</span>
                                            @else
                                                <span class="text-danger">{{($s->s_q - $s->s_u)/1000}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Item Name</th>
                                        <th>Total Stock (KG/L)</th>
                                        <th>Used Stock (KG/L)</th>
                                        <th>Available Stock (KG/L)</th>
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

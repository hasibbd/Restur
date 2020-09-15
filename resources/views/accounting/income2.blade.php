<!-- Content Wrapper. Contains page content -->
@extends('admin.admin')
@section('content')
    <input type="text" id="pageno" value="income" hidden>
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
                                @php($si = 1)
                                @foreach($ac->unique('or_year') as $a1)
                                    @foreach($ac->where('or_year',$a1->or_year)->unique('or_month') as $a2)
                                        @php($s = 1)

                                      <div class="card" id="pr{{$si}}">
                                          <div class="card-header bg-cyan">
                                              <h3 class="card-title">
                                                  @switch($a2->or_month)
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
                                                      -{{$a2->or_year}}, Total Income: <span id="inco{{$si}}">5</span>
                                              </h3>
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
                                                <th>Date</th>
                                                <th>Order ID</th>
                                                <th>Order By</th>
                                                <th>Price</th>
                                                <th>Vat</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($sum = 0)
                                            @foreach($ac->where('or_year',$a2->or_year)->where('or_month',$a2->or_month) as $a3)
                                            <tr>
                                                <td>{{$s++}}</td>
                                                <td>{{$a3->created_at->format('d-m-Y')}}</td>
                                                <td><a href="{{URL::to('details-order/'.$a3->or_id)}}">{{$a3->or_id}}</a></td>
                                                <td>{{$a3->or_by}}</td>
                                                <td>{{$a3->or_price}}</td>
                                                <td>{{$a3->or_vat}}</td>
                                                <td>{{$a3->or_discount}}</td>
                                                <td class="font-weight-bold">{{$a3->or_grand_price}}</td>

                                            </tr>
                                            @php($sum = $sum + $a3->or_grand_price)

                                            @endforeach
                                            <input type="text" id="sum{{$si++}}" value="{{$sum}}" hidden>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Order ID</th>
                                                <th>Order By</th>
                                                <th>Price</th>
                                                <th>Vat</th>
                                                <th>Discount</th>
                                                <th>Total</th>
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

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

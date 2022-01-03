@extends('admin.admin_master')


@section('admin')



    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Return Request List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th>Invoice</th>
                                        <th>Date </th>
                                        <th>Amount</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    {{--       Category View   --}}

                                    @foreach($orders as $item)
                                        <tr>

                                            <td>{{$item->invoice_no}}</td>
                                            <td>{{$item->order_date}}</td>
                                            <td>${{$item->amount}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td>
                                                @if($item->return_order == 1)
                                                    <span class="badge badge-pill badge-danger"><strong>Pending</strong></span>
                                                @elseif($item->return_order == 2)
                                                    <span class="badge badge-pill badge-danger"><strong>Success</strong></span>
                                                @endif

                                            </td>
                                            <td>
                                                <span class="badge badge-success"><strong>Return Success</strong></span>
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>


                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->




            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>



@endsection

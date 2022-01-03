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
                            <h3 class="box-title">Processing Orders List</h3>
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
                                            <td><span class="badge badge-pill badge-danger"><strong>{{$item->status}}</strong></span></td>
                                            <td>
                                                <a href="{{route('pending.order.details',$item->id)}}" class="btn btn-info"><i class="fa fa-eye" title="Edit Data"></i></a>
                                                <a target="_blank" href="{{route('invoice.download',$item->id)}}" class="btn btn-danger" id=""><i class="fa fa-download" title="Invoice Download"></i></a>
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

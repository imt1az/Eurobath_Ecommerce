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
                            <h3 class="box-title">Pending List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th>Summary</th>
                                        <th>Comment</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    {{--       Category View   --}}

                                    @foreach($review as $item)
                                        <tr>

                                            <td>{{$item->summary}}</td>
                                            <td>{{$item->comment}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->product->product_name_en}}</td>
                                            <td>
                                                @if($item->status == 0)
                                                    <span class="badge badge-pill badge-danger"><strong>Pending</strong></span>
                                                @elseif($item->return_order == 1)
                                                    <span class="badge badge-pill badge-danger"><strong>Success</strong></span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{route('review.approve',$item->id)}}" class="btn btn-success btn-rounded"><strong>Approve</strong></a>
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

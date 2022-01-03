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
                            <h3 class="box-title">Total Admin User</h3>
                            <a href="{{route('add.admin')}}" class="btn btn-danger" style="float: right">Add Admin User</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Name </th>
                                        <th>Email</th>
                                        <th>Access</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    {{--       Category View   --}}

                                    @foreach($adminuser as $item)
                                        <tr>

                                            <td><img src="{{asset($item->profile_photo_path)}}" style="width:100px;height:100px;"></td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                @if($item->brand == 1)
                                                    <span class="badge badge-primary">Brand</span>
                                                @else
                                                @endif

                                                    @if($item->category == 1)
                                                        <span class="badge badge-secondary">Category</span>
                                                    @else
                                                    @endif

                                                    @if($item->slider == 1)
                                                        <span class="badge badge-success">Slider</span>
                                                    @else
                                                    @endif

                                                    @if($item->coupons == 1)
                                                        <span class="badge badge-danger">Coupons</span>
                                                    @else
                                                    @endif

                                                    @if($item->shipping == 1)
                                                        <span class="badge badge-warning">Shipping</span>
                                                    @else
                                                    @endif

                                                    @if($item->blog == 1)
                                                        <span class="badge badge-info">Blog</span>
                                                    @else
                                                    @endif

                                                    @if($item->setting == 1)
                                                        <span class="badge badge-light">Setting</span>
                                                    @else
                                                    @endif
                                                    @if($item->returnorder == 1)
                                                        <span class="badge badge-dark">Returnorder</span>
                                                    @else
                                                    @endif

                                                    @if($item->review == 1)
                                                        <span class="badge badge-info">Review</span>
                                                    @else
                                                    @endif

                                                    @if($item->orders == 1)
                                                        <span class="badge badge-warning">Orders</span>
                                                    @else
                                                    @endif

                                                    @if($item->stock == 1)
                                                        <span class="badge badge-danger">Stock</span>
                                                    @else
                                                    @endif

                                                    @if($item->reports == 1)
                                                        <span class="badge badge-success">Reports</span>
                                                    @else
                                                    @endif

                                                    @if($item->alluser == 1)
                                                        <span class="badge badge-warning">All user</span>
                                                    @else
                                                    @endif

                                                    @if($item->adminuserrole == 1)
                                                        <span class="badge badge-info">Admin User Role</span>
                                                    @else
                                                    @endif


                                            </td>
                                            <td>
                                                <a href="{{route('edit.admin.user',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                                <a href="{{route('delete.admin.user',$item->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" title="Invoice Download"></i></a>
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

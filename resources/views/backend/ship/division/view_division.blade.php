@extends('admin.admin_master')


@section('admin')



    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Divisions List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Division Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    {{--       Division View   --}}

                                    @foreach($divisions as $item)
                                        <tr>
                                            <td>{{$item->division_name}}</td>
                                            <td>
                                                <a href="{{route('division.edit',$item->id)}}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                                <a href="{{route('division.delete',$item->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" title="Delete Data"></i></a>
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


                {{------------------Add Division _______________--}}
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Division</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{route('division.store')}}" >
                                    @csrf

                                    <div class="form-group">
                                        <h5>Divisions Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="division_name"
                                                   class="form-control">
                                            @error('division_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--end col md 6--}}


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-warning mb-5" value="Add New">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>


            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>



@endsection

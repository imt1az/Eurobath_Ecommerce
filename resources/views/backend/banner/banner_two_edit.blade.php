@extends('admin.admin_master')


@section('admin')



    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">



                <!-- /.col -->


                {{------------------Update SliderList_______________--}}
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Banner Two</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{route('bannerTwo.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$banner_two->id}}">
                                    <input type="hidden" name="old_image" value="{{$banner_two->bannerTwo_img}}">

                                    <div class="form-group">
                                        <h5>Banner Two Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" value="{{$banner_two->title}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Banner Two Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" value="{{$banner_two->description}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Banner Two Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="bannerTwo_img" class="form-control">
                                            @error('bannerTwo_img')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    {{--end col md 6--}}


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-warning mb-5" value="Update">
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

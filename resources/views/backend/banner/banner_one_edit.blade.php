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
                            <h3 class="box-title">Update Banner One</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{route('bannerOne.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$banner_one->id}}">
                                    <input type="hidden" name="old_image" value="{{$banner_one->bannerOne_img}}">

                                    <div class="form-group">
                                        <h5>Banner One Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" value="{{$banner_one->title}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Banner One Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" value="{{$banner_one->description}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Banner One Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="bannerOne_img" class="form-control">
                                            @error('bannerOne_img')
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

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
                            <h3 class="box-title">Update Inner Banner</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{route('innerBanner.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$innerBanner->id}}">
                                    <input type="hidden" name="old_image" value="{{$innerBanner->innerBanner_img}}">

                                    <div class="form-group">
                                        <h5>Inner Banner Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" value="{{$innerBanner->title}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Inner Banner Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" value="{{$innerBanner->description}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Inner Banner Image<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="innerBanner_img" class="form-control">
                                            @error('innerBanner_img')
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

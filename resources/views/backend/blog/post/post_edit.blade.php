@extends('admin.admin_master')


@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Post</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('post-update',$blogpost->id)}}" enctype="multipart/form-data">
                                @csrf
{{--                                <input type="hidden" name="id" value="{{$blogpost->id}}">--}}
                                <div class="row">

                                    <div class="col-12">



                                        {{------2nd Row Start----------}}

                                        <div class="row">



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$blogpost->post_title_en}}" name="post_title_en" class="form-control"
                                                               required="">

                                                        @error('post_title_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Name Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" value="{{$blogpost->post_title_hin}}" name="post_title_hin" class="form-control"
                                                               required="">

                                                        @error('post_title_hin')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{------2nd Row End----------}}











                                        {{------6th Row Start----------}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Blog Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control"
                                                                required="">
                                                            <option value="" selected="{{$blogpost->category->blog_category_name_en}}" disabled="">Select Blog-Category
                                                            </option>
                                                            @foreach($blogcategory as $category)
                                                                <option
                                                                    value="{{ $category->id }}" {{$category->id == $blogpost->category_id ? 'selected':'' }}>{{ $category->blog_category_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <input type="hidden" name="old_img" value="{{$blogpost->post_image}}">
                                                <div class="form-group">
                                                    <h5>Post Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <img src="{{asset($blogpost->post_image)}}" style="height: 280px; width: 280px;">
                                                        <input type="file" required="" name="post_image"
                                                               class="form-control" onchange="mainThamUrl(this)">


                                                        @error('post_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{------6th Row End----------}}





                                        {{------8th Row Start----------}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Details English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" required="" value="" name="post_details_en"
                                                                  rows="10" cols="80">
												{{$blogpost->post_details_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Details Bangla<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" required="" value="" name="post_details_hin"
                                                                  rows="10" cols="80">
												{{$blogpost->post_details_hin}}</textarea>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        {{------8th Row End----------}}


                                    </div>

                                </div>




                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-warning mb-5" value="Update Post">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>




    <script type="text/javascript">

        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>




@endsection

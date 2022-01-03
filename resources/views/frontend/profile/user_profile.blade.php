@extends('frontend.main_master')

@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar');

                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <h3 class="text-center">
                        <span class="text-danger">HI....</span><strong>{{Auth::user()->name}}</strong>
                        Update your profile
                    </h3>

                    <div class="card-body">
                        <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" >Name</label>
                                <input type="text"  name="name" value="{{$user->name}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="info-title" >Email</label>
                                <input type="email"  name="email" value="{{$user->email}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title">Phone Number</label>
                                <input type="text"  name="phone" value="{{$user->phone}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="info-title">User Image</label>
                                <input type="file"  name="profile_photo_path" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn-upper btn btn-danger ">Update</button>
                            </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

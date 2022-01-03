@extends('frontend.main_master')

@section('content')

{{--    @php--}}
{{--    $user = DB::table('users')->where('id',Auth::user()->id)->first();--}}
{{--    @endphp--}}

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar');

                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <h3 class="text-center">
                        <span class="text-danger"></span><strong style="color: red"> Change Password</strong>

                    </h3>

                    <div class="card-body">
                        <form method="post" action="{{route('user.password.update')}}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" >Current Password</label>
                                <input type="password"  name="oldpassword"  id="current_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="info-title" >New Password</label>
                                <input id="password" type="password"  name="password"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title">Confirm Password</label>
                                <input id="password_confirmation" type="password"  name="password_confirmation"  class="form-control">
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

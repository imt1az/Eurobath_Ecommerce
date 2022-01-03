@extends('frontend.main_master')

@section('title')
   My Checkout
@endsection

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>CheckOut</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-4" >
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>Checkout Method
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                                                <form class="register-form" action="{{route('checkout.store')}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b><span>*</span></label>
                                                        <input type="text" required="" name="shipping_name" value="{{Auth::user()->name}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Shipping Email Address</b><span>*</span></label>
                                                        <input type="text" required="" name="shipping_email" value="{{Auth::user()->email}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Phone</b><span>*</span></label>
                                                        <input type="number" required="" name="shipping_phone" value="{{Auth::user()->phone}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Post Code</b><span>*</span></label>
                                                        <input type="text" required="" name="post_code" value="" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code">
                                                    </div>


                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->

                                            <div class="col-md-6 col-sm-6 already-registered-login">

                                                <div class="form-group">
                                                    <h5><b>Division Select </b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="division_id" class="form-control" required="" >
                                                            <option value="" selected="" disabled="">Select Division</option>
                                                            @foreach($divisions as $item)
                                                                <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- // end form group -->


                                                <div class="form-group">
                                                    <h5><b>District Select</b>  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="district_id" class="form-control" required="" >
                                                            <option value="" selected="" disabled="">Select District</option>

                                                        </select>
                                                        @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- // end form group -->


                                                {{-- <div class="form-group">
                                                    <h5><b>State Select</b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="state_id" class="form-control"  >
                                                            <option value="" selected="" disabled="">Select State</option>

                                                        </select>
                                                        @error('state_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- // end form group --> --}}

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Address<span>*</span></label>
                                                     <textarea class="form-control" name="notes" cols="30" rows="5" placeholder="Address"></textarea>
                                                </div>




                                            </div>
                                            <!-- already-registered-login -->

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                            <li>
                                                <strong>Image: </strong>
                                                <img src="{{asset($item->options->image)}}" style="height: 80px;width: 80px; display: block;">
                                            </li>
                                            <li>
                                                <strong>Quantity: </strong>
                                                ({{$item->qty}})
                                                <br>

                                                <strong>Color: </strong>
                                                ({{$item->options->color}})
                                                <br>
                                                <strong>Size: </strong>
                                                ({{$item->options->size}})
                                                <hr>
                                            </li>
                                            @endforeach
                                            <li>
                                                @if(Session::has('coupon'))
                                                    <strong style="color: #0b816a">SubTotal : </strong> BDT {{$cartTotal}}<hr>
                                                    <strong style="color: #0b816a">Coupon Name : </strong> {{session()->get('coupon')['coupon_name']}}
                                                    ({{session()->get('coupon')['coupon_discount']}}%)
                                                    <hr>
                                                    <strong style="color: #0b816a">Coupon Discount : </strong> BDT {{session()->get('coupon')['discount_amount']}}<hr>
                                                    <strong style="color: #0b816a">Grand Total : </strong> BDT {{session()->get('coupon')['total_amount']}}<hr>

                                                    @else
                                                    <strong style="color: #0b816a">SubTotal : </strong> BDT {{$cartTotal}} <hr>
                                                    <strong style="color: #0b816a">Grand Total : </strong> BDT {{$cartTotal}} <hr>
                                                @endif
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>


                    <div class="col-md-4">

                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="row">
{{--                                        <div class="col-md-4">--}}
{{--                                         <label for="">Stripe</label>--}}
{{--                                            <input type="radio" name="payment_method" value="stripe">--}}
{{--                                            <img src="{{asset('frontend/assets/images/payments/4.png')}}">--}}
{{--                                        </div>--}}

{{--                                        <div class="col-md-4">--}}
{{--                                            <label for="">Card</label>--}}
{{--                                            <input type="radio" name="payment_method" value="card">--}}
{{--                                            <img src="{{asset('frontend/assets/images/payments/3.png')}}">--}}
{{--                                        </div>--}}

                                        <div class="col-md-4">
                                            <label for="">Cash</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img src="{{asset('frontend/assets/images/payments/6.png')}}">
                                        </div>

                                    </div>
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
                                </div>
                            </div>
                        </div>

                    </div>



                    </form>

                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
{{--           @include('frontend.body.brands')<!-- /.logo-slider -->--}}
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();
                if(division_id) {
                    $.ajax({
                        url: "{{  url('/district-get/ajax') }}/"+division_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="state_id"]').empty();
                            var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="district_id"]').on('change', function(){
                var district_id = $(this).val();
                if(district_id) {
                    $.ajax({
                        url: "{{  url('/state-get/ajax') }}/"+district_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="state_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>

@endsection

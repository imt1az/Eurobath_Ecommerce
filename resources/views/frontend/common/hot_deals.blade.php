
@php
    $hot_deals = \App\Models\Product::where('status',1)->where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->get();
@endphp


<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach($hot_deals as $product)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"><img
                                src="{{asset($product->product_thumbnail)}}" alt="">
                        </div>

                        @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price)*100;
                        @endphp

                        <div>
                            @if($product->discount_price==NULL)
                                <div class="tag new"><span>new</span></div>
                            @else
                                <div class="sale-offer-tag"><span>{{round($discount)}}%<br>off</span></div>
                            @endif
                        </div>


                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                @if(session()->get('language')=='bangla')
                                    {{$product->product_name_hin}}
                                @else
                                    {{$product->product_name_en}}
                                @endif</a></h3>


                        {{--Review Star--}}
                        @include('frontend.common.reviewStar')



                        @if($product->discount_price==NULL)
                            <div class="product-price"><span
                                    class="price"> ${{$product->selling_price}}</span>
                            </div>
                        @else
                            <div class="product-price">
                                <span class="price">TK {{$product->discount_price}} </span>
                                <span class="price-before-discount">TK {{$product->selling_price}}</span>
                            </div>
                    @endif
                    <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                    <button
                                        class="btn btn-primary icon" type="button"
                                        title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{$product->id}}"
                                        onclick="productView(this.id)">ADD TO CART
                                    </button >

                                </li>

                                <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


                            </ul>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.sidebar-widget -->
</div>

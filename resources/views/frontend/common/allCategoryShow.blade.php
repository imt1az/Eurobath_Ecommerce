@php
    $categories = \App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp


@foreach($categories as $cat)
    <section class="section featured-product wow fadeInUp">
        <h3 class="section-title">
            @if(session()->get('language')=='bangla')
                {{$cat->category_name_hin}}
            @else
                {{$cat->category_name_en}}
            @endif

        </h3>
        @php
            $products = \App\Models\Product::where('status',1)->where('category_id',$cat->id)->orderBy('id','DESC')->get();
        @endphp
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

            @foreach($products as $product)
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}"><img
                                            src="{{asset($product->product_thumbnail)}}"
                                            alt=""></a></div>

                                @php
                                    $amount = $product->selling_price - $product->discount_price;
                                    $discount = ($amount/$product->selling_price)*100;
                                @endphp

                                <div>
                                    @if($product->discount_price==NULL)
                                        <div class="tag new"><span>new</span></div>
                                    @else
                                        <div class="tag hot"><span>{{round($discount)}}%</span></div>
                                    @endif
                                </div>


                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug_en)}}">
                                        @if(session()->get('language')=='bangla')
                                            {{$product->product_name_hin}}
                                        @else
                                            {{$product->product_name_en}}
                                        @endif

                                    </a>
                                </h3>
                                {{--               Review Star                                 --}}
                                @include('frontend.common.reviewStar')


                                @if($product->discount_price==NULL)
                                    <div class="product-price"><span
                                            class="price"> TK {{$product->selling_price}}</span></div>
                                @else

                                    <div class="product-price"><span
                                            class="price">TK {{$product->discount_price}} </span>
                                        <span
                                            class="price-before-discount">TK {{$product->selling_price}}</span>
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
                                                onclick="productView(this.id)"><i
                                                    class="fa fa-shopping-cart"></i>
                                            </button >
                                            <button class="btn btn-primary cart-btn"
                                                    type="button">Add to cart
                                            </button>
                                        </li>

                                        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


                                    </ul>
                                </div>
                                <!-- /.action -->
                            </div>
                            <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
        @endforeach
        <!-- /.item -->


        </div>
        <!-- /.home-owl-carousel -->
    </section>
@endforeach

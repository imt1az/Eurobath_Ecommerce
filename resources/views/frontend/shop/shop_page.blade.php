@extends('frontend.main_master')

@section('title')
    Shop Page
@endsection

@section('content')


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Shop Page</a></li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>

            <form action="{{route('shop.filter')}}" method="post">
                @csrf



            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->

                @include('frontend.common.vertical_menu')

                <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">shop by</h3>
{{--                                <div class="widget-header">--}}
{{--                                    <h4 class="widget-title">Category</h4>--}}
{{--                                </div>--}}
{{--                                <div class="sidebar-widget-body">--}}
{{--                                    <div class="accordion">--}}

{{--                                        @if(!empty($_GET['category']))--}}
{{--                                            @php--}}
{{--                                                $filterCat = explode(',',$_GET['category']);--}}
{{--                                            @endphp--}}
{{--                                        @endif--}}



{{--                                        @foreach($categories as $category)--}}
{{--                                            <div class="accordion-group">--}}
{{--                                                <div class="accordion-heading">--}}

{{--                                                    <label class="form-check-label">--}}
{{--                                                        <input type="checkbox" class="form-check-input" name="category[]" value="{{ $category->category_slug_en }}" @if(!empty($filterCat) && in_array($category->category_slug_en,$filterCat)) checked @endif  onchange="this.form.submit()">--}}

{{--                                                        @if(session()->get('language') == 'hindi') {{ $category->category_name_hin }} @else {{ $category->category_name_en }} @endif--}}

{{--                                                    </label>--}}


{{--                                                </div>--}}
{{--                                                <!-- /.accordion-heading -->--}}


{{--                                            </div>--}}
{{--                                            <!-- /.accordion-group -->--}}
{{--                                    @endforeach--}}
{{--                                    <!-- /.accordion-group -->--}}


{{--                                    </div>--}}
{{--                                </div>--}}





                                    <div class="widget-header">
                                        <h4 class="widget-title">Brand Filter</h4>
                                    </div>
                                    <div class="sidebar-widget-body">
                                        <div class="accordion">

                                            @if(!empty($_GET['brand']))
                                                @php
                                                    $filterBrand = explode(',',$_GET['brand']);
                                                @endphp
                                            @endif

                                            @foreach($brands as $brand)
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <label class="form-check-label">

                                                            <input type="checkbox" class="form-check-input" name="brand[]" value="{{$brand->brand_slug_en}}"
                                                                   @if(!empty($filterBrand) && in_array($brand->brand_slug_en,$filterBrand)) checked @endif
                                                                   onchange="this.form.submit()">

                                                            @if(session()->get('language')=='bangla')
                                                                {{$brand->brand_slug_hin}}
                                                            @else
                                                                {{$brand->brand_slug_en}}
                                                            @endif

                                                        </label>
                                                    </div>

                                                </div>
                                        @endforeach
                                        <!-- /.accordion-group -->

                                        </div>
                                        </div>



                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->

                            <!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                            <!-- ============================================== PRICE SILDER============================================== -->
{{--                            <div class="sidebar-widget wow fadeInUp">--}}
{{--                                <div class="widget-header">--}}
{{--                                    <h4 class="widget-title">Price Slider</h4>--}}
{{--                                </div>--}}
{{--                                <div class="sidebar-widget-body m-t-10">--}}
{{--                                    <div class="price-range-holder"><span class="min-max"> <span class="pull-left">$200.00</span> <span--}}
{{--                                                class="pull-right">$800.00</span> </span>--}}
{{--                                        <input type="text" id="amount"--}}
{{--                                               style="border:0; color:#666666; font-weight:bold;text-align:center;">--}}
{{--                                        <input type="text" class="price-slider" value="">--}}
{{--                                    </div>--}}
{{--                                    <!-- /.price-range-holder -->--}}
{{--                                    <a href="#" class="lnk btn btn-primary">Show Now</a></div>--}}
{{--                                <!-- /.sidebar-widget-body -->--}}
{{--                            </div>--}}
{{--                            <!-- /.sidebar-widget -->--}}
{{--                            <!-- ============================================== PRICE SILDER : END ============================================== -->--}}
{{--                            <!-- ============================================== MANUFACTURES============================================== -->--}}
{{--                            <div class="sidebar-widget wow fadeInUp">--}}
{{--                                <div class="widget-header">--}}
{{--                                    <h4 class="widget-title">Manufactures</h4>--}}
{{--                                </div>--}}
{{--                                <div class="sidebar-widget-body">--}}
{{--                                    <ul class="list">--}}
{{--                                        <li><a href="#">Forever 18</a></li>--}}
{{--                                        <li><a href="#">Nike</a></li>--}}
{{--                                        <li><a href="#">Dolce & Gabbana</a></li>--}}
{{--                                        <li><a href="#">Alluare</a></li>--}}
{{--                                        <li><a href="#">Chanel</a></li>--}}
{{--                                        <li><a href="#">Other Brand</a></li>--}}
{{--                                    </ul>--}}
{{--                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->--}}
{{--                                </div>--}}
{{--                                <!-- /.sidebar-widget-body -->--}}
{{--                            </div>--}}
{{--                            <!-- /.sidebar-widget -->--}}
{{--                            <!-- ============================================== MANUFACTURES: END ============================================== -->--}}
{{--                            <!-- ============================================== COLOR============================================== -->--}}
{{--                            <div class="sidebar-widget wow fadeInUp">--}}
{{--                                <div class="widget-header">--}}
{{--                                    <h4 class="widget-title">Colors</h4>--}}
{{--                                </div>--}}
{{--                                <div class="sidebar-widget-body">--}}
{{--                                    <ul class="list">--}}
{{--                                        <li><a href="#">Red</a></li>--}}
{{--                                        <li><a href="#">Blue</a></li>--}}
{{--                                        <li><a href="#">Yellow</a></li>--}}
{{--                                        <li><a href="#">Pink</a></li>--}}
{{--                                        <li><a href="#">Brown</a></li>--}}
{{--                                        <li><a href="#">Teal</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <!-- /.sidebar-widget-body -->--}}
{{--                            </div>--}}
{{--                            <!-- /.sidebar-widget -->--}}
{{--                            <!-- ============================================== COLOR: END ============================================== -->--}}
{{--                            <!-- ============================================== COMPARE============================================== -->--}}
{{--                            <div class="sidebar-widget wow fadeInUp outer-top-vs">--}}
{{--                                <h3 class="section-title">Compare products</h3>--}}
{{--                                <div class="sidebar-widget-body">--}}
{{--                                    <div class="compare-report">--}}
{{--                                        <p>You have no <span>item(s)</span> to compare</p>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.compare-report -->--}}
{{--                                </div>--}}
{{--                                <!-- /.sidebar-widget-body -->--}}
{{--                            </div>--}}
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COMPARE: END ============================================== -->

                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">

                                @include('frontend.common.product_tags')

                            </div>

                            <!----------- Testimonials------------->

{{--                        @include('frontend.common.testimonials')--}}

                        <!-- ============================================== Testimonials: END ============================================== -->

{{--                            <div class="home-banner"><img src="assets/images/banners/LHS-banner.jpg" alt="Image"></div>--}}
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    {{--Inner Banner--}}
                    @include('frontend.common.banner.InnerBanner')





                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"><a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a></li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"><span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                        class="btn dropdown-toggle"> Position <span
                                                        class="caret"></span></button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"><span class="lbl">Show</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button"
                                                        class="btn dropdown-toggle"> 1 <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">1</a></li>
                                                    <li role="presentation"><a href="#">2</a></li>
                                                    <li role="presentation"><a href="#">3</a></li>
                                                    <li role="presentation"><a href="#">4</a></li>
                                                    <li role="presentation"><a href="#">5</a></li>
                                                    <li role="presentation"><a href="#">6</a></li>
                                                    <li role="presentation"><a href="#">7</a></li>
                                                    <li role="presentation"><a href="#">8</a></li>
                                                    <li role="presentation"><a href="#">9</a></li>
                                                    <li role="presentation"><a href="#">10</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->

{{--             Pagination               --}}








                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>


                    {{--                         Started Grid View--}}
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">

                                        @include('frontend.product.grid_list_product')
                                    <!-- /.item -->

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->



                            {{--                         Started List View--}}
                            <div class="tab-pane " id="list-container">
                                <div class="category-product">
                                    @include('frontend.product.list_view_product')
                                <!-- /.category-product-inner -->



                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->

                    {{$products->appends($_GET)->links('vendor.pagination.custom')}}
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15"><a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                            </a></div>
                        <!--/.item-->

                        <div class="item m-t-10"><a href="#" class="image"> <img
                                    data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                            </a></div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png"
                                                                          src="assets/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->
                    </div>
                    <!-- /.owl-carousel #logo-slider -->
                </div>
                <!-- /.logo-slider-inner -->

            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
            </form>

        </div>
        <!-- /.container -->

    </div>

@endsection



@php
 $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
  $stting = \App\Models\SiteSetting::get()
@endphp




<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{url('/admin/dashboard')}}">
                <?php
                $setting = \App\Models\SiteSetting::find(1);
                ?>
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img style="padding-right: 80px;" src="{{asset($setting->logo)}}" alt="logo">

                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'dashboard') ? 'active' : ''}}">
                <a href="{{url('admin/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $banner = (auth()->guard('admin')->user()->banner == 1);
            $coupons = (auth()->guard('admin')->user()->coupons == 1);
            $shipping = (auth()->guard('admin')->user()->shipping == 1);
            $blog = (auth()->guard('admin')->user()->blog == 1);
            $setting = (auth()->guard('admin')->user()->setting == 1);
            $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
            $review = (auth()->guard('admin')->user()->review == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $stock = (auth()->guard('admin')->user()->stock == 1);
            $reports = (auth()->guard('admin')->user()->reports == 1);
            $alluser = (auth()->guard('admin')->user()->alluser == 1);
            $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
            @endphp


            @if($brand == true)
            <li class="treeview {{($prefix == '/brand') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brand</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.brand') ? 'active' : ''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brand</a></li>
{{--                    <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>--}}
                </ul>
            </li>
                @else
            @endif


            @if($category == true)
            <li class="treeview {{($prefix == '/category') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.category') ? 'active' : ''}}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
                    <li class="{{($route == 'all.subcategory') ? 'active' : ''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All Sub-Category</a></li>
                    <li class="{{($route == 'all.subsubcategory') ? 'active' : ''}}"><a href="{{route('all.subsubcategory')}}"><i class="ti-more"></i>All Sub-SubCategory</a></li>

                </ul>
            </li>
            @else
            @endif

           {{-- product-Prefix Started--}}
            @if($product == true)
            <li class="treeview {{($prefix == '/product') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'add.product') ? 'active' : ''}}"><a href="{{route('add.product')}}"><i class="ti-more"></i>Add Product</a></li>
                    <li class="{{($route == 'manage-product') ? 'active' : ''}}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage Product</a></li>

                </ul>
            </li>
            @else
            @endif

            {{-- Slider-Prefix Started--}}

            @if($slider == true)
            <li class="treeview {{($prefix == '/slider') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'manage-slider') ? 'active' : ''}}"><a href="{{route('manage-slider')}}"><i class="ti-more"></i>Manage Slider</a></li>


                </ul>
            </li>
            @else
            @endif

            {{-- Slider-Prefix End--}}

            {{-- Banner-Prefix Started--}}
            @if($banner == true)
                <li class="treeview {{($prefix == '/banner') ? 'active' : ''}}">
                    <a href="#">
                        <i data-feather="file"></i>
                        <span>Banner</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{($route == 'manage-BannerOne') ? 'active' : ''}}"><a href="{{route('manage-BannerOne')}}"><i class="ti-more"></i>Manage Banner One</a></li>
                        <li class="{{($route == 'manage-BannerTwo') ? 'active' : ''}}"><a href="{{route('manage-BannerTwo')}}"><i class="ti-more"></i>Manage Banner Two</a></li>
                        <li class="{{($route == 'manage-InnerBanner') ? 'active' : ''}}"><a href="{{route('manage-InnerBanner')}}"><i class="ti-more"></i>Manage Inner Banner</a></li>


                    </ul>
                </li>
            @else
            @endif
            {{-- Banner-Prefix End--}}



            {{-- Coupons Started--}}
            @if($coupons == true)
            <li class="treeview {{($prefix == '/coupons') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'manage-coupon') ? 'active' : ''}}"><a href="{{route('manage-coupon')}}"><i class="ti-more"></i>Manage Coupons</a></li>


                </ul>
            </li>
            @else
            @endif

            {{-- Coupons End--}}

            {{-- Shipping Started--}}
            @if($shipping == true)
            <li class="treeview {{($prefix == '/shipping') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'manage-division') ? 'active' : ''}}"><a href="{{route('manage-division')}}"><i class="ti-more"></i>Ship Division</a></li>
                    <li class="{{($route == 'manage-district') ? 'active' : ''}}"><a href="{{route('manage-district')}}"><i class="ti-more"></i>Ship District</a></li>
                    <li class="{{($route == 'manage-state') ? 'active' : ''}}"><a href="{{route('manage-state')}}"><i class="ti-more"></i>Ship State</a></li>


                </ul>
            </li>
            @else
            @endif
            {{-- Shipping End--}}


            {{-- Blog Started--}}
            @if($blog == true)
            <li class="treeview {{($prefix == '/blog') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'blog-category') ? 'active' : ''}}"><a href="{{route('blog-category')}}"><i class="ti-more"></i>Blog Category</a></li>
                    <li class="{{($route == 'list-post') ? 'active' : ''}}"><a href="{{route('list-post')}}"><i class="ti-more"></i>List Blog Post</a></li>
                    <li class="{{($route == 'add-post') ? 'active' : ''}}"><a href="{{route('add-post')}}"><i class="ti-more"></i>Add Blog Post</a></li>

                </ul>
            </li>
            @else
            @endif
            {{-- Blog End--}}


            {{-- Site setting Started--}}
            @if($setting == true)
            <li class="treeview {{($prefix == '/setting') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Setting</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'site-setting') ? 'active' : ''}}"><a href="{{route('site-setting')}}"><i class="ti-more"></i>Site Setting</a></li>
                    <li class="{{($route == 'seo-setting') ? 'active' : ''}}"><a href="{{route('seo-setting')}}"><i class="ti-more"></i>Seo Setting</a></li>


                </ul>
            </li>
            @else
            @endif
            {{-- Site setting End--}}



            {{-- Return Request Started--}}
            @if($returnorder == true)
            <li class="treeview {{($prefix == '/return') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Return Order</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'return-request') ? 'active' : ''}}"><a href="{{route('return-request')}}"><i class="ti-more"></i>Return Request</a></li>
                    <li class="{{($route == 'all-request') ? 'active' : ''}}"><a href="{{route('all-request')}}"><i class="ti-more"></i>All Request</a></li>


                </ul>
            </li>
            @else
            @endif
            {{-- Return Request End--}}



            {{-- Review Request Started--}}
            @if($review == true)
            <li class="treeview {{($prefix == '/review') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Review</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'pending-review') ? 'active' : ''}}"><a href="{{route('pending-review')}}"><i class="ti-more"></i>Pending Review</a></li>
                    <li class="{{($route == 'publish-review') ? 'active' : ''}}"><a href="{{route('publish-review')}}"><i class="ti-more"></i>Publish Review</a></li>


                </ul>
            </li>
            @else
            @endif
            {{-- Review Request End--}}

           {{--Order prefix Started--}}
            @if($orders == true)
            <li class="header nav-small-cap">User Interface</li>
            <li class="treeview {{($prefix == '/orders') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'pending-orders') ? 'active' : ''}}"><a href="{{route('pending-orders')}}"><i class="ti-more"></i>Pending Orders</a></li>
                    <li class="{{($route == 'confirm-orders') ? 'active' : ''}}"><a href="{{route('confirm-orders')}}"><i class="ti-more"></i>Confirm Orders</a></li>
                    <li class="{{($route == 'processing-orders') ? 'active' : ''}}"><a href="{{route('processing-orders')}}"><i class="ti-more"></i>Processing Orders</a></li>
                    <li class="{{($route == 'picked-orders') ? 'active' : ''}}"><a href="{{route('picked-orders')}}"><i class="ti-more"></i>Picked Orders</a></li>
                    <li class="{{($route == 'shipped-orders') ? 'active' : ''}}"><a href="{{route('shipped-orders')}}"><i class="ti-more"></i>Shipped Orders</a></li>
                    <li class="{{($route == 'delivered-orders') ? 'active' : ''}}"><a href="{{route('delivered-orders')}}"><i class="ti-more"></i>Delivered Orders</a></li>
                    <li class="{{($route == 'cancel-orders') ? 'active' : ''}}"><a href="{{route('cancel-orders')}}"><i class="ti-more"></i>Cancel Orders</a></li>
                </ul>
            </li>
            @else
            @endif
            {{--End Order prefix Started--}}

          {{---Stock Started--}}
            @if($stock == true)
            <li class="treeview {{($prefix == '/stock') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Manage Stock</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'product.stock') ? 'active' : ''}}"><a href="{{route('product.stock')}}"><i class="ti-more"></i>Product stock</a></li>
                </ul>
            </li>
            @else
            @endif


            {{---reports Started--}}
            @if($reports == true)
            <li class="treeview {{($prefix == '/reports') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>All Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all-reports') ? 'active' : ''}}"><a href="{{route('all-reports')}}"><i class="ti-more"></i>All Reports</a></li>
                </ul>
            </li>
            @else
            @endif


            {{---allUser Started--}}
            @if($alluser == true)
            <li class="treeview {{($prefix == '/allUser') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>All User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all-users') ? 'active' : ''}}"><a href="{{route('all-users')}}"><i class="ti-more"></i>All Users</a></li>
                </ul>
            </li>
            @else
            @endif


            {{---adminuserrole Started--}}
            @if($adminuserrole == true)
            <li class="treeview {{($prefix == '/adminuserrole') ? 'active' : ''}}">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Admin User Role</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.admin.user') ? 'active' : ''}}"><a href="{{route('all.admin.user')}}"><i class="ti-more"></i>All Admin User</a></li>
                </ul>
            </li>
            @else
            @endif




            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>




        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>

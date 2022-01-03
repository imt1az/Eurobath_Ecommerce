<?php

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\WishlistController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//User All Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


//Admin All Routes With Middleware
Route::middleware(['auth:admin'])->group(function () {


    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');

    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');


    //Admin Brand All Routes
    Route::prefix('brand')->group(function () {
        Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
        Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    });
//End Brand All Routes


//Admin Category  Routes
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');


        //{Sub-Category Routes Start}
        Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');


        //{Sub-Sub-Category Routes Start}
        Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
        Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
        Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
        Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
        Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
        Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');


    });


//Admin Product All Routes
    Route::prefix('product')->group(function () {
        Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
        Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
        Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
        Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
        Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
        Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
        Route::post('/thumbnail/update', [ProductController::class, 'ThumbnailImageUpdate'])->name('update-product-thumbnail');
        Route::get('/multiImg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiImg.delete');
        Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
        Route::get('/detailes/{id}', [ProductController::class, 'ProductDetaile'])->name('product.detailes');

    });

// Admin Slider
    Route::prefix('slider')->group(function () {
        Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
        Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
        Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
        Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
        Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
    });

    // Admin Banner
    Route::prefix('banner')->group(function () {
        Route::get('/view', [BannerController::class, 'BannerOneView'])->name('manage-BannerOne');
        Route::post('/store', [BannerController::class, 'BannerOneStore'])->name('banner_One.store');
        Route::get('/edit/{id}', [BannerController::class, 'BannerOneEdit'])->name('bannerOne.edit');
        Route::post('/update', [BannerController::class, 'BannerOneUpdate'])->name('bannerOne.update');
        Route::get('/delete/{id}', [BannerController::class, 'BannerOneDelete'])->name('bannerOne.delete');
        Route::get('/inactive/{id}', [BannerController::class, 'BannerOneInactive'])->name('bannerOne.inactive');
        Route::get('/active/{id}', [BannerController::class, 'BannerOneActive'])->name('bannerOne.active');

        //Banner Two
        Route::get('/view/bannerTwo', [BannerController::class, 'BannerTwoView'])->name('manage-BannerTwo');
        Route::post('/store/bannerTwo', [BannerController::class, 'BannerTwoStore'])->name('banner_Two.store');
        Route::get('/edit/{id}/bannerTwo', [BannerController::class, 'BannerTwoEdit'])->name('bannerTwo.edit');
        Route::post('/update/bannerTwo', [BannerController::class, 'BannerTwoUpdate'])->name('bannerTwo.update');
        Route::get('/delete/{id}/bannerTwo', [BannerController::class, 'BannerTwoDelete'])->name('bannerTwo.delete');
        Route::get('/inactive/{id}/bannerTwo', [BannerController::class, 'BannerTwoInactive'])->name('bannerTwo.inactive');
        Route::get('/active/{id}/bannerTwo', [BannerController::class, 'BannerTwoActive'])->name('bannerTwo.active');

        //Inner Banner
        Route::get('/view/innerBanner', [BannerController::class, 'InnerBannerView'])->name('manage-InnerBanner');
        Route::post('/store/innerBanner', [BannerController::class, 'InnerBannerStore'])->name('innerBanner.store');
        Route::get('/edit/{id}/innerBanner', [BannerController::class, 'InnerBannerEdit'])->name('innerBanner.edit');
        Route::post('/update/innerBanner', [BannerController::class, 'InnerBannerUpdate'])->name('innerBanner.update');
        Route::get('/delete/{id}/innerBanner', [BannerController::class, 'InnerBannerDelete'])->name('innerBanner.delete');
        Route::get('/inactive/{id}/innerBanner', [BannerController::class, 'InnerBannerInactive'])->name('innerBanner.inactive');
        Route::get('/active/{id}/innerBanner', [BannerController::class, 'InnerBannerActive'])->name('innerBanner.active');

    });

    // Admin Coupons All Routes
    Route::prefix('coupons')->group(function () {
        Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
        Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
        Route::post('/update', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');

    });
    //// End Coupons All Routes

    // Admin Shipping All Routes
    Route::prefix('shipping')->group(function () {
        //Start Ship Division
        Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
        Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
        Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
        Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
        Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');


        //Ship District
        Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');
        Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
        Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
        Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
        Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

        //Ship State
        Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');
        Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
        Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
        Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
        Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');

    });
    //// End Shipping All Routes



    //Admin Orders list(With all Order)
    Route::prefix('orders')->group(function () {
        Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
        Route::get('/pending/orders/details/{id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
        Route::get('/confirm/orders', [OrderController::class, 'ConfirmOrders'])->name('confirm-orders');
        Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
        Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
        Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
        Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
        Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

        //Pending to Confirm Status
        Route::get('/pending/confirm/{id}', [OrderController::class, 'PendingToConfirm'])->name('pendingToConfirm');
        Route::get('/confirm/processing/{id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirmToProcessing');
        Route::get('/processing/picked/{id}', [OrderController::class, 'ProcessingToPicked'])->name('processingToPicked');
        Route::get('/picked/shipped/{id}', [OrderController::class, 'PickedToShipped'])->name('pickedToShipped');
        Route::get('/shipped/delivered/{id}', [OrderController::class, 'ShippedToDelivered'])->name('shippedToDelivered');
        Route::get('/shipped/delivered/{id}', [OrderController::class, 'ShippedToDelivered'])->name('shippedToDelivered');
        Route::get('/delivered/cancel/{id}', [OrderController::class, 'DeliveredToCancel'])->name('deliveredToCancel');
        //--Admin Invoice Download--//
        Route::get('/invoice/download/{id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');


    });
    //End Orders



    //Admin Reports Routes
    Route::prefix('reports')->group(function () {
        Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');
        Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
        Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
        Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
    });
    //End Reports

    //Admin Check All user
    Route::prefix('allUser')->group(function () {
        Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');

    });
    //End Check All user


    //Admin Blog ManageMent
    Route::prefix('blog')->group(function () {
        Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog-category');
        Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');
        Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');
        Route::post('/category/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blog.category.update');
        Route::get('/category/delete/{id}', [BlogController::class, 'BlogCategoryDelete'])->name('blog.category.delete');

        //{Admin View Blog Post}//
        Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add-post');
        Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list-post');
        Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post-store');
        Route::get('/post/edit/{id}', [BlogController::class, 'BlogPostEdit'])->name('post.edit');
        Route::post('/post/update/{id}', [BlogController::class, 'BlogPostUpdate'])->name('post-update');
        Route::get('/post/delete/{id}', [BlogController::class, 'BlogPostDelete'])->name('post.delete');

    });
    //End Admin Blog ManageMent



    //Admin Site Setting
    Route::prefix('setting')->group(function () {
        Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site-setting');
        Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
        Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo-setting');
        Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');


    });
    //End Admin Site Setting


    //Admin Return Request
    Route::prefix('return')->group(function () {
        Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return-request');
        Route::get('/admin/approve/{id}', [ReturnController::class, 'ReturnApprove'])->name('return.approve');
        Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all-request');
    });
    //End Admin Return Request


    //Admin Review Request
    Route::prefix('review')->group(function () {
        Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending-review');
        Route::get('/approve/{id}', [ReviewController::class, 'ApproveReview'])->name('review.approve');
        Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish-review');
        Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');

    });
    //End Admin Review Request


    //Admin Product Stock
    Route::prefix('stock')->group(function () {
        Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
    });
    //End Admin Product Stock


    //Admin User Role Routes
    Route::prefix('adminuserrole')->group(function () {
        Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
        Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');
        Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
        Route::post('/update/{id}', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');
    });
    //End Admin User Role Routes

});

//////////////////////////////////////---------------------//End Admin All Routes With Middleware---------------------------------////////////////////////////////////////////////////////





//Frontend All Routes start

//Multi Language All Routes
Route::get('/language/bangla', [LanguageController::class, 'Bangla'])->name('bangla.language');
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');


// FrontEnd Product Detailes page Url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
//Frontend Tagwise Product
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
//Subcategory Wise data
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
//sub-Subcategory Wise data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

//Product View Model With Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

//Add to cart store data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
//Mini Cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
//Remove Mini Cart
Route::get('/minicart/product-remove/{rawId}', [CartController::class, 'RemoveMiniCart']);

//Add to Wishlist
Route::post('add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);



                        // <--------User Need login-------------->//
Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
//WishList Page
    Route::get('/wishlist', [WishListController::class, 'ViewWishlist'])->name('wishlist');
//Ajax WishList Page
    Route::get('/get-wishlist-product', [WishListController::class, 'GetWishlistProduct']);
//Ajax WishList Remove
    Route::get('/wishlist-remove/{id}', [WishListController::class, 'RemoveWishlistProduct']);

    //Stripe---------->
    Route::post('/stripe/store', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    //Cash On Delivery----------->
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    //User Orders
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    //Order Detailes
    Route::get('/order_details/{id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/invoice_download/{id}', [AllUserController::class, 'invoiceDownload']);
    //Order Return
    Route::post('/return/order/{id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');
    //Return Order list
    Route::get('/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    //Cancel Order List
    Route::get('/cancel/order/list', [AllUserController::class, 'CancelOrderList'])->name('cancel.orders');
    //user Order Tracking Route
    Route::post('/order/tracking', [AllUserController::class, 'OrderTracking'])->name('order.tracking');

});



//My Cart Page All Routes
Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
//get Cart product
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
//Remove Cart
Route::get('/user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);
//Increment
Route::get('/cart-increment/{id}', [CartPageController::class, 'CartIncrement']);
//Decrement
Route::get('/cart-decrement/{id}', [CartPageController::class, 'CartDecrement']);


//FrontEnd Apply Coupon
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);


//CheckOut Routes
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);

Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

//FrontEnd Blog Routes
Route::get('/blog', [HomeBlogController::class, 'BlogShow'])->name('home.blog');
Route::get('/post/details/{id}', [HomeBlogController::class, 'BlogDetails'])->name('post.details');
Route::get('/blog/category/post/{id}', [HomeBlogController::class, 'CategoryWisePost']);

//Frontend Review Product
Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');


//Product Search
Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');
//Advanced Search Product
Route::post('search-product', [IndexController::class, 'SearchProduct']);

// Shop Page Route
Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');
Route::post('/shop/filter', [ShopController::class, 'ShopFilter'])->name('shop.filter');









<?php

use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminUserController;
use App\Http\Controllers\backend\blog\blogCategoryController;
use App\Http\Controllers\backend\blog\blogPostController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CopounController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\ReturnController;
use App\Http\Controllers\backend\ShippingAreaController;
use App\Http\Controllers\backend\ShippingdistrictController;
use App\Http\Controllers\backend\ShippingStateController;
use App\Http\Controllers\backend\SiteSettingController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CartPageController;
use App\Http\Controllers\frontend\CashController;
use App\Http\Controllers\frontend\CheakoutController;
use App\Http\Controllers\frontend\HomeBlogController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\StripeController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\LanguageController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;

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

Route::prefix('cms')->middleware(['guest:admin'])->group(function () {
    Route::get('/{guard}/login', [AuthController::class, 'showLoginVeiw'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::prefix('cms/admin')->middleware(['auth:admin'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', [Controller::class, 'index'])->name('cms.dashbord');
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('cms.profile');
    Route::get('/edit/profile', [AdminProfileController::class, 'EditProfile'])->name('cms.edit_profile');
    Route::post('/store/profile/{id}', [AdminProfileController::class, 'StoreProfile'])->name('cms.profile_store');
    Route::get('/change-password', [AdminProfileController::class, 'editpassword'])->name('cms.edit_password');
    Route::post('/update/change-password', [AdminProfileController::class, 'updatepassword'])->name('cms.change_password');
});

Route::prefix('cms')->middleware(['auth:admin'])->group(function () {
    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subCategories', SubCategoryController::class);
    Route::resource('subSubCategories', SubSubCategoryController::class);
    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);
    Route::resource('products', ProductController::class);
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::resource('sliders', SliderController::class);
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::resource('copouns',CopounController::class);
    Route::resource('shippings', ShippingAreaController::class);
    Route::resource('discrits', ShippingdistrictController::class);
    Route::resource('states', ShippingStateController::class);
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');

    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');
    // Update Status 
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');

    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');

    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
    Route::get('report/view', [ReportController::class, 'ReportView'])->name('all-reports');
    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');
    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
    Route::resource('blog_categories',blogCategoryController::class);
    Route::resource('blog_posts', blogPostController::class);
    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
    Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
    Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');
    Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
    Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');
    Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');
    Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');

    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');

    Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');

    Route::delete('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
    Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
    Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');

    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');

    Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
    Route::delete('admin/user/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');


   
});




Route::prefix('shop')->middleware('guest:web')->group(function () {
    Route::get('/{guard}/login', [FrontendAuthController::class, 'ShowLogin'])->name('web.login');
    Route::post('/login', [FrontendAuthController::class, 'login'])->name('login');
    Route::post('/register', [FrontendAuthController::class, 'register']);
});
Route::prefix('shop/web')->middleware(['auth.web:web'])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('inn');
});

Route::prefix('shop')->middleware(['auth.web:web'])->group(function () {
    // Route::get('/', [IndexController::class, 'index'])->name('inn');
    Route::get('profile', [IndexController::class, 'profile'])->name('profile');
    Route::get('logout', [FrontendAuthController::class, 'logout'])->name('logout');
    Route::get('profile/edit', [IndexController::class, 'editProfile'])->name('edit.profile');
    Route::post('profile/update/{id}', [FrontendAuthController::class, 'updateProfile'])->name('profile.update');
    Route::get('/change-password', [FrontendAuthController::class, 'editpassword'])->name('profile.edit_password');
    Route::post('/update/change-password', [FrontendAuthController::class, 'updatepassword'])->name('profile.change_password');
    Route::get('/language/arabic', [LanguageController::class, 'Arabic'])->name('arabic.language');
    Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
    // Frontend Product Details Page url 
    Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
    Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
    Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
    Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);
    // Product View Modal with Ajax
    Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
    Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
    Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
    Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
    Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishlist']);
    // Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

    Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
    Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);
    // Frontend Coupon Option

    Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
    Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
    Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);
    // Checkout Routes 

    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
    Route::get('/district-get/ajax/{division_id}', [CheakoutController::class, 'DistrictGetAjax']);

    Route::get('/state-get/ajax/{district_id}', [CheakoutController::class, 'StateGetAjax']);
    Route::post('/checkout/store', [CheakoutController::class, 'CheckoutStore'])->name('checkout.store');
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    Route::get('/my/orders', [FrontendAuthController::class, 'MyOrders'])->name('my.orders');
    Route::get('/order_details/{order_id}', [FrontendAuthController::class, 'OrderDetails']);
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    Route::get('/invoice_download/{order_id}', [FrontendAuthController::class, 'InvoiceDownload']);
    Route::post('/return/order/{order_id}', [FrontendAuthController::class, 'ReturnOrder'])->name('return.order');
    Route::get('/return/order/list', [FrontendAuthController::class, 'ReturnOrderList'])->name('return.order.list');
    Route::get('/cancel/orders', [FrontendAuthController::class, 'CancelOrders'])->name('cancel.orders');
    //  Frontend Blog Show Routes 

    Route::get('/blog', [HomeBlogController::class, 'AddBlogPost'])->name('home.blog');
    Route::get('/post/details/{id}', [HomeBlogController::class, 'DetailsBlogPost'])->name('post.details');
    Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'HomeBlogCatPost']);
    /// Frontend Product Review Routes

    Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');

    /// Order Traking Route 
    Route::post('/order/tracking', [FrontendAuthController::class, 'OrderTraking'])->name('order.tracking');
    /// Product Search Route 
    Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');
    // Advance Search Routes 
    Route::post('search-product', [IndexController::class, 'SearchProduct']);
    // Shop Page Route 
    Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');
    Route::post('/shop/filter', [ShopController::class, 'ShopFilter'])->name('shop.filter');
   


});

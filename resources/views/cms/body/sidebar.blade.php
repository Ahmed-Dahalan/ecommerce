@php
    $route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Easy</b> Shop</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'cms.dashbord')?'active':''}}">
                <a href="{{route('cms.dashbord')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
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
            <li class="treeview {{($route == 'brands.index')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'brands.index')?'active':''}}"><a href="{{route('brands.index')}}"><i class="ti-more"></i>Index</a></li>
                </ul>
            </li>
            @else
            @endif
            @if($category == true)
            <li class="treeview {{($route == 'categories.index')?'active':''}}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'categories.index')?'active':''}}"><a href="{{route('categories.index')}}"><i class="ti-more"></i>Index Category</a></li>
                    <li class="{{($route == 'subCategories.index')?'active':''}}"><a href="{{route('subCategories.index')}}"><i
                                class="ti-more"></i>Index Sub Category</a></li>
                    <li class="{{($route == 'subSubCategories.index')?'active':''}}"><a href="{{route('subSubCategories.index')}}"><i
                                class="ti-more"></i>Index Sub->Sub Category</a></li>
                </ul>
            </li>

            @else
            @endif
            @if($product == true)
            <li class="treeview {{($route == 'products.create')?'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'products.create')?'active':''}}"><a href="{{route('products.create')}}"><i class="ti-more"></i>Create Product</a></li>
                    <li class="{{($route == 'products.index')?'active':''}}"><a href="{{route('products.index')}}"><i class="ti-more"></i>Mange Product</a></li>
                </ul>
            </li>
            @else
            @endif
            @if($slider == true)
            <li class="treeview {{ ($route == 'sliders.index')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'sliders.index')? 'active':'' }}"><a href="{{ route('sliders.index') }}"><i
                                class="ti-more"></i>Manage Slider</a></li>
            
            
            
                </ul>
            </li>
            @else
            @endif
            @if($coupons == true)
            <li class="treeview {{ ($route == 'copouns.index')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'copouns.index')? 'active':'' }}"><a href="{{ route('copouns.index') }}"><i
                                class="ti-more"></i>Manage Coupon</a></ul>
                </li>
                @else
                @endif
                @if($shipping == true)

            <li class="treeview {{ ($route == 'shippings.index')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'shippings.index')? 'active':'' }}"><a href="{{ route('shippings.index') }}"><i
                                class="ti-more"></i>Ship Division</a></li>
            
                    <li class="{{ ($route == 'discrits.index')? 'active':'' }}"><a href="{{ route('discrits.index') }}"><i
                                class="ti-more"></i>Ship District</a></li>
                    <li class="{{ ($route == 'states.index')? 'active':'' }}"><a href="{{ route('states.index') }}"><i
                                class="ti-more"></i>Ship State</a></li>
                </ul>
            </li>

           
            @else
            @endif

            <li class="header nav-small-cap">User Interface</li>
            @if($orders == true)
            <li class="treeview {{ ($route == 'pending-orders')? 'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i
                                class="ti-more"></i>Pending Orders</a></li>
                    <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i
                                class="ti-more"></i>Confirmed Orders</a></li>
                    
                    <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i
                                class="ti-more"></i>Processing Orders</a></li>
                    
                    <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i
                                class="ti-more"></i> Picked Orders</a></li>
                    
                    <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i
                                class="ti-more"></i> Shipped Orders</a></li>
                    
                    <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i
                                class="ti-more"></i> Delivered Orders</a></li>
                    
                    <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i
                                class="ti-more"></i> Cancel Orders</a></li>
                </ul>
            </li>
            @else
            @endif
            @if($alluser == true)
            <li class="treeview {{ ($route == 'all-users')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>All Users </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i
                                class="ti-more"></i>All Users</a></li>
            
            
                </ul>
            </li>
            @else
            @endif
            @if($blog == true)
            <li class="treeview {{ ($route == 'blog_categories.index')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'blog_categories.index')? 'active':'' }}"><a
                            href="{{ route('blog_categories.index') }}"><i class="ti-more"></i>Blog Category</a></li>
            
                        <li class="{{ ($route == 'blog_posts.index')? 'active':'' }}"><a href="{{ route('blog_posts.index') }}"><i class="ti-more"></i>List
                                Blog Post</a></li>
                        
                        <li class="{{ ($route == 'blog_posts.create')? 'active':'' }}"><a href="{{ route('blog_posts.create') }}"><i class="ti-more"></i>Add Blog
                                Post</a></li>
            
            
                </ul>
            </li>
            @else
            @endif
            @if($setting == true)
            <li class="treeview {{ ($route == 'site.setting')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i
                                class="ti-more"></i>Site Setting</a></li>
                    <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo
                            Setting</a></li>
            
                </ul>
            </li>
            @else
            @endif
            @if($returnorder == true)
            <li class="treeview {{ ($route == 'return.request')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Return Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i
                                class="ti-more"></i>Return Request</a></li>
            
                    <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i
                                class="ti-more"></i>All Request</a></li>
            
            
                </ul>
            </li>
            @else
            @endif
            @if($review == true)
            <li class="treeview {{ ($route == 'pending.review')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Review</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i
                                class="ti-more"></i>Pending Review</a></li>
            
                    <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i
                                class="ti-more"></i>Publish Review</a></li>
            
            
                </ul>
            </li>
            @else
            @endif
            @if($stock == true)
            <li class="treeview {{ ($route == 'product.stock')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Stock </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i
                                class="ti-more"></i>Product Stock</a></li>
            
            
                </ul>
            </li>
            @else
            @endif
            @if($adminuserrole == true)
            <li class="treeview {{ ($route == 'all.admin.user')? 'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Admin User Role </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i
                                class="ti-more"></i>All Admin User </a></li>
            
            
                </ul>
            </li>
            @else
            @endif
            @if($reports == true)
            <li class="treeview {{ ($route == 'all-reports')? 'active':'' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>All Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All
                            Reports</a></li>
                    
                    
                    </ul>
                    </li>
                </ul>
            </li>
           @else
            @endif
            

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
@extends('frontend.parant')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>
                        <form class="register-form outer-top-xs" role="form">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input"
                                    id="email">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="password">
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" name="optionsRadios" id="remember" value="option2">Remember
                                    me!
                                </label>
                                <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                            </div>
                            <button type="button" onclick="perFormStore()" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>
                    </div>
                    <!-- Sign-in -->
    
                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>
                        <form class="register-form outer-top-xs" role="form">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input"
                                    id="email_r">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="Text" class="form-control unicase-form-control text-input"
                                    id="name">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="password_r">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="password_r_confirmation">
                            </div>
                            <button type="button" onclick="perFormRegister()" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </form>
    
    
                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
    
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand1.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand2.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand3.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand4.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand5.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand6.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand2.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand4.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand1.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
    
                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="{{asset('frontend/assets/images/brands/brand5.png')}}" src="assets/images/blank.gif" alt="">
                            </a>
                        </div>
                        <!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->
    
            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    <script>
        function perFormStore(){
                axios.post('/shop/login', {
                email:document.getElementById('email').value,
                password:document.getElementById('password').value,
                remember:document.getElementById('remember').checked
                })
                .then(function (response) {
                console.log(response);
                toastr.success(response.data.message);
                window.location.href = ''
                })
                .catch(function (error) {
                console.log(error);
                toastr.error(error.response.data.message);
                });
            }
            
            function perFormRegister(){
            axios.post('/shop/register', {
            email:document.getElementById('email_r').value,
            name:document.getElementById('name').value,
            password:document.getElementById('password_r').value,
            password_confirmation:document.getElementById('password_r_confirmation').value,
            })
            .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/'
            })
            .catch(function (error) {
            console.log(error);
            toastr.error(error.response.data.message);
            });
            }
    </script>

@endsection


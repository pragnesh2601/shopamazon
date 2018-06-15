<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
    <!-- Animation files -->
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
    <!--js-->
    <script src="<?php echo e(asset('js/jquery-2.1.1.min.js')); ?>"></script> 
    <!--icons-css-->
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet"> 
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <!--static chart-->
    <script src="<?php echo e(asset('js/Chart.min.js')); ?>"></script>
    <!--//charts-->
    <!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write("<script src='<?php echo e(asset('lib/modernizr/modernizr-custom.js')); ?>'><\/script>")</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="<?php echo e(asset('js/chartinator.js')); ?>" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-select/css/bootstrap-select.min.css')); ?>">
    <!-- owl carousel-->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/owl.carousel/assets/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/owl.carousel/assets/owl.theme.default.css')); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.default.css')); ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

<!--skycons-icons-->
<script src="<?php echo e(asset('js/skycons.js')); ?>"></script>
<!--//skycons-icons-->
<!--pop up strat here-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
<script src="<?php echo e(asset('js/jquery.magnific-popup.js')); ?>" type="text/javascript"></script>
 <script>
                        $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });
                                                                                        
                        });
                </script>
<!--pop up end here-->

</head>
<body>
    
    <div class="page-container">    
   <!-- <div class="left-content"> -->
       <div class="mother-grid-inner">
            <!--header start here-->
                <div class="header-main">
                    <div class="header-left">
                            <div class="logo-name">
                                     <a href="<?php echo e(url('/')); ?>"> <h1><?php echo e(config('app.name', 'Laravel')); ?></h1> 
                                    <!--<img id="logo" src="" alt="Logo"/>--> 
                                  </a>                              
                            </div>
                            <div class="clearfix"> </div>
                         </div>
                         <div class="header-right">
                            
                            <div class="profile_details">       
                                <?php if(auth()->guard()->guest()): ?> 
                                <ul>
                                    <li class="dropdown profile_details_drop"><a class="popup-with-zoom-anim" href="#login-small-dialog"><i class="fa fa-sign-in"></i> <?php echo e(__('Login')); ?></a></li>
                                    <li class="dropdown profile_details_drop"><a class="popup-with-zoom-anim" href="#register-small-dialog"><i class="fa fa-user"></i> <?php echo e(__('Register')); ?></a></li>
                                </ul>
                                <?php else: ?>
                                <ul>
                                    <li class="dropdown profile_details_drop">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <div class="profile_img">   
                                                <span class="prfil-img"><img src="<?php echo e(Auth::user()->getPhoto(30,30)); ?>" alt=""> </span> 
                                                <div class="user-name">
                                                    <p><?php echo e(Auth::user()->name); ?></p>
                                                </div>
                                                <i class="fa fa-angle-down lnr"></i>
                                                <i class="fa fa-angle-up lnr"></i>
                                                <div class="clearfix"></div>    
                                            </div>  
                                        </a>
                                        <ul class="dropdown-menu drp-mnu">
                                            <li> <a href="<?php echo e(route('settings')); ?>"><i class="fa fa-cog"></i> Settings</a> </li> 
                                            <li> <a href="<?php echo e(route('profile')); ?>"><i class="fa fa-user"></i> Profile</a> </li> 
                                            <li> <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?></a> 
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo e(csrf_field()); ?>

                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php endif; ?>
                            </div>
                            <div class="profile_details btn-group pull-right" style="margin:10px 15px;">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Cart </button>
                                <div class="dropdown-menu" id="cartPartial">
                                    
                                </div>
                            </div>
                            <!--search-box-->
                                <div id="wrap" class="pull-right">
                                    <form id="SearchForm" autocomplete="on"> 
                                        <!-- <input type="text" placeholder="Search..." required=""> -->
                                        <input id="search" name="search" type="text" placeholder="What're you looking for ?"> 
                                        <!-- <input type="submit" value=""> -->
                                        <input id="search_submit" value="Rechercher" type="submit">
                                    </form>
                                </div><!--//end-search-box-->
                            <div class="clearfix"> </div>               
                        </div>
                     <div class="clearfix"> </div>  
                </div>
        <!--heder end here-->
        <!-- script-for sticky-nav -->
        <script>
        $(document).ready(function() {
             var navoffeset=$(".header-main").offset().top;
             $(window).scroll(function(){
                var scrollpos=$(window).scrollTop(); 
                if(scrollpos >=navoffeset){
                    $(".header-main").addClass("fixed");
                }else{
                    $(".header-main").removeClass("fixed");
                }
             });
             
        });
        </script>
        <!-- /script-for sticky-nav -->
        <!--inner block start here-->
        <div class="inner-block">
            <?php echo $__env->yieldContent('content'); ?>    
        </div>
    <!--inner block end here-->
    <!--pop-up-grid-->
    <div id="popup">
        <div id="small-dialog" class="mfp-hide">
            <div class="pop_up">
                <div class="payment-online-form-left">
                    <form>
                        <h4><span class="shoppong-pay-1"> </span>Shipping Details</h4>
                        <ul>
                            <li><input class="text-box-dark" type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}"></li>
                            <li><input class="text-box-dark" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></li>
                        </ul>
                        <ul>
                            <li><input class="text-box-dark" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"></li>
                            <li><input class="text-box-dark" type="text" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"></li>
                        </ul>
                        <ul>
                            <li><input class="text-box-dark" type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"></li>
                            <li><input class="text-box-dark" type="text" value="Pin Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Pin Code';}"></li>
                        
                        </ul>
                    <div class="clear"></div>
                    <h4 class="paymenthead"><span class="payment"></span>Payment Details</h4>
                    <div class="clear"></div>                                       
                        <ul>
                            <li><input class="text-box-dark" type="text" value="Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Card Number';}"></li>
                            <li><input class="text-box-dark" type="text" value="Name on card" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name on card';}"></li>
                        </ul>
                        <ul>
                            <li><input class="text-box-light hasDatepicker" type="text" id="datepicker" value="Expiration Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Expiration Date';}"><em class="pay-date"> </em></li>
                            <li><input class="text-box-dark" type="text" value="Security Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Security Code';}"></li>
                        </ul>
                        <ul class="payment-sendbtns">
                            <li><input type="reset" value="Reset"></li>
                            <li><a href="#" class="order">Process order</a></li>
                        </ul>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--pop-up-grid-->

    <!--login-pop-up-grid-->
    <div id="popup">
        <div id="login-small-dialog" class="mfp-hide">
            <div class="pop_up">
                <div class="login-page">
    <div class="login-main">    
         <div class="login-head">
                <h1><?php echo e(__('Login')); ?></h1>
            </div>
            <div class="login-block">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <input id="email" type="email" placeholder="type your email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    <input id="password" type="password" placeholder="type your password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    <div class="forgot-top-grids">
                        <div class="forgot-grid">
                            <ul>
                                <li>
                                    <input type="checkbox" id="brand1" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label for="brand1"><span></span><?php echo e(__('Remember Me')); ?></label>
                                </li>
                            </ul>
                        </div>
                        <div class="forgot">
                            <a href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" name="Sign In" value="Login">  
                    <h3>Not a member?<a href="<?php echo e(route('register')); ?>"> Sign up now</a></h3>                
                    <!-- <h2>or login with</h2>
                    <div class="login-icons">
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>                       
                        </ul>
                    </div> -->
                </form>
                <h5><a href="<?php echo e(url('/')); ?>">Go Back to Home</a></h5>
            </div>
      </div>
</div>
            </div>
        </div>
    </div>
    <!--login-pop-up-grid-->

    <!--register-pop-up-grid-->
    <div id="popup">
        <div id="register-small-dialog" class="mfp-hide">
            <div class="pop_up">
                <div class="signup-page-main">
     <div class="signup-main">      
         <div class="signup-head">
                <h1>Sign Up</h1>
            </div>
            <div class="signup-block">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" required autofocus>
                    <?php if($errors->has('name')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                    <?php endif; ?>
                    <input placeholder="Email" id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                    <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                    <input placeholder="Mobile Number" id="mobile" type="text" class="form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" name="mobile" value="<?php echo e(old('mobile')); ?>" required>
                    <?php if($errors->has('mobile')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('mobile')); ?></strong>
                        </span>
                    <?php endif; ?>
                    <input placeholder="Password" id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                    <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                    <input id="password-confirm" type="password" class="lock form-control" placeholder="Confirm Password" name="password_confirmation" required>
                    <div class="forgot-top-grids">
                        <div class="forgot-grid">
                            <ul>
                                <li>
                                    <input type="checkbox" id="brand1" value="">
                                    <label for="brand1"><span></span>I agree to the terms</label>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" name="Sign In" value="Sign up">                                                        
                </form>
                <div class="sign-down">
                <h4>Already have an account? <a href="<?php echo e(route('login')); ?>"> Login here.</a></h4>
                  <h5><a href="<?php echo e(url('/')); ?>">Go Back to Home</a></h5>
                </div>
            </div>
    </div>
</div>
            </div>
        </div>
    </div>
    <!--register-pop-up-grid-->

    <!--copy rights start here-->
    <div class="copyrights">
        <div class="row">
            <div class="col-xs-12 col-md-6"><p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. All Rights Reserved.</p></div>
            <div class="col-xs-12 col-md-6"><p>Design by  <a href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e(config('app.name', 'Laravel')); ?></a> </p></div>
        </div>
    </div> 
    <!--COPY rights end here-->
</div>
<!-- </div> -->
<!--slider menu-->
    <!-- <div class="sidebar-menu">
            <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
                  <!--<img id="logo" src="" alt="Logo"/>--> 
              <!--</a> </div>         
            <div class="menu">
              <ul id="menu" >
                <li id="menu-home" ><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i><span>Home</span></a></li>
                <li id="menu-academico" ><a href="<?php echo e(url('/categories')); ?>"><i class="fa fa-file-text"></i><span>Categories</span><span class="fa fa-angle-right" style="float: right"></span></a>
                  <ul id="menu-academico-sub" >
                    <?php $__currentLoopData = \App\Categories::where('status','active')->orderBy('category_order','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li id="menu-academico-boletim" ><a href="<?php echo e(url('/'. $category->category_slug)); ?>"><?php echo e($category->category_name); ?></a>
                     </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
                  </ul>
                </li>
                
                <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span></a></li>
                <li><a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
                     <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="inbox.html">Inbox</a></li>
                        <li id="menu-academico-boletim" ><a href="inbox-details.html">Compose email</a></li>
                     </ul>
                </li>
                 <li><a href="#"><i class="fa fa-cog"></i><span>System</span><span class="fa fa-angle-right" style="float: right"></span></a>
                     <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="404.html">404</a></li>
                        <li id="menu-academico-boletim" ><a href="blank.html">Blank</a></li>
                     </ul>
                 </li>
                 <li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>
                        <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
                     </ul>
                 </li>
              </ul>
            </div>
     </div> -->
    <div class="clearfix"> </div>
</div>
    
    <!--slide bar menu end here-->
    <script>
    var toggle = true;
                
    $(".sidebar-icon").click(function() {                
      if (toggle)
      {
        $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
        $("#menu span").css({"position":"absolute"});
      }
      else
      {
        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
        setTimeout(function() {
          $("#menu span").css({"position":"relative"});
        }, 400);
      }               
                    toggle = !toggle;
                });
    </script>
    <script type="text/javascript" src="<?php echo e(asset('js/nivo-lightbox.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
        });
    </script>

            <script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
            <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
            <!--//scrolling js-->
    <script src="<?php echo e(asset('js/bootstrap.js')); ?>"> </script>
    <!-- mother grid end here-->
    <!-- Javascript files-->
    <!-- <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script> -->
    <script src="<?php echo e(asset('vendor/popper.js/umd/popper.min.js')); ?>"> </script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery.cookie/jquery.cookie.js')); ?>"> </script>
    <script src="<?php echo e(asset('vendor/waypoints/lib/jquery.waypoints.min.js')); ?>"> </script>
    <script src="<?php echo e(asset('vendor/jquery.counterup/jquery.counterup.min.js')); ?>"> </script>
    <script src="<?php echo e(asset('vendor/owl.carousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.parallax-1.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap-select/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery.scrollto/jquery.scrollTo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/front.js')); ?>"></script>
    <script src="<?php echo e(asset('js/cart.js')); ?>"></script>
    <script type="text/javascript">
        var BASE_URL = "<?php echo e(url('/')); ?>";
        var REQUEST_URL = "<?=Request::url()?>";
        var CSRF = "<?php echo e(csrf_token()); ?>";
    </script>
    
</body>
</html>
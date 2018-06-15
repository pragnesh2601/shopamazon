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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
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
    <!-- <script>window.modernizr || document.write("<script src='<?php echo e(asset('lib/modernizr/modernizr-custom.js')); ?>'><\/script>")</script> -->
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
   <div class="left-content">
       <div class="mother-grid-inner">
            <!--header start here-->
                <div class="header-main">
                    <div class="header-left">
                            <div class="logo-name">
                                     <a href="<?php echo e(url('/')); ?>"> <h1><?php echo e(config('app.name', 'Laravel')); ?></h1> 
                                    <!--<img id="logo" src="" alt="Logo"/>--> 
                                  </a>                              
                            </div>
                            <!--search-box-->
                                <!-- <div class="search-box">
                                    <form>
                                        <input type="text" placeholder="Search..." required=""> 
                                        <input type="submit" value="">                  
                                    </form>
                                </div> -->
                                <!--//end-search-box-->
                            <div class="clearfix"> </div>
                         </div>
                         <div class="header-right">
                            <!--notification menu end -->
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

<!--copy rights start here-->
<div class="copyrights">
    <div class="row">
        <div class="col-xs-12 col-md-6"><p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. All Rights Reserved.</p></div>
        <div class="col-xs-12 col-md-6"><p>Design by  <a href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e(config('app.name', 'Laravel')); ?></a> </p></div>
    </div>
     <!-- <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. All Rights Reserved | Design by  <a href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e(config('app.name', 'Laravel')); ?></a> </p> -->
</div> 
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
            <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
                  <!--<img id="logo" src="" alt="Logo"/>--> 
              </a> </div>         
            <div class="menu">
              <ul id="menu" >
                <li id="menu-home" ><a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                <li><a href="#"><i class="fa fa-cogs"></i><span>Category</span><span class="fa fa-angle-right" style="float: right"></span></a>
                  <ul>
                    <li><a href="<?php echo e(url('/admin/addcategory')); ?>">Add</a></li>
                    <li><a href="<?php echo e(url('/admin/viewcategory')); ?>">View Category</a></li>                    
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-cogs"></i><span>Sub Category</span><span class="fa fa-angle-right" style="float: right"></span></a>
                  <ul>
                    <li><a href="<?php echo e(url('/admin/addsubcategory')); ?>">Add</a></li>
                    <li><a href="<?php echo e(url('/admin/viewsubcategory')); ?>">View Sub Category</a></li>                    
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i><span>Products</span><span class="fa fa-angle-right" style="float: right"></span></a>
                  <ul>
                    <li><a href="<?php echo e(url('/admin/addproduct')); ?>">Add Product</a></li>
                    <li><a href="<?php echo e(url('/admin/viewproducts')); ?>">View Products</a></li>                    
                  </ul>
                </li>
                 <li><a href="#"><i class="fa fa-cog"></i><span>System</span><span class="fa fa-angle-right" style="float: right"></span></a>
                     <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="<?php echo e(url('/admin/profile')); ?>">Edit Profile</a></li>
                        <li id="menu-academico-boletim" ><a href="<?php echo e(url('/admin/settings')); ?>">Site Settings</a></li>
                     </ul>
                 </li>
              </ul>
            </div>
     </div>
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
<!--scrolling js-->
        <script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
        <!--//scrolling js-->
        <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
        <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/jquery.serializeJSON/jquery.serializejson.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.js')); ?>"> </script>
<!-- mother grid end here-->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"> </script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
    var BASE_URL = "<?php echo e(url('/')); ?>";
    var REQUEST_URL = "<?=Request::url()?>";
    var CSRF = "<?php echo e(csrf_token()); ?>";
</script>
</body>
</html>

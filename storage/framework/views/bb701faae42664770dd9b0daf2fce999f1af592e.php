<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keyword" content="<?php echo e($setting->json->site_meta_keywords); ?>">
    <meta name="description" content="<?php echo e($setting->json->site_meta_description); ?>">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($setting->json->site_title); ?></title>
    
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('frontend/vendor/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('frontend/css/shop-homepage.css')); ?>" rel="stylesheet">

    <!-- owl carousel-->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/owl.carousel/assets/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/owl.carousel/assets/owl.theme.default.css')); ?>">

    <!--icons-css-->
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet"> 
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <style type="text/css">
      #wait{position: fixed;background: url("<?php echo e(asset('/images/loading_cart.gif')); ?>") 50% 50% no-repeat rgba(255,255,255,0.9); left: 0px; top: 0px; width: 100%; height: 100%; z-index: 9999; opacity: 1; display:none;}
    </style>
  </head>
  <body>
  <div id="wait"></div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e($setting->getLogo(30,30)); ?>" alt="" class="img-responsive" > <?php echo e($setting->json->site_title); ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo e(url('/')); ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/category')); ?>">CategoryPage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/category')); ?>">SubPage</a>
            </li> -->
            <?php if(!Auth::check()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
            </li>
            <?php else: ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-user fa-fw"></i> <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?> <!-- <i class="fa fa-caret-down"></i> -->
              </a>
              <ul class="dropdown-menu dropdown-user">
                <?php if(Auth::user()->role == 'Super Administrator'): ?>
                <li><a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home fa-fw"></i> Return to Dashboard</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li><a class="dropdown-item" href="<?php echo e(route('settings')); ?>"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                <?php endif; ?>
                <?php if(Auth::user()->role == 'User'): ?>
                <li><a class="dropdown-item" href="<?php echo e(route('userprofile')); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <?php endif; ?>
                <li class="divider"></li>
                <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a><form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form></li>
              </ul>
              <!-- /.dropdown-user -->
            </li>
            <?php endif; ?>
            <li class="nav-item dropdown keep-inside-clicks-open">
                    <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="<?php echo e(url('/cart')); ?>">
                        <i class="fa fa-shopping-cart fa-fw shopping-cart"></i> <span id="cartCount" class="badge badge-warning"><?php echo e(count(Session::get('Cart'))); ?></span>
                    </a>
                    <div class="dropdown-menu" ng-click="$event.stopPropagation()" id="cartPartial" style="left: -50em;min-width: 53em;padding: 10px;">
                       <?php echo $__env->make('partials.cartpartial', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
                    </div>
                    <!-- /.dropdown-user -->
                </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
    <footer class="py-2 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><?php echo e($setting->json->copyrights); ?></p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/jquery-2.1.1.min.js')); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset('frontend/vendor/bootstrap/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/vendor/bootstrap/js/bootstrap.bundle.js')); ?>"></script>
     <script type="text/javascript">
        var BASE_URL = "<?php echo e(url('/')); ?>";
        var REQUEST_URL = "<?=Request::url()?>";
        var CSRF = "<?php echo e(csrf_token()); ?>";
    </script>
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
        $(document).on('click.bs.dropdown.data-api', '.dropdown.keep-inside-clicks-open', function (e) {
            e.stopPropagation();
        });
        $(document).ready(function(){
     
  // assign oldVal data attribute at once on document ready
  $(".quantity:input").data('oldVal', $(".quantity:input").val());
   
   $(".quantity:input").change(function(){
      //get the newVal on change
      var newVal = $(this).val();
      // get the oldVal from data attribute 
      var oldVal = parseFloat($(this).data('oldVal'));
      // do stuff you need here
      if ( newVal > oldVal) {
        
      } else {
      
      }
      console.log( 'newVal is ' + newVal + ' oldVal was ' + oldVal);
      //store the newVal as the oldVal for the next change
      $(this).data('oldVal', newVal)
       })
     .focus(function(){
      // assign oldVal data attribute on input focus
      $(this).data('oldVal', $(this).val());
     });
     
});
    </script>

    <script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <!--//scrolling js-->
    <!-- <script src="<?php echo e(asset('js/bootstrap.js')); ?>"> </script> -->
    <!-- mother grid end here-->
    <!-- Javascript files-->
    <!-- <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script> -->
    <!-- <script src="<?php echo e(asset('vendor/popper.js/umd/popper.min.js')); ?>"> </script> -->
    <!-- <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script> -->
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo e(asset('js/flyto.js')); ?>"></script>
      <script>
          $('.items').flyto({
              item      : '.item',
              target    : '.dropdown-toggle',
              button    : '.add-to-cart'
          });
      </script>
    <script src="<?php echo e(asset('vendor/jquery.serializeJSON/jquery.serializejson.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <script type="text/javascript">
      $("input[type=password]").keyup(function(){
        var ucase = new RegExp("[A-Z]+");
        var lcase = new RegExp("[a-z]+");
        var num = new RegExp("[0-9]+");
      
        if($("#password1").val().length >= 8){
          $("#8char").removeClass("glyphicon-remove");
          $("#8char").addClass("glyphicon-ok");
          $("#8char").css("color","#00A41E");
        }else{
          $("#8char").removeClass("glyphicon-ok");
          $("#8char").addClass("glyphicon-remove");
          $("#8char").css("color","#FF0004");
        }
        
        if(ucase.test($("#password1").val())){
          $("#ucase").removeClass("glyphicon-remove");
          $("#ucase").addClass("glyphicon-ok");
          $("#ucase").css("color","#00A41E");
        }else{
          $("#ucase").removeClass("glyphicon-ok");
          $("#ucase").addClass("glyphicon-remove");
          $("#ucase").css("color","#FF0004");
        }
        
        if(lcase.test($("#password1").val())){
          $("#lcase").removeClass("glyphicon-remove");
          $("#lcase").addClass("glyphicon-ok");
          $("#lcase").css("color","#00A41E");
        }else{
          $("#lcase").removeClass("glyphicon-ok");
          $("#lcase").addClass("glyphicon-remove");
          $("#lcase").css("color","#FF0004");
        }
        
        if(num.test($("#password1").val())){
          $("#num").removeClass("glyphicon-remove");
          $("#num").addClass("glyphicon-ok");
          $("#num").css("color","#00A41E");
        }else{
          $("#num").removeClass("glyphicon-ok");
          $("#num").addClass("glyphicon-remove");
          $("#num").css("color","#FF0004");
        }
        
        if($("#password1").val() == $("#password2").val()){
          $("#pwmatch").removeClass("glyphicon-remove");
          $("#pwmatch").addClass("glyphicon-ok");
          $("#pwmatch").css("color","#00A41E");
        }else{
          $("#pwmatch").removeClass("glyphicon-ok");
          $("#pwmatch").addClass("glyphicon-remove");
          $("#pwmatch").css("color","#FF0004");
        }
        
      });
    </script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
    $('#RegisterForm').bootstrapValidator({
        container: 'tooltip',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});
    </script> -->
  </body>
</html>
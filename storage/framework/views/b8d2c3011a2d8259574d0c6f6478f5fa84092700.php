<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('backend/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo e(asset('backend/vendor/metisMenu/metisMenu.min.css')); ?>" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="<?php echo e(asset('backend/vendor/datatables-plugins/dataTables.bootstrap.css')); ?>" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo e(asset('backend/vendor/datatables-responsive/dataTables.responsive.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('backend/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?php echo e(asset('backend/vendor/morrisjs/morris.css')); ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo e(asset('backend/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .file {visibility: hidden; position: absolute;}
        #wait{position: fixed;background: url("<?php echo e(asset('/images/loading_cart.gif')); ?>") 50% 50% no-repeat rgba(255,255,255,0.9); left: 0px; top: 0px; width: 100%; height: 100%; z-index: 9999; opacity: 1; display:none;}
    </style>
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><?php echo e($setting->json->site_title); ?> Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img class="image-profile img-circle" src="<?php echo e(Auth::user()->getPhoto(20, 20)); ?>" alt="" /> <!-- <i class="fa fa-user fa-fw"></i> --> <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home fa-fw"></i> Return to Home</a>
                        </li>
                        <li><a href="<?php echo e(route('profile')); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <?php if(Auth::user()->role == 'Super Administrator'): ?>
                        <li><a href="<?php echo e(route('settings')); ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo e(csrf_field()); ?>

                                                </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php if(Auth::user()->role == 'Super Administrator'): ?>
                        <li>
                            <a href="<?php echo e(url('/admin/dashboard')); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/admin/addcategory')); ?>">Add Category</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/viewcategory')); ?>">View Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Sub Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/admin/addsubcategory')); ?>">Add Sub Category</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/viewsubcategory')); ?>">View Sub Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo e(url('/admin/addproduct')); ?>">Add Product</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/admin/viewproducts')); ?>">View Products</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                        <li>
                            <a href="<?php echo e(url('/admin/users')); ?>"><i class="fa fa-edit fa-fw"></i> View Users</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/admin/settings')); ?>"><i class="fa fa-edit fa-fw"></i> Site Settings</a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(url('/admin/profile')); ?>"><i class="fa fa-table fa-fw"></i> Edit Profile</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
            <!-- Footer -->
    <footer class="py-2 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><?php echo e($setting->json->copyrights); ?></p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- jQuery -->
    <script src="<?php echo e(asset('backend/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-2.1.1.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset('backend/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(asset('backend/vendor/metisMenu/metisMenu.min.js')); ?>"></script>
    <?php if(Route::currentRouteName() == 'dashboard'): ?>
    <!-- Morris Charts JavaScript -->
    <!-- <script src="<?php echo e(asset('backend/vendor/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/morrisjs/morris.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/data/morris-data.js')); ?>"></script> -->
    
    <!-- Flot Charts JavaScript -->
    <!-- <script src="<?php echo e(asset('backend/vendor/flot/excanvas.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/flot/jquery.flot.time.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/flot-tooltip/jquery.flot.tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/data/flot-data.js')); ?>"></script> -->
     <?php endif; ?>
    <!-- DataTables JavaScript -->
    <script src="<?php echo e(asset('backend/vendor/datatables/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/datatables-plugins/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/datatables-responsive/dataTables.responsive.js')); ?>"></script>
    

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(asset('backend/dist/js/sb-admin-2.js')); ?>"></script>
    <!--scrolling js-->
    <script src="<?php echo e(asset('js/jquery.nicescroll.js')); ?>"></script>
    <!--//scrolling js-->
    <script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery.serializeJSON/jquery.serializejson.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <!-- <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script> -->
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>
    <script type="text/javascript">
        var BASE_URL = "<?php echo e(url('/')); ?>";
        var REQUEST_URL = "<?=Request::url()?>";
        var CSRF = "<?php echo e(csrf_token()); ?>";
    </script>
</body>
</html>
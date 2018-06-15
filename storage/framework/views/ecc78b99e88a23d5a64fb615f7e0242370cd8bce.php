<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<title><?php echo e(config('app.name', 'Laravel')); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
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
</head>
<body>	
	<?php echo $__env->yieldContent('content'); ?>
	<!--inner block end here-->
	<!--copy rights start here-->
	<div class="copyrights">
		<div class="row">
			<div class="col-xs-12 col-md-6"><p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. All Rights Reserved.</p></div>
			<div class="col-xs-12 col-md-6"><p>Design by  <a href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e(config('app.name', 'Laravel')); ?></a> </p></div>
		</div>	
	 <!-- <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. All Rights Reserved | Design by  <a href="<?php echo e(url('/')); ?>" target="_blank"><?php echo e(config('app.name', 'Laravel')); ?></a> </p> -->
	</div>	
	<!--COPY rights end here-->

	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<script src="js/bootstrap.js"> </script>
	<!-- mother grid end here-->
</body>
</html>
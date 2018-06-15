<?php $__env->startSection('content'); ?>
<div class="product-block">
    	<div class="container-fluid">
          <div class="row bar">
            <!-- LEFT COLUMN-->
            <div class="col-lg-12">
            	<h5><?php echo e(strtoupper($item['ItemAttributes']['Title'])); ?></h5>
              <p class="lead"></p>
              <p class="goToDescription"><a href="#CustomerReviews" class="scroll-to text-uppercase">Scroll to Customer Reviews </a></p>
              <div id="productMain" class="row">
                <div class="col-xs-12 col-sm-6">
                  	<div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  		<?php if(isset($item['ImageSets'])): ?>
                  			<?php $__currentLoopData = $item['ImageSets']['ImageSet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<div><img src="<?php echo e($image['LargeImage']['URL']); ?>" alt="" class="img-fluid image"></div>
                    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    	<?php endif; ?>
                  	</div>
                	<div data-slider-id="1" class="owl-thumbs">
                  		<?php if(isset($item['ImageSets'])): ?>
                  			<?php $__currentLoopData = $item['ImageSets']['ImageSet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  				<button class="owl-thumb-item"><img src="<?php echo e($image['ThumbnailImage']['URL']); ?>" alt="" class="img-fluid"></button>
                    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    	<?php endif; ?>
                  	</div>
                  	<div class="box mb-4 mt-4">
                    	<form>
                      	<!--<div class="sizes">
                        		<h3>Available sizes</h3>
                        		<select class="bs-select">
                          			<option value="small">Small</option>
                          			<option value="medium">Medium</option>
                          			<option value="large">Large</option>
                          			<option value="x-large">X Large</option>
                        		</select>
                      		</div>-->
                      		<p class="price"><?php echo e($item['OfferSummary']['LowestNewPrice']['FormattedPrice']); ?></p>
                      		<p class="text-center">
                        		<button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        		<button href="<?php echo e($item['ItemLinks']['ItemLink']['0']['URL']); ?>" type="submit" data-toggle="tooltip" data-placement="top" title="<?php echo e($item['ItemLinks']['ItemLink']['0']['Description']); ?>" class="btn btn-default"><i class="fa fa-heart-o"></i></button>
                      		</p>
                    	</form>
                  	</div>
                </div>
                <div class="col-xs-12 col-sm-6">
                   	<div id="details" class="box mb-4 mt-4">
                		<p></p>
                		<?php if(isset($item['ItemAttributes']['Feature'])): ?>
                		<h4><?php echo e($item['EditorialReviews']['EditorialReview']['Source']); ?></h4>
	                		<ul>
	        					<?php $__currentLoopData = $item['ItemAttributes']['Feature']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                				<li><?php echo e($feature); ?></li>
	                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            			</ul>
                		<?php endif; ?>
                		<p></p>
                		<?php if(isset($item['ItemAttributes']['Author'])): ?>
                		<h4>Author details</h4>
	        					<?php $__currentLoopData = $item['ItemAttributes']['Author']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        					<blockquote class="blockquote">
                  					<p class="mb-0"><em><?php echo e($Author); ?></em></p>
                				</blockquote>
	                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		<?php endif; ?>
                		<!-- <p></p>
                		<?php if(isset($item['EditorialReviews']['EditorialReview'])): ?>
                		<h4><?php echo e($item['EditorialReviews']['EditorialReview']['Source']); ?></h4>
                			<blockquote class="blockquote">
                  				<p class="mb-0"><em><?php echo $item['EditorialReviews']['EditorialReview']['Content']; ?></em></p>
                			</blockquote>
                		<?php endif; ?> -->
                		
                		
              		</div>
					<!-- <div id="product-social" class="box social text-center mb-5 mt-5">
                		<h4 class="heading-light">Show it to your friends</h4>
                		<ul class="social list-inline">
                  			<li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                  			<li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                  			<li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                  			<li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></li>
                		</ul>
              		</div> -->
              		<div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
  			<iframe id="CustomerReviews" class="force-overflow" src="<?php echo e($item['CustomerReviews']['IFrameURL']); ?>" frameborder="0" style="width:100%; display:block; height:100%; min-height:45em; max-height:100em; border:none; margin:0; padding:0; overflow:auto; z-index:1;" width="100%"></iframe>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
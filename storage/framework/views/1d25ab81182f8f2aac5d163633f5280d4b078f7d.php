<?php $__env->startSection('content'); ?>
<div class="product-block">
	<div class="container-fluid">
          <div class="row bar">
            <div class="col-md-12">
            	<h5><?php echo e(strtoupper($slug)); ?></h5>	
              <!-- <p class="text-muted lead text-left"><?php echo e($slug); ?></p> -->
              <div class="products-big">
                <div class="row products">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item['LargeImage']['URL'])): ?>
			    	<div class="col-md-3 product-grid">
			    		<div class="product-items">
			    			
				    		    <div class="project-eff">
									<div id="nivo-lightbox-demo"><a href="<?php echo e($item['LargeImage']['URL']); ?>" data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></div>     
										<img class="img-responsive image" src="<?php echo e($item['LargeImage']['URL']); ?>" alt="" />
								</div>
								
				    		<div class="produ-cost">
				    			<h4><?php echo e(substr($item['ItemAttributes']['Title'],0,30)); ?></h4>
				    			<?php if(@isset($item['ItemAttributes']['ListPrice'])): ?>
			                    <h5><?php echo e($item['ItemAttributes']['ListPrice']['FormattedPrice']); ?></h5>
			                    <?php else: ?>
			                    <h5>EUR 0,00</h5>
			                    <?php endif; ?>
				    		</div>
				    		<div class="col-xs-6 price-selet pric-clr1">		    			   
						   		<a href="<?php echo e(url('/'.$slug.'/'.$item['ASIN'])); ?>">View Details</a>
							</div>
							<div class="col-xs-6 price-selet">		    			   
						   		<a href="<?php echo e(url('/addcart')); ?>">Add to Cart</a>
							</div>
							<div class="clearfix"> </div>
			    		</div>

			    	</div>
			    	<?php endif; ?>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-md-12 banner mb-small text-center"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>
              </div> -->
              <div class="pages">
                <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
                <!-- <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </nav> -->
              </div>
            </div>
          </div>
        </div>
      <div class="clearfix"> </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
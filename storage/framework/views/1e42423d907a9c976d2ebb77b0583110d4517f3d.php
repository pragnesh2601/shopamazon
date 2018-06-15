<!-- dd(Route::currentRouteName()!='guest') -->
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
    <?php echo $__env->make('partials.searchform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 my-4">

            <!-- <h5 class="my-4"></h5> -->
            <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 my-4">
          <?php if(count($items)): ?>
          <div class="row items">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 item col-md-4 col-sm-6 col-xs-12 mb-4">
              <div class="card h-100">
                <a href="<?php if(isset($item->asin)): ?><?php echo e(url('/product/'.$item->asin)); ?><?php endif; ?>"><img style="object-fit: contain; width: 100%; min-height: 240px; max-height: 240px; vertical-align: middle; height: 100%;    margin: 10px auto;" class="card-img-top" src="<?php if(isset($item->json->LargeImage->URL)): ?><?php echo e($item->json->LargeImage->URL); ?><?php endif; ?>" alt=""></a>
                <div class="card-body">
                  <!-- <h4 class="card-title"> -->
                    <a href="<?php if(isset($item->asin)): ?><?php echo e(url('/product/'.$item->asin)); ?><?php endif; ?>"><small>
                      <?php if(isset($item->json->ItemAttributes->Title)): ?><?php echo e($item->json->ItemAttributes->Title); ?><?php endif; ?></small></a>
                    <br>
                  <!-- <small>by <?php if(isset($item->json->ItemAttributes->Publisher)): ?><?php echo e($item->json->ItemAttributes->Publisher); ?><?php endif; ?>
                    <?php if(isset($item->json->ItemAttributes->Brand)): ?><?php echo e($item->json->ItemAttributes->Brand); ?><?php endif; ?>
                  </small> -->
                </div>
                <div class="card-footer">
                    <div class="float-left col-xs-6 d-inline text-center">
                        <h5>
                            <?php if(@isset($item->json->OfferSummary->LowestNewPrice)): ?>
                                <?php echo e($item->json->OfferSummary->LowestNewPrice->FormattedPrice); ?>

                            <?php else: ?>
                                EUR 0,00
                            <?php endif; ?>
                        </h5>
                    </div>
                    <div class="float-right col-xs-6 d-inline text-center" onclick="addToCart('<?php echo e($item->asin); ?>',1,true)"><a class="btn btn-sm btn-warning add-to-cart"><b>Add to Cart</b></a>&nbsp;</div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
            <div class="clearfix"></div>
            <div class="pull-right">
              <?php echo e($items->links()); ?>

            </div>
          <!-- /.row -->
            <?php else: ?>
            <div class="row">
              <div class="clearfix"></div>
              <div class="col-md-12 text-center"><h2> There are no Products Available.</h2></div>
              <div class="clearfix"></div>
              <div class="col-md-12 text-center"><img src="<?php echo e(asset('images/404.png')); ?>" class="img-thumbnail" alt=""></div>
            </div>
            <?php endif; ?>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
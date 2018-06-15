<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="row justify-content-md-center">
            <div class="col-md-4 my-4">
                <h2 class="text-center"><img src="<?php echo e($setting->getLogo()); ?>" alt="" class="img-responsive" ><br><?php echo e($setting->json->search_header_text); ?></h2>
            </div>
        </div>
        <?php echo $__env->make('partials.searchform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-4">
<?php if(isset($items)): ?>
          <div class="row">
            
            <?php $__currentLoopData = array_slice($items, 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
              <div class="card h-100">
                <a href="<?php echo e(url('/'.$slug.'/'.$item['ASIN'])); ?>"><img style="object-fit: contain; width: 100%; min-height: 240px; max-height: 240px; vertical-align: middle; height: 100%;" class="card-img-top" src="<?php echo e($item['LargeImage']['URL']); ?>" alt=""></a>
                <div class="card-body">
                  <!-- <h4 class="card-title"> -->
                    <a href="<?php echo e(url('/'.$slug.'/'.$item['ASIN'])); ?>"><?php echo e(substr($item['ItemAttributes']['Title'],0,30)); ?></a>
                  <!-- </h4> --><br>
                  <small>by <?php if(isset($item['ItemAttributes']['Publisher'])): ?><?php echo e($item['ItemAttributes']['Publisher']); ?><?php endif; ?>
                    <?php if(isset($item['ItemAttributes']['Brand'])): ?><?php echo e($item['ItemAttributes']['Brand']); ?><?php endif; ?>
                  </small>
                </div>
                <div class="card-footer">
                    <div class="float-left col-xs-6 d-inline text-center">
                        <h5>
                            <?php if(@isset($item['OfferSummary'])): ?>
                                <?php echo e($item['OfferSummary']['LowestNewPrice']['FormattedPrice']); ?>

                            <?php else: ?>
                                EUR 0,00
                            <?php endif; ?>
                        </h5>
                    </div>
                    <div class="float-right col-xs-6 d-inline text-center" onclick="addToCart('<?php echo e($item['ASIN']); ?>',1,true)"><a class="btn btn-sm btn-warning">Add to Cart</a>&nbsp;</div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <nav  class="pull-right" aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
            <?php endif; ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- col-sm-12 -->
        <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
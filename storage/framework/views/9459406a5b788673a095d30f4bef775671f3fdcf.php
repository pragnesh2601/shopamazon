<?php $__env->startSection('content'); ?>
<div class="product-block">
        <div class="pro-head">
            <h2>Products</h2>
        </div>
        <?php if(isset($items)): ?>
        <?php $__currentLoopData = array_slice($items, 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 product-grid">
            <div class="product-items">
                    <div class="project-eff">  
                        <a href="<?php echo e(url('/'.$slug.'/'.$item['ASIN'])); ?>">
                            <img class="img-responsive image" src="<?php echo e($item['LargeImage']['URL']); ?>" alt="" />
                        </a>
                    </div>
                <div class="col-sm-12">
                    <a href="<?php echo e(url('/'.$slug.'/'.$item['ASIN'])); ?>"><?php echo e(substr($item['ItemAttributes']['Title'],0,30)); ?></a>
                </div>
                <div class="col-xs-6" style="color: #111; display: inline-block; font-size: 21px; font-weight: 700;">                           
                    <?php if(@isset($item['OfferSummary'])): ?>
                    <?php echo e($item['OfferSummary']['LowestNewPrice']['FormattedPrice']); ?>

                    <?php else: ?>
                    EUR 0,00
                    <?php endif; ?>
                </div>
                <div class="col-xs-6">                         
                    <a  class="btn btn-sm btn-warning sett" rel="button" onclick="addToCart('<?php echo e($item['ASIN']); ?>',1,true)">Add to Cart</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

      <div class="clearfix"> </div>
    </div>         
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
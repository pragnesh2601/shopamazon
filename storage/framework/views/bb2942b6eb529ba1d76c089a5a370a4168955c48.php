<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php echo $__env->make('partials.searchform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 my-4">

            <!-- <h5 class="my-4"></h5> -->
            <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
  <!-- LEFT COLUMN-->
    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 my-4">
      <h5 class="text-center"><?php if(isset($item->json->ItemAttributes->Title)): ?><?php echo e(strtoupper($item->json->ItemAttributes->Title)); ?><?php endif; ?></h5>
      <p class="lead"></p>
      <p class="goToDescription text-center"><a href="#CustomerReviews" class="scroll-to text-uppercase">Scroll to Customer Reviews </a></p>
      <div id="productMain" class="row mb-5">
        <div class="col-lg-6 col-md-6 col-sm-6 col-md-12">
          <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
            <?php if(isset($item->json->ImageSets)): ?>
              <?php $__currentLoopData = $item->json->ImageSets->ImageSet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-3"><img src="<?php echo e($image->LargeImage->URL); ?>" alt="" class="img-fluid image" quickbeam="image"
data-src="<?php echo e($image->LargeImage->URL); ?>" ></div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
          <div data-slider-id="1" class="owl-thumbs text-center">
            <?php if(isset($item->json->ImageSets)): ?>
              <?php $__currentLoopData = $item->json->ImageSets->ImageSet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="owl-thumb-item mb-1"><img src="<?php echo e($image->TinyImage->URL); ?>" width="80px" height="80px" alt="" class=""></button>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-md-12">
          <div class="card h-100">
            <!-- <button href="<?php echo e($item['ItemLinks']['ItemLink']['0']['URL']); ?>" type="submit" data-toggle="tooltip" data-placement="top" title="<?php echo e($item['ItemLinks']['ItemLink']['0']['Description']); ?>" class="btn btn-sm btn-defalut float-right"><i class="fa fa-heart-o"></i></button> -->
            <!--<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
            <div class="card-body">
              <?php if(@isset($item->json->ItemAttributes->Feature->EditorialReviews)): ?>
                <h4 class="card-title"><?php echo e($item->json->EditorialReviews->EditorialReview->Source); ?></h4>
                <ul class="card-text text-justify">
                  <?php $__currentLoopData = $item->json->ItemAttributes->Feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($feature); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              <?php else: ?>
                <h4 class="card-title"><?php echo e(__('Product Features')); ?></h4>
                <ul class="card-text text-justify">
                  <?php if(isset($item->json->ItemAttributes->Feature)): ?>
                  <?php $__currentLoopData = $item->json->ItemAttributes->Feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($feature); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </ul>
              <?php endif; ?>
              <p></p>
              <?php if(isset($item->json->ItemAttributes->Author)): ?>
                <h4 class="card-title">Author details</h4>
                <?php $__currentLoopData = $item->json->ItemAttributes->Author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <blockquote class="blockquote">
                  <p class="card-text text-justify mb-0"><em><?php echo e($Author); ?></em></p>
                </blockquote>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
            <div class="card-footer">
              <div class="float-left col-xs-6 d-inline text-center">
                <h4>
                  <?php if(@isset($item->json->OfferSummary->LowestNewPrice)): ?>
                  
                  <div class="price" id="price-preview" quickbeam="price" quickbeam-price="<?php echo e(($item->json->OfferSummary->LowestNewPrice->Amount / 100.0)); ?>">
                    <?php echo e($item->json->OfferSummary->LowestNewPrice->FormattedPrice); ?>

                  </div>
                  <?php else: ?>
                      EUR 0,00
                  <?php endif; ?>
                </h4>
              </div>
              <div class="float-right col-xs-3 d-inline text-center">
                <?php if(!empty($item->json->Variations)): ?>
                <a href="<?php echo e($item->json->DetailPageURL); ?>" class="btn btn-sm btn-warning">View Variations</a>&nbsp;
                <?php else: ?>
                <a href="<?php echo e($item->json->DetailPageURL); ?>" target="_blank" class="btn btn-sm btn-warning">View on Amazon</a>&nbsp;
                <?php endif; ?>
              </div>
              <div class="float-right col-xs-3 d-inline text-center">
                <a href="#" class="btn btn-sm btn-warning" id="AddToCart" quickbeam="add-to-cart" onclick="addToCart('<?php echo e($item->json->ASIN); ?>',1,true)">Add to Cart</a>&nbsp;
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <div id="CustomerReviews" class="row">
        <iframe class="force-overflow" src="<?php echo e($item->json->CustomerReviews->IFrameURL); ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" style="width:100%; display:block; height:100%; min-height:65em; max-height:100em; border:none; margin:0; padding:0; overflow:auto; z-index:0;" width="100%"></iframe>
          <script>
            function resizeIframe(obj) {
              obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            }
          </script>
        <div class="clearfix"></div>
      </div>
  </div>
  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
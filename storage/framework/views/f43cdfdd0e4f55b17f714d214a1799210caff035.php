<?php $__env->startSection('content'); ?>

<div class="product-block">
    <div class="container">
        <div class="row my-4" id="cartpagePartial">
            <?php echo $__env->make('partials.cartpartial', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!--<?php if(count(Session::get('Cart'))): ?>
            <div class="col-md-9 clearfix" id="basket">
                <div class="col-md-12 mt-4">
                    <h3 class="cart-empty">Shopping Cart</h3>
                    <small class="text-muted">You currently have <?php echo e(count(Session::get('Cart'))); ?> item(s) in your cart.</small>
                </div>
                <div class="box mb-4 mt-4">                  
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ($total = 0); ?>
                                <?php $__currentLoopData = Session::get('Cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <img src="<?php echo e($value['image']); ?>" class="img-square img-responsive" width="50px" height="50px" alt="">
                                            </a>
                                        </td>
                                        <td><a href="<?php echo e(url('/product/'.$value['asin'])); ?>"><small><?php echo e(strtoupper($value['title'])); ?></small></a></td>
                                        <td>
                                            <input type="number" value="<?php echo e($value['qty']); ?>" onchange="ItemDelete('<?php echo e($value['asin']); ?>', this.value)" class="form-control" style="width: 70px;">
                                        </td>
                                        <td><?php echo e($value['currencycode'].' '.$value['price']); ?></td>
                                        <?php ($total = $total + ($value['price']*$value['qty'])); ?>
                                        <td><?php echo e($value['currencycode'].' '.$value['price']*$value['qty']); ?></td>
                                        <td><a href="#" onclick="ItemDelete('<?php echo e($value['asin']); ?>', 0)"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>

                                <tr>
                                    <th class="text-right" colspan="4">Total</th>
                                    <th colspan="2"><?php echo e($value['currencycode'].' '.$total); ?></th>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
                                        <div class="box-footer">
                        <div class="col-sm-12">
                            <a class="btn btn-sm btn-primary pull-left" href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> Continue Shopping</a>&nbsp;&nbsp;
                            <button class="btn btn-sm btn-default" onclick="getCart()"><i class="fa fa-refresh"></i> Refresh Cart</button>&nbsp;

                            <a target="_blank" href="<?php echo e($cart['Cart']['PurchaseURL']); ?>" class="btn btn-sm btn-warning pull-right"><i class="fa fa-shopping-cart"></i> Proceed to checkout </a>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-md-3">
                <div class="box mb-4 mt-4" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <small class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</small>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order subtotal</td>
                                    <th><?php echo e($value['currencycode'].' '.$total); ?></th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th><?php echo e($value['currencycode'].' '.$total); ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="col-xs-12">
                <h4 class="text-center">Shopping Cart</h4>
                <div class="col-xs-12"><h5 class="cart-empty">Your cart is empty</h5></div>
                <small class="disclaimer">The price and availability of items at <?php echo e(config('app.name', 'Laravel')); ?> are subject to change. The Cart is a temporary place to store a list of your items and reflects each item's most recent price. Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay. <a href="<?php echo e(url('/')); ?>">Shopping Now !!</a></small>
            </div>   
        </div>
        <?php endif; ?>-->
    </div>
    <div class="clearfix"> </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th colspan="2">Product</th>
                <th>Quantity</th>
                <th>Unit price</th>
                <th>Discount</th>
                <th colspan="2">Total</th>
            </tr>
        </thead>
        <tbody>
            
            <?php if(isset($cart)): ?>
            <?php $__currentLoopData = $cart['Cart']['CartItems']['CartItem']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="#">
                        <img src="<?php echo e(asset('images/detailsquare.jpg')); ?>" alt="White Blouse Armani">
                    </a>
                </td>
                <td><a href="#"><?php echo e($item['ASIN']); ?></a></td>
                <td>
                    <input type="number" value="<?php echo e($item['Quantity']); ?>" class="form-control">
                </td>
                <td><?php echo e($item['Price']['FormattedPrice']); ?></td>
                <td>0.00</td>
                <td><?php echo e($item['ItemTotal']['FormattedPrice']); ?></td>
                <td><a href="#" onclick="ItemDelete();"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <?php if(isset($cart)): ?>
            <tr>
                <th class="text-right" colspan="5">Total</th>
                <th colspan="2"><?php echo e($cart['Cart']['SubTotal']['FormattedPrice']); ?></th>
            </tr>
            <?php endif; ?>
        </tfoot>
    </table>
</div>
<!-- /.table-responsive -->
<div class="box-footer">
    <div class="col-sm-12">
        <button class="btn btn-sm btn-default pull-left" onclick="CartUpdate();"><i class="fa fa-refresh"></i> Update cart</button>
        <a target='_blank' rel="button" herf="<?php echo e($cart['Cart']['PurchaseURL']); ?>" class="btn btn-sm  btn-template-main pull-right">Proceed to checkout <i class="fa fa-chevron-right"></i>
        </a>
    </div>
</div>
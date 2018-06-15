<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php if(Session::has('alert-success')): ?>
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong><?php echo session('alert-success'); ?></strong></div>
                <?php endif; ?>
                <?php if(Session::has('alert-danger')): ?>
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong><?php echo session('alert-danger'); ?></strong></div>
                <?php endif; ?>
            </div>
            <hr>
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">View All Products <a href="<?php echo e(url('/admin/addproduct')); ?>" class="pull-right btn-primary">Add New Product</a></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asin</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Is Featured</th>
                <th>Display Home</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-center"><?php echo e($product->id); ?></td>
                <td class="text-center"><?php echo e($product->asin); ?></td>
                <td class="text-left"><?php echo e($product->json->ItemAttributes->Title); ?></td>
                <td class="text-center"><img src="<?php echo e($product->json->LargeImage->URL); ?>" height="50px" alt=""></td>
                <td class="text-center"><?php echo e($product->category->category_name); ?></td>
                <td class="text-center"><?php echo e($product->subcategory->sub_category_name); ?></td>
                <td class="text-center"><?php echo e($product->is_featured); ?></td>
                <td class="text-center"><?php echo e($product->display_home); ?></td>
                <td class="text-center"><?php echo e($product->status); ?></td>
                <td class="text-center"><a href="<?php echo e(url('/admin/editproduct/'.$product->id)); ?>">Edit</a> | <a href="<?php echo e(url('/admin/deleteproduct/'.$product->id)); ?>">Delete</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Asin</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Is Featured</th>
                <th>Display Home</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
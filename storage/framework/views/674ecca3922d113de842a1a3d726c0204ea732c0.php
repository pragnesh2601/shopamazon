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
                    <div class="panel-heading">View All Sub Category <a href="<?php echo e(url('/admin/addsubcategory')); ?>" class="pull-right btn-primary">Add New SubCategory</a></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Sub ID</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Sub Category Slug</th>
                <th>Sub Category Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($subcategory->id); ?></td>
                <td><?php echo e($subcategory->category->category_name); ?></td>
                <td><?php echo e($subcategory->sub_category_name); ?></td>
                <td><?php echo e($subcategory->sub_category_slug); ?></td>
                <td><?php echo e($subcategory->sub_category_order); ?></td>
                <td><?php echo e($subcategory->status); ?></td>
                <td><a href="<?php echo e(url('/admin/editsubcategory/'. $subcategory->id)); ?>">Edit</a> | <a href="<?php echo e(url('/admin/deletesubcategory/'. $subcategory->id)); ?>">Delete</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Sub ID</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Sub Category Slug</th>
                <th>Sub Category Order</th>
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
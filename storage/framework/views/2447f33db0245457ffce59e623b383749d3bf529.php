<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 message">
                <?php if(Session::has('alert-success')): ?>
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong><?php echo session('alert-success'); ?></strong></div>
                <?php endif; ?>
                <?php if(Session::has('alert-danger')): ?>
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong><?php echo session('alert-danger'); ?></strong></div>
                <?php endif; ?>
            </div>
            <hr>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <?php if($editing): ?>
                    <div class="panel-heading">Edit Category</div>
                    <div class="panel-body">
                        <form id="EditCategory" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                            <div class="form-group<?php echo e($errors->has('category_name') ? ' has-error' : ''); ?>">
                                <label for="category_name" class="col-md-3 control-label">Category Name </label>
                                <div class="col-md-9">
                                    <input id="category_name" type="text" name="category_name" class="form-control"  value="<?php echo e($category->category_name); ?>" placeholder="Enter  Category Name">
                                     <?php if($errors->has('category_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('category_order') ? ' has-error' : ''); ?>">
                                <label for="category_order" class="col-md-3 control-label">Category Order </label>
                                <div class="col-md-9">
                                    <input id="category_order" type="number" name="category_order" class="form-control"  value="<?php echo e($category->category_order); ?>"  placeholder="Enter Category Order">
                                     <?php if($errors->has('category_order')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_order')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('category_status') ? ' has-error' : ''); ?>">
                                <label for="category_status" class="col-md-3 control-label">Category Status </label>
                                <div class="col-md-9">
                                    <select id="category_status" name="category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active" <?php if($category->status=='active'): ?> selected <?php endif; ?> >Active</option>
                                        <option value="inactive" <?php if($category->status=='inactive'): ?> selected <?php endif; ?> >Inactive</option>
                                    </select>
                                     <?php if($errors->has('category_status')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="EditCategory();">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php else: ?>
                    <div class="panel-heading">Add New Category</div>
                    <div class="panel-body">
                        <form id="AddCategory" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('category_name') ? ' has-error' : ''); ?>">
                                <label for="category_name" class="col-md-3 control-label">Category Name </label>
                                <div class="col-md-9">
                                    <input id="category_name" type="text" name="category_name" class="form-control" placeholder="Enter Category Name">
                                     <?php if($errors->has('category_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('category_order') ? ' has-error' : ''); ?>">
                                <label for="category_order" class="col-md-3 control-label">Category Order </label>
                                <div class="col-md-9">
                                    <input id="category_order" type="number" name="category_order" class="form-control"  value="" placeholder="Enter Category Order">
                                     <?php if($errors->has('category_order')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_order')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('category_status') ? ' has-error' : ''); ?>">
                                <label for="category_status" class="col-md-3 control-label">Category Status </label>
                                <div class="col-md-9">
                                    <select id="category_status" name="category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                     <?php if($errors->has('category_status')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="AddCategory();">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
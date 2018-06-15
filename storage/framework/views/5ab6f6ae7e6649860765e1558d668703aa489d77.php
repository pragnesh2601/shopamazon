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
                    <div class="panel-heading">Edit Sub Category</div>
                    <div class="panel-body">
                        <form id="EditSubCategory" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($subcategory->id); ?>">
                            <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                                <label for="category_id" class="col-md-4 control-label">Category </label>
                                <div class="col-md-8">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Your Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php if($category->id == $subcategory->category_id): ?> selected <?php endif; ?>><?php echo e($category->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('category_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('sub_category_name') ? ' has-error' : ''); ?>">
                                <label for="sub_category_name" class="col-md-4 control-label">Sub Category Name</label>

                                <div class="col-md-8">
                                    <input id="sub_category_name" type="text" class="form-control" name="sub_category_name" value="<?php echo e($subcategory->sub_category_name); ?>">
                                    <?php if($errors->has('sub_category_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('sub_category_order') ? ' has-error' : ''); ?>">
                                <label for="sub_category_order" class="col-md-4 control-label">Category Order </label>
                                <div class="col-md-8">
                                    <input id="category_order" type="number" name="sub_category_order" class="form-control"  value="<?php echo e($subcategory->sub_category_order); ?>">
                                     <?php if($errors->has('sub_category_order')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_order')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('sub_category_status') ? ' has-error' : ''); ?>">
                                <label for="category_status" class="col-md-4 control-label">Category Status </label>
                                <div class="col-md-8">
                                    <select id="sub_category_status" name="sub_category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active" <?php if($subcategory->status=='active'): ?> selected <?php endif; ?> >Active</option>
                                        <option value="inactive" <?php if($subcategory->status=='inactive'): ?> selected <?php endif; ?> >Inactive</option>
                                    </select>
                                     <?php if($errors->has('sub_category_status')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="EditSubCategory();">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php else: ?>
                    <div class="panel-heading">Add New Sub Category</div>
                    <div class="panel-body">
                        <form id="AddSubCategory" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                                <label for="category_id" class="col-md-4 control-label">Category </label>
                                <div class="col-md-8">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Your Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('category_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('sub_category_name') ? ' has-error' : ''); ?>">
                                <label for="sub_category_name" class="col-md-4 control-label">Sub Category Name</label>

                                <div class="col-md-8">
                                    <input id="sub_category_name" type="text" class="form-control" name="sub_category_name" value="">
                                    <?php if($errors->has('sub_category_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('sub_category_order') ? ' has-error' : ''); ?>">
                                <label for="sub_category_order" class="col-md-4 control-label">Sub Category Order </label>
                                <div class="col-md-8">
                                    <input id="sub_category_order" type="number" name="sub_category_order" class="form-control"  placeholder="Enter Sub Category Order">
                                     <?php if($errors->has('sub_category_order')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_order')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('sub_category_status') ? ' has-error' : ''); ?>">
                                <label for="sub_category_status" class="col-md-4 control-label">Category Status </label>
                                <div class="col-md-8">
                                    <select id="sub_category_status" name="sub_category_status" class="select form-control">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                     <?php if($errors->has('sub_category_status')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="AddSubCategory();">
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
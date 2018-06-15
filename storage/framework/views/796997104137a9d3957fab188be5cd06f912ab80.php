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
            <div class="col-md-8 col-md-offset-2" id="mainPanel">
                <div class="panel panel-primary">
                    <?php if($editing): ?>
                    <div class="panel-heading">Edit Product</div>
                    <div class="panel-body">
                        <form id="EditProduct" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                            <input type="hidden" name="json" value="<?php echo e(serialize($item)); ?>">
                            <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                                <label for="category_id" class="col-md-5 control-label">Category: </label>
                                <div class="col-md-7">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php if($product->category_id == $category->id): ?> selected <?php endif; ?>><?php echo e($category->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('category_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('sub_category_id') ? ' has-error' : ''); ?>">
                                <label for="sub_category_id" class="col-md-5 control-label">Sub Category: </label>
                                <div class="col-md-7">
                                    <select id="sub_category_id" name="sub_category_id" class="select form-control">
                                        <option value="">Select Sub Category</option>
                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subcategory->id); ?>" <?php if($product->sub_category_id == $subcategory->id): ?> selected <?php endif; ?>><?php echo e($subcategory->sub_category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('sub_category_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('asin') ? ' has-error' : ''); ?>">
                                <label for="asin" class="col-md-5 control-label">Product Asin</label>

                                <div class="col-md-7">
                                    <input id="asin" type="text" class="form-control" placeholder="Enter Product ASIN" name="asin" value="<?php echo e($product->asin); ?>">
                                    <?php if($errors->has('asin')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('asin')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('is_featured') ? ' has-error' : ''); ?>">
                                <label for="is_featured" class="col-md-5 control-label">Set Featured Product </label>
                                <div class="col-md-7">
                                    <select id="is_featured" name="is_featured" class="select form-control">
                                        <option value="">Select Featured Product</option>
                                        <option value="yes" <?php if($product->is_featured=='yes'): ?> selected <?php endif; ?> >Yes</option>
                                        <option value="no" <?php if($product->is_featured=='no'): ?> selected <?php endif; ?> >No</option>
                                    </select>
                                     <?php if($errors->has('is_featured')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('is_featured')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('display_home') ? ' has-error' : ''); ?>">
                                <label for="display_home" class="col-md-5 control-label">Product Display on Home </label>
                                <div class="col-md-7">
                                    <select id="display_home" name="display_home" class="select form-control">
                                        <option value="">Select Home Display Product</option>
                                        <option value="yes" <?php if($product->display_home == 'yes'): ?> selected <?php endif; ?> >Yes</option>
                                        <option value="no" <?php if($product->display_home == 'no'): ?> selected <?php endif; ?> >No</option>
                                    </select>
                                     <?php if($errors->has('display_home')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('display_home')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('product_status') ? ' has-error' : ''); ?>">
                                <label for="product_status" class="col-md-5 control-label">Product Status </label>
                                <div class="col-md-7">
                                    <select id="product_status" name="product_status" class="select form-control">
                                        <option value="">Select Product Status</option>
                                        <option value="active" <?php if($product->status=='active'): ?> selected <?php endif; ?> >Active</option>
                                        <option value="inactive" <?php if($product->status=='inactive'): ?> selected <?php endif; ?> >Inactive</option>
                                    </select>
                                     <?php if($errors->has('product_status')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('product_status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="EditProduct();">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php else: ?>
                    <div class="panel-heading">Add New Product</div>
                    <div class="panel-body">
                        <form id="AddProduct" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                                <label for="category_id" class="col-md-5 control-label">Category: </label>
                                <div class="col-md-7">
                                    <select id="category_id" name="category_id" class="select form-control">
                                        <option value="">Select Category</option>
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

                            <div class="form-group<?php echo e($errors->has('sub_category_id') ? ' has-error' : ''); ?>">
                                <label for="sub_category_id" class="col-md-5 control-label">Sub Category: </label>
                                <div class="col-md-7">
                                    <select id="sub_category_id" name="sub_category_id" class="select form-control">
                                        <option value="">Select Sub Category</option>
                                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->sub_category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                     <?php if($errors->has('sub_category_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('sub_category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('asin') ? ' has-error' : ''); ?>">
                                <label for="asin" class="col-md-5 control-label">Product Asin</label>

                                <div class="col-md-7">
                                    <input id="asin" type="text" class="form-control" name="asin" placeholder="Enter Product ASIN" value="">
                                    <?php if($errors->has('asin')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('asin')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('is_featured') ? ' has-error' : ''); ?>">
                                <label for="is_featured" class="col-md-5 control-label">Set Featured Product </label>
                                <div class="col-md-7">
                                    <select id="is_featured" name="is_featured" class="select form-control">
                                        <option value="">Select Featured Product</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                     <?php if($errors->has('is_featured')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('is_featured')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('display_home') ? ' has-error' : ''); ?>">
                                <label for="display_home" class="col-md-5 control-label">Product Display on Home </label>
                                <div class="col-md-7">
                                    <select id="display_home" name="display_home" class="select form-control">
                                        <option value="">Select Home Display Product</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                     <?php if($errors->has('display_home')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('display_home')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('product_status') ? ' has-error' : ''); ?>">
                                <label for="product_status" class="col-md-5 control-label">Product Status </label>
                                <div class="col-md-7">
                                    <select id="product_status" name="product_status" class="select form-control">
                                        <option value="">Select Product Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                     <?php if($errors->has('product_status')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('product_status')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" class="btn btn-primary sett" onclick="AddProduct();">
                                        Add Product
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div id="renderCode"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
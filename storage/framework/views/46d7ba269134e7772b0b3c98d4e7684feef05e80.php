<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php if(Session::has('alert-success')): ?>
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong><?php echo session('alert-success'); ?></strong></div>
                <?php endif; ?>
                <?php if(Session::has('alert-danger')): ?>
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong><?php echo session('alert-danger'); ?></strong></div>
                <?php endif; ?>
            </div>
            <br><br>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Site Settings</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/admin/settings')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('site_title') ? ' has-error' : ''); ?>">
                                <label for="site_title" class="col-md-4 control-label">Site Title</label>
                                <div class="col-md-8">
                                    <input id="site_title" type="text" class="form-control" name="site_title" value="<?php echo e(isset($settings->site_title) ? $settings->site_title : ''); ?>">
                                    <?php if($errors->has('site_title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('site_title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('site_logo') ? ' has-error' : ''); ?>">
                                <label for="site_logo" class="col-md-4 control-label">Site Logo</label>
                                <div class="col-md-8">
                                    <input id="site_logo" type="text" class="form-control" name="site_logo" value="<?php echo e(isset($settings->site_logo) ? $settings->site_logo : ''); ?>">
                                    <?php if($errors->has('site_logo')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('site_logo')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('site_meta_keywords') ? ' has-error' : ''); ?>">
                                <label for="site_meta_keywords" class="col-md-4 control-label">Site Meta Keywords</label>
                                <div class="col-md-8">
                                    <input id="site_meta_keywords" type="text" class="form-control" name="site_meta_keywords" value="<?php echo e(isset($settings->site_meta_keywords) ? $settings->site_meta_keywords : ''); ?>">
                                    <?php if($errors->has('site_meta_keywords')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('site_meta_keywords')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('site_meta_description') ? ' has-error' : ''); ?>">
                                <label for="site_meta_description" class="col-md-4 control-label">Site Meta Description</label>
                                <div class="col-md-8">
                                    <input id="site_meta_description" type="text" class="form-control" name="site_meta_description" value="<?php echo e(isset($settings->site_meta_description) ? $settings->site_meta_description : ''); ?>">
                                    <?php if($errors->has('site_meta_description')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('site_meta_description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
        
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary sett" value="1" name="settingsupdate">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
<div class="clearfix"></div>
                        <form action="<?php echo e(url('/admin/settings')); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         <?php echo e(csrf_field()); ?>

            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Logo</label>
                    <div class="col-sm-12 p0" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo e(isset($settings->site_meta_description) ? $settings->site_meta_description : ''); ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-success btn-sm">
                                    Change Logo                                    <input type="file" name="logo" size="40" class="uploadFile" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info1').html($(this).val());">
                                </a>
                            </div>
                        </div>

                        <span class="label label-info" id="upload-file-info1"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Logo Footer</label>
                    <div class="col-sm-12 p0" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo e(isset($settings->site_meta_description) ? $settings->site_meta_description : ''); ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-success btn-sm">
                                    Change Logo                                    <input type="file" name="logo_footer" size="40" class="uploadFile" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info2').html($(this).val());">
                                </a>
                            </div>
                        </div>

                        <span class="label label-info" id="upload-file-info2"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Favicon</label>
                    <div class="col-sm-12 p0">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?php echo e(isset($settings->site_meta_description) ? $settings->site_meta_description : ''); ?>" alt="" style="width: 20px; height: 20px;">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-12">
                                <a class="btn btn-success btn-sm">
                                    Change Favicon                                    <input type="file" name="favicon" size="40" class="uploadFile" accept=".png, .jpg, .jpeg, .gif" onchange="$('#upload-file-info3').html($(this).val());">
                                </a>
                            </div>
                        </div>

                        <span class="label label-info" id="upload-file-info3"></span>
                    </div>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
            <!-- /.box-footer -->
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
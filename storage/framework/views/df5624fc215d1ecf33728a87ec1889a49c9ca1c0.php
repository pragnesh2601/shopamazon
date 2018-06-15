<?php $__env->startSection('content'); ?>
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 message">
                <?php if(Session::has('alert-success')): ?>
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong><?php echo session('alert-success'); ?></strong></div>
                <?php endif; ?>
                <?php if(Session::has('alert-danger')): ?>
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong><?php echo session('alert-danger'); ?></strong></div>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Site Settings</div>
                    <div class="panel-body">
                        <form id="UpdateSettings" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('site_title') ? ' has-error' : ''); ?>">
                                <label for="site_title" class="col-md-4 control-label">Site Title</label>
                                <div class="col-md-8">
                                    <input id="site_title" type="text" class="form-control" name="site_title" value="<?php echo e(isset($setting->json->site_title) ? $setting->json->site_title : ''); ?>">
                                    <?php if($errors->has('site_title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('site_title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('site_description') ? ' has-error' : ''); ?>">
                                <label for="site_description" class="col-md-4 control-label">Site Description</label>
                                <div class="col-md-8">
                                    <input id="site_description" type="text" class="form-control" name="site_description" value="<?php echo e(isset($setting->json->site_description) ? $setting->json->site_description : ''); ?>">
                                    <?php if($errors->has('site_description')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('site_description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('site_meta_keywords') ? ' has-error' : ''); ?>">
                                <label for="site_meta_keywords" class="col-md-4 control-label">Site Meta Keywords</label>
                                <div class="col-md-8">
                                    <input id="site_meta_keywords" type="text" class="form-control" name="site_meta_keywords" value="<?php echo e(isset($setting->json->site_meta_keywords) ? $setting->json->site_meta_keywords : ''); ?>">
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
                                    <input id="site_meta_description" type="text" class="form-control" name="site_meta_description" value="<?php echo e(isset($setting->json->site_meta_description) ? $setting->json->site_meta_description : ''); ?>">
                                    <?php if($errors->has('site_meta_description')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('site_meta_description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('search_header_text') ? ' has-error' : ''); ?>">
                                <label for="search_header_text" class="col-md-4 control-label">Front Search Header Text</label>
                                <div class="col-md-8">
                                    <input id="search_header_text" type="text" class="form-control" name="search_header_text" value="<?php echo e(isset($setting->json->search_header_text) ? $setting->json->search_header_text : ''); ?>">
                                    <?php if($errors->has('search_header_text')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('search_header_text')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('copyrights') ? ' has-error' : ''); ?>">
                                <label for="copyrights" class="col-md-4 control-label">Copyrights</label>
                                <div class="col-md-8">
                                    <input id="copyrights" type="text" class="form-control" name="copyrights" value="<?php echo e(isset($setting->json->copyrights) ? $setting->json->copyrights : ''); ?>">
                                    <?php if($errors->has('copyrights')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('copyrights')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('per_page_product') ? ' has-error' : ''); ?>">
                                <label for="per_page_product" class="col-md-4 control-label">Product Per Page</label>
                                <div class="col-md-8">
                                    <input id="per_page_product" type="number" class="form-control" name="per_page_product" value="<?php echo e(isset($setting->json->per_page_product) ? $setting->json->per_page_product : ''); ?>">
                                    <?php if($errors->has('per_page_product')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('per_page_product')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="button" class="btn btn-primary sett" value="1" name="settingsupdate" onclick="updateSiteSettings()">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        <!-- </div>
        <div class="row"> -->
            <div class="col-md-8 col-md-offset-2 message1">
                <?php if(Session::has('alert-success')): ?>
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong><?php echo session('alert-success'); ?></strong></div>
                <?php endif; ?>
                <?php if(Session::has('alert-danger')): ?>
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong><?php echo session('alert-danger'); ?></strong></div>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Logo Settings</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Logo</label>
                            <div class="col-sm-12 p0" style="margin-bottom: 30px;">
                                <div class="logo-image">
                                    <?php if($setting): ?>
                                    <div class="col-sm-6">
                                        <div class="loading-image">
                                            <img src="<?php echo e(asset('images/rolling.gif')); ?>" alt="">
                                        </div>
                                        <form id="form-upload-logo" enctype="multipart/form-data">
                                            <div class="change-logo">
                                                <a href="javascript:;" class="upload-button" onclick="uploadLogo()" style="height: 100%;"><i class="fa fa-upload"></i> Upload Logo</a>
                                                <input type="file" accept="image/*" name="logo" class="logo_input" required="">
                                            </div>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-sm-6">
                                        <img class="image-logo" src="<?php echo e($setting->getLogo(50, 50)); ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Logo Footer</label>
                            <div class="col-sm-12 p0" style="margin-bottom: 30px;">
                                <div class="footer-logo-image">
                                    <?php if($setting): ?>
                                    <div class="col-sm-6">
                                        <div class="loading-image">
                                            <img src="<?php echo e(asset('images/rolling.gif')); ?>" alt="">
                                        </div>
                                        <form id="form-upload-footer-logo" enctype="multipart/form-data">
                                            <div class="change-footer-logo">
                                                <a href="javascript:;" class="upload-button" onclick="uploadFooterLogo()" style="height: 100%;"><i class="fa fa-upload"></i> Upload Footer Logo</a>
                                                <input type="file" accept="image/*" name="logo-footer" class="footer_logo_input">
                                            </div>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-sm-6">
                                        <img class="image-footer-logo" src="<?php echo e($setting->getFooterLogo(50, 50)); ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Favicon</label>
                            <div class="col-sm-12 p0" style="margin-bottom: 30px;">
                                <div class="favicon-image">
                                    <?php if($setting): ?>
                                    <div class="col-sm-6">
                                        <div class="loading-image">
                                            <img src="<?php echo e(asset('images/rolling.gif')); ?>" alt="">
                                        </div>
                                        <form id="form-upload-favicon" enctype="multipart/form-data">
                                            <div class="change-favicon">
                                                <a href="javascript:;" class="upload-button" onclick="uploadFavicon()" style="height: 100%;"><i class="fa fa-upload"></i> Upload Favicon</a>
                                                <input type="file" accept="image/*" name="favicon" class="favicon_input">
                                            </div>
                                        </form>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-sm-6">
                                        <img class="image-favicon" src="<?php echo e($setting->getFavicon(50, 50)); ?>" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    <div class="clearfix"></div>
        </div>
    <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
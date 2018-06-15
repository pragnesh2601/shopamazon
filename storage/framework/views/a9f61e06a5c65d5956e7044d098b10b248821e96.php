<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6 col-md-offset-3 my-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading my-4">
                    <h3 class="panel-title text-center"><?php echo e(__('Register')); ?></h3>
                    <sup class="text-danger pull-right">* all fields are required</sup>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="RegisterForm" method="POST" action="<?php echo e(route('register')); ?>" >
                        <?php echo csrf_field(); ?>
                        <fieldset>
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('First Name')); ?> <sup class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control<?php echo e($errors->has('first_name') ? ' is-invalid' : ''); ?>" name="first_name" value="<?php echo e(old('first_name')); ?>" required autofocus>
                                    <?php if($errors->has('first_name')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('first_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Last Name')); ?> <sup class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control<?php echo e($errors->has('last_name') ? ' is-invalid' : ''); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" required autofocus>
                                    <?php if($errors->has('last_name')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?> <sup class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?> <sup class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?> <sup class="text-danger">*</sup></label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-md btn-success btn-block">
                                        <?php echo e(__('Register')); ?>

                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-md btn-success btn-block pull-right" href="<?php echo e(url('/admin/users')); ?>">Return to users</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
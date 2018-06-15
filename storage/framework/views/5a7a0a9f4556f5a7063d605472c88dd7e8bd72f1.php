<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo e(__('Login')); ?></h3>
                    </div>
                    <div class="panel-body">
                        <form id="LoginForm" method="POST" action="<?php echo e(route('login')); ?>" role="form">
                            <?php echo csrf_field(); ?>
                            <fieldset>
                                <div class="form-group">
                                    <label>Email: <sup class="text-danger">*</sup></label>
                                    <input id="email" type="email" placeholder="Email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Password: <sup class="text-danger">*</sup></label>
                                    <input id="password" type="password" placeholder="Password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="checkbox">
                                    <label for="brand1">
                                        <input type="checkbox" id="brand1" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>Remember Me
                                    </label>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <a class="btn btn-link pull-right" style="margin-top: -7px;" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
                                </div>
                                <input class="btn btn-sm btn-success btn-block" type="submit" name="Sign In" value="Login">
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                                <h6>Not a member?<a class="btn btn-link" href="<?php echo e(route('register')); ?>"> Sign up now</a>
                                <a class="btn btn-sm btn-success" href="<?php echo e(url('/')); ?>">Return to Home</a></h6>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
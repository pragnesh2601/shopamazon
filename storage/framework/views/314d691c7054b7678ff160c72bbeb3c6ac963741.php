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
                    <div class="panel-heading">View All Users <a href="<?php echo e(url('/admin/signup')); ?>" class="pull-right btn-primary">Add New user</a></div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Picture</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Role</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><img class="img-circle" src="<?php echo e($user->getPhoto(35, 35)); ?>" alt="" /></td>
                                    <td><?php echo e($user->username); ?></td>
                                    <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->mobile); ?></td>
                                    <td><?php echo e($user->current_city); ?></td>
                                    <td><?php echo e($user->role); ?></td>
                                    <!-- <td><a href="<?php echo e(url('/admin/editcategory/'. $category->id)); ?>">Edit</a> | <a href="<?php echo e(url('/admin/deletecategory/'. $category->id)); ?>">Delete</a></td> -->
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Picture</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Role</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
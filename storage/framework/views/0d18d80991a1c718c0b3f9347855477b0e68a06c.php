        <div class="row justify-content-md-center">
            <form class="col-md-6 col-md-offset-3 my-4" method="get" action="<?php echo e(url('/search')); ?>">
            <div class="input-group">
                <span class="input-group-btn">
                <select class="form-control col-xs-4 searchindex_select" name="searchindex">
                    <?php $__currentLoopData = \App\Categories::where('status','active')->orderBy('category_order','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count(\App\Products::where('category_id','=', $category->id)->get()) > 0): ?>
                            <option value="<?php echo e($category->category_slug); ?>"><?php echo e($category->category_name); ?> (<?php echo e(count(\App\Products::where('category_id','=', $category->id)->get())); ?>)</option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </span>&nbsp;
                <input type="text" class="form-control rounded" name="searchterm" placeholder="Search">&nbsp;
                <span class="input-group-btn">
                    <button class="rounded-right btn btn-warning" type="submit">GO!</button>
                </span>
            </div>
        </form>
        </div>
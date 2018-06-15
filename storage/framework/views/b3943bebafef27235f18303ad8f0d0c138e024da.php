<style type="text/css">
      /* Define the body style */
      /*body {font-family:Arial; font-size:12px;}*/
      
      /* We remove the margin, padding, and list style of UL and LI components */
      #menuwrapper ul, #menuwrapper ul li{margin:0; padding:0; list-style:none;}
      
      /* We apply background color and border bottom white and width to 150px */
      #menuwrapper ul li{background-color:#343a40; border-bottom:solid 1px white; width:100%; cursor:pointer;}
      /* We apply the background hover color when user hover the mouse over of the li component */
      #menuwrapper ul li:hover{ background-color:#343a40; position:relative;}
      /* We apply the link style */
      #menuwrapper ul li a{padding:10px 15px; color:#ffffff; display:inline-block; text-decoration:none;}

      /**** SECOND LEVEL MENU ****/
      /* We make the position to absolute for flyout menu and hidden the ul until the user hover the parent li item */
      #menuwrapper ul li ul{position:absolute; display:none;}

      /* When user has hovered the li item, we show the ul list by applying display:block, note: 150px is the individual menu width.  */
      #menuwrapper ul li:hover ul{left:100%; top:0px; display:block; width:100%;z-index: 999;}

      /* we apply different background color to 2nd level menu items*/
      #menuwrapper ul li ul li{background-color:#343a40;}

      /* We change the background color for the level 2 submenu when hovering the menu */
      #menuwrapper ul li:hover ul li:hover{background-color:#343a40;}

      /* We style the color of level 2 links */
      #menuwrapper ul li ul li a{color:#ffffff; display:inline-block; width:100%;}

      /**** THIRD LEVEL MENU ****/
      /* We need to hide the 3rd menu, when hovering the first level menu */
      #menuwrapper ul li:hover ul li ul{position:absolute; display:none;}

      /* We show the third level menu only when they hover the second level menu parent */
      #menuwrapper ul li:hover ul li:hover ul{display:block; left:100%; top:0; width:100%;z-index: 999;}

      /* We change the background color for the level 3 submenu*/
      #menuwrapper ul li:hover ul li:hover ul li{background:#343a40;}
      /* We change the background color for the level 3 submenu when hovering the menu */
      #menuwrapper ul li:hover ul li:hover ul li:hover{background:#343a40;}

      /* We change the level 3 link color */
      #menuwrapper ul li:hover ul li:hover ul li a{color:#ffffff;}

      /* Clear float */
      .clear{clear:both;}
</style>
<div id="menuwrapper">
    <ul>
      <?php $__currentLoopData = \App\Categories::where('status','=','active')->orderBy('category_name','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(count(\App\Products::where('category_id','=', $category->id)->get()) > 0): ?>
              <li><a href="<?php echo e(url('/category/'. $category->category_slug)); ?>">
                        <?php echo e($category->category_name); ?> <small class="badge badge-info pull-right ml-3 mt-0 p-1"><?php echo e(count(\App\Products::where('category_id','=', $category->id)->get())); ?></small>
                  </a>
                  <ul>
                  <?php $__currentLoopData = $category->subCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(url('/category/'. $category->category_slug.'/sub/'. $subcategory->sub_category_slug)); ?>">
                        <?php echo e($subcategory->sub_category_name); ?> <small class="badge badge-info pull-right ml-3 mt-0 p-1"><?php echo e(count(\App\Products::where('sub_category_id','=', $subcategory->id)->get())); ?></small>
                  </a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </li>
            <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-faded flex-column">
      <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#CategorynavbarResponsive" aria-controls="CategorynavbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="CategorynavbarResponsive">
                  <ul class="navbar-nav nav flex-column">
                        <?php $__currentLoopData = \App\Categories::where('status','=','active')->orderBy('category_name','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if(count(\App\Products::where('category_id','=', $category->id)->get()) > 0): ?>
                              <li class="nav-item">
                                    <a href="<?php echo e(url('/category/'. $category->category_slug)); ?>" class="nav-link">
                                          <?php echo e($category->category_name); ?> <small class="badge badge-info pull-right ml-3 mt-0 p-1"><?php echo e(count(\App\Products::where('category_id','=', $category->id)->get())); ?></small>
                                    </a>
                              </li>
                              <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
            </div>
      </div>
</nav> -->
<div class="blog-sidebar">

    <div class="blog__recent">
        <h4 class="title-sidebar">
            Recent Post
        </h4>

        <?php $__currentLoopData = $blogsall['blogrecent']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="blog__recent-item clearfix">
            <div class="img pull-left">
                <a href="<?php echo e(url('inspirations/'.$data2->id)); ?>">
                    <img alt="<?php echo e($data2->title); ?>" src="<?php echo e(url('uploads/blog/'.$data2->blogpic)); ?>">
                </a>
            </div>
            <div class="text">
                <h6>
                    <a href="<?php echo e(url('inspirations/'.$data2->id)); ?>">
                        <?php echo e($data2->title); ?>

                    </a>
                </h6>
                <p>
                    <em><?php echo e(date("F j, Y", strtotime($data2->created_at))); ?>

                    </em>
                </p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <ul class="blog__cate ul--no-style">
        <h4 class="title-sidebar">
            category
        </h4>


        <?php $__currentLoopData = $blogsall['blogcategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(url('inspirations/cat-'.$data->id)); ?>"><?php echo e($data->blog_cat_title); ?><span>
                    <em>(<?php echo e($data->categories->count()); ?> posts)</em>
                </span></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </ul>

</div>
<?php /**PATH C:\xampp\htdocs\furniture\resources\views/layouts/inc/blogsidebar.blade.php ENDPATH**/ ?>
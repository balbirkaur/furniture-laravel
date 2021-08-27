<section class="latest-project">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <?php echo $data['homesettings'][0]->project_text; ?>


            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <?php $__currentLoopData = $data['projects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$projectdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(($key=="0") || ($key%2=="0")): ?>
        <div class="col-lg-3 col-md-6">
            <?php endif; ?>
            <div class="latest__item   <?php if(($key==" 6")): ?> lastproject <?php endif; ?>">
                <img alt="<?php echo e($projectdata['title']); ?>" src="<?php echo e(url('uploads/project/'.$projectdata->projectpic)); ?>" />
                <a href="<?php echo e(url('uploads/project/'.$projectdata->projectpic)); ?>" data-lightbox="Lastest Project"
                    class="overlay overlay--invisible overlay--p-15">
                    <div class="overlay--border"></div>
                </a>
                <div class="latest__item--content">
                    <div class="latest__item--inner">
                        <h3><?php echo e($projectdata->title); ?></h3>
                        <div class="cat-name">
                            <a href="">
                                <em><?php echo e($projectdata->category->project_name); ?></em>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(($key=="1") || ($key%2!="0")): ?>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <div class="col-md-12 see-more project-home">
        <a href="<?php echo e(url('projects')); ?>" class="au-btn au-btn--big au-btn--pill au-btn--yellow au-btn--white">See
            More</a>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\furniture\resources\views/layouts/inc/home/homeproject.blade.php ENDPATH**/ ?>
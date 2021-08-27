<section class="service">
    <div class="service-wrap">
        <div class="service__item service__intro" style="background-image: url('img/service-01.jpg')">
            <div class="service__item-inner">

                <?php echo $data['homesettings'][0]->aboutus_text; ?>

                <div>
                    <a href="<?php echo e(url('/aboutus')); ?>"
                        class="au-btn au-btn--big au-btn--pill au-btn--white au-btn--border au-btn--big">See
                        more</a>
                </div>
            </div>
        </div>
        <!-- end service intro -->
        <?php $__currentLoopData = $data['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$servicedata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="service__item"
            style="background-image: url(<?php echo e(url('uploads/service/'.$servicedata->servicepic)); ?> )">
            <div class="service__item-inner">
                <span class="label--service white"><a
                        href="<?php echo e(url('services/'.$servicedata->id)); ?>"><?php echo e($servicedata->title); ?></a></span>
            </div>
        </div>
        <!-- end service item -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\furniture\resources\views/layouts/inc/home/homeservices.blade.php ENDPATH**/ ?>
<section class="our-process">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <?php echo $data['homesettings'][0]->process_text; ?>


            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $data['process']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$processdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 col-12">
                <div <?php if(($key=="0" ) || ($key=="2" )): ?>class="our-process__item our-process__item--l-b" <?php elseif($key=="1"
                    ): ?>class="our-process__item our-process__item--l-b" <?php else: ?> class="our-process__item" <?php endif; ?>>
                    <h3>
                        <i <?php if($key=="0" ): ?>class="zmdi zmdi-accounts-alt" <?php elseif($key=="1" ): ?>class="zmdi zmdi-library"
                            <?php elseif($key=="2" ): ?>class="zmdi zmdi-puzzle-piece" <?php else: ?> class="zmdi zmdi-city-alt"
                            <?php endif; ?>></i>
                        <?php echo e($processdata->title); ?>

                    </h3>
                    <p>
                        <?php echo e($processdata->description); ?>

                    </p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\furniture\resources\views/layouts/inc/home/homeprocess.blade.php ENDPATH**/ ?>
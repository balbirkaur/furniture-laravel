<?php $__env->startSection('title'); ?>
Furniture Services
<?php $__env->stopSection(); ?>
<?php $__env->startSection('frontcss'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/owl-carousel/animate.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/owl-carousel/owl.carousel.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/owl-carousel/owl.theme.default.min.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/revolution/settings.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/revolution/navigation.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/revolution/layers.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/lightbox2/src/css/lightbox.css')); ?>" />
<style>
    .parallax--nav {}
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<!-- Navigation -->
<section class="navigation">
    <div class="parallax parallax--nav"
        style=" background-image: url(<?php echo e(asset('uploads/banner/'.$aboutall['bannerlist']->bannerpic)); ?>);">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        <?php echo e($aboutall['bannerlist']->title); ?>

                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            <?php echo e($aboutall['bannerlist']->title); ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->



<!-- We Are -->
<section class="we-are">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-5 col-md-12 col-12">
                <div class="we-are__left">

                    <?php echo $aboutall['aboutus']->sub_description; ?>

                    <div class="top">
                        <div class="we-are__item">
                            <img alt="We Are 1" src="img/we-are-01.jpg">
                        </div>
                        <div class="we-are__item">
                            <img alt="We Are 2" src="img/we-are-02.jpg">
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="we-are__item">
                            <img alt="We Are 3" src="img/we-are-03.jpg">
                        </div>
                        <div class="we-are__item">
                            <img alt="We Are 4" src="img/we-are-06.jpg">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-12">
                <div class="we-are__right">
                    <h2><?php echo e($aboutall['aboutus']->title); ?></h2>
                    <h2 class="title--small"><?php echo e($aboutall['aboutus']->subtitle); ?></h2>
                    <?php echo $aboutall['aboutus']->description; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End we are -->

<?php if($aboutall['teamlist']->count()>0): ?>
<!-- Our Team 2 -->
<section class="our-team2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title title-3">
                    our team
                </h2>
            </div>
        </div>
        <div class="owl-carousel owl-theme" id="owl-our-team-2">
            <?php $__currentLoopData = $aboutall['teamlist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teamdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="our-team2__item item">
                <div class="our-team2__img">
                    <img alt="Our Team 1" src="<?php echo e(asset('uploads/team/'.$teamdata->teampic)); ?>" class="img-responsive">
                    <div class="our-team2__link">
                        <div class="pro-info our-team2__info">
                            <div class="our-team2__contact">
                                <a href="<?php echo e($teamdata['facebook_link']); ?>" target="_blank" class="social__item">
                                    <i class="zmdi zmdi-facebook"></i>
                                </a>
                                <a href="<?php echo e($teamdata['instagram_link']); ?>" target="_blank" class="social__item">
                                    <i class="zmdi zmdi-instagram"></i>
                                </a>
                                <a href="<?php echo e($teamdata['google_link']); ?>" target="_blank" class="social__item">
                                    <i class="zmdi zmdi-google"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="our-team2__detail">
                    <h4>
                        <?php echo e($teamdata['title']); ?>

                    </h4>
                    <p>
                        <em><?php echo e($teamdata['position']); ?></em>
                    </p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- End Our Team 2 -->
<?php endif; ?>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('frontjs'); ?>
<!-- =================== PLUGIN JS ==================== -->

<script src="<?php echo e(asset('vendor/isotope/isotope.pkgd.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('vendor/owl-carousel/owl.carousel.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('frontmainjs'); ?>
<!-- =================== CUSTOM JS ==================== -->
<script type="text/javascript" src="<?php echo e(asset('js/isotope-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/frontend/aboutus.blade.php ENDPATH**/ ?>
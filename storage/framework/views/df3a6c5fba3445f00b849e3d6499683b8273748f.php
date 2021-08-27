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
        style=" background-image: url(<?php echo e(asset('uploads/banner/'.$servicesall['bannerlist']->bannerpic)); ?>);">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        <?php echo e($servicesall['bannerlist']->title); ?>

                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            <?php echo e($servicesall['bannerlist']->title); ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->
<!-- Project 4 -->
<section class="project4">
    <div class="container-fluid">
        <div class="project--zoom clearfix">
            NewVo INTERIORS Interior Design Services: Pallet and Concept formation &ndash; Budgeting &ndash; Window
            Treatments &ndash; Furniture Selection &ndash; Lighting &ndash; Art &ndash; Carpeting &ndash; Wall
            Treatment. NewVo INTERIORS OFFERS LEASING PROGRAMS for both new and used furnishings via third party leasing
            companies. We also work with our customers selected leasing companies. <br /><br />NewVo INTERIORS NEW
            FURNITURE SOLUTIONS We achieve customer satisfaction for our clients by offering new selections from an
            enviable list of carefully selected manufacturers. These manufacturers offer high quality with style and
            superior workmanship backed by superior product guarantees. Many of our suppliers offer Quick Ship options.
            NewVo INTERIORS will guarantee for all new furniture buyers that we will include, in your purchase program,
            a liquidation solution for your existing furniture so that you won&rsquo;t need to worry about the
            liquidation yourself. <br /><br />NewVo INTERIORS USED FURNITURE SOLUTIONS are offered to you under both
            NewVo Interiors as part of your project or through. We offer a wide variety of used solutions for its
            customers by offering selections from its own inventory, customer product being liquidated or sold on
            consignment, and from the inventories of a network of other reputable dealers who offer grade a product Jack
            The Liquidator offering a true value to our customers. <br /><br />NewVo INTERIORS Buy Back program We
            understand that many of our customers will be growing or reconfiguring their offices more frequently than
            they have in the past. These customers prefer to do business with a dealer who will commit to working with
            them at a time when they would like either to trade up, to newer furnishings, or to liquidate their
            furnishings. Therefore, we offer a unique custom-tailored buy-back program that is based on the needs of the
            individual customer. NewVo Interiors will work out the details of this program, at the time of the initial
            purchase, upon request. Companies that value strong business relationships value their relationship with
            NewVo INTERIORS.


            <?php $__currentLoopData = $servicesall['allservices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicedata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-12 item <?php echo e($servicedata->category->service_slug); ?>">
                <div class="project__item">
                    <div class="pro__img">
                        <a href="<?php echo e(url("services",$servicedata['id'])); ?>">
                            <img alt="Project 1" src="<?php echo e(url("uploads/service/",$servicedata['servicepic'])); ?>">
                        </a>
                    </div>
                    <div class="pro__text">
                        <h4 class="company">
                            <?php echo e($servicedata['title']); ?>

                        </h4>
                        <p class="cat-name">
                            <em>
                                <?php echo e($servicedata->category->service_name); ?>

                            </em>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>
<!-- End Project 4 -->

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

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/frontend/services.blade.php ENDPATH**/ ?>
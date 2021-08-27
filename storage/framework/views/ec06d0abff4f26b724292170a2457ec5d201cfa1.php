<?php $__env->startSection('title'); ?>
Furniture Projects
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
        style=" background-image: url(<?php echo e(asset('uploads/banner/'.$projectsall['bannerlist']->bannerpic)); ?>);">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        <?php echo e($projectsall['bannerlist']->title); ?>

                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            <?php echo e($projectsall['bannerlist']->title); ?>

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
        <div class="row">
            <div class="col-md-12">
                <div id="filter-wrap">
                    <ul id="filter" class="ul--no-style ul--inline">
                        <li class="active">
                            <span data-filter="*">All</span>
                        </li>
                        <?php $__currentLoopData = $projectsall['projectcategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <span data-filter=".<?php echo e($data->project_slug); ?>"><?php echo e($data->project_name); ?></span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="isotope-grid" class="project--zoom clearfix">
            <?php $__currentLoopData = $projectsall['allprojects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-12 item <?php echo e($projectdata->category->project_slug); ?>">
                <div class="project__item">
                    <div class="pro__img">
                        <a href="<?php echo e(url("projects",$projectdata['id'])); ?>">
                            <img alt="Project 1" src="<?php echo e(url("uploads/project/",$projectdata['projectpic'])); ?>">
                        </a>
                    </div>
                    <div class="pro__text">
                        <h4 class="company">
                            <?php echo e($projectdata['title']); ?>

                        </h4>
                        <p class="cat-name">
                            <em>
                                <?php echo e($projectdata->category->project_name); ?>

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

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/frontend/projects.blade.php ENDPATH**/ ?>
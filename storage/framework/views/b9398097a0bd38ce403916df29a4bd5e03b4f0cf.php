<?php $__env->startSection('title'); ?>
Furniture Blogs
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
        style=" background-image: url(<?php echo e(asset('uploads/banner/'.$blogsall['bannerlist']->bannerpic)); ?>);">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        <?php echo e($blogsall['bannerlist']->title); ?>

                    </h2>
                    <ul class="breadcrumbs ul--inline ul--no-style">
                        <li>
                            <a href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <span>/</span>
                        <li class="active">
                            <?php echo e($blogsall['bannerlist']->title); ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Navigation -->

<!-- Blog List -->
<section class="blog-list-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="blog-list">
                    <?php $__currentLoopData = $blogsall['allblogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$blogdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="blog-item">
                        <div class="img-blog">
                            <a href="<?php echo e(url('/inspirations/'.$blogdata->id)); ?>">
                                <img alt="Blog 1" src="<?php echo e(url("uploads/blog/",$blogdata['blogpic'])); ?>">
                                <div class="date date--big">
                                    <div class="date__inner">
                                        <span class="day"><?php echo e(date("d", strtotime($blogdata['created_at']))); ?></span>
                                        <span class="month"><?php echo e(date("M", strtotime($blogdata['created_at']))); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">

                                <a href="<?php echo e(url('/inspirations/'.$blogdata->id)); ?>"><?php echo e($blogdata['title']); ?></a>
                            </h4>
                            <!-- <p class="author">
                                <em>By AThony Lee</em>
                            </p>-->
                            <p>
                                <?php echo $blogdata['excerpt']; ?> ....
                            </p>
                        </div>
                        <div class="see-more see-more--left">
                            <a href="<?php echo e(url('/inspirations/'.$blogdata->id)); ?>"
                                class="au-btn au-btn--big au-btn--pill au-btn--yellow au-btn--white">See More</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- end blog item -->

                </div>
                <!-- End blog list -->
            </div>
            <div class="col-lg-4 col-md-5">
                <?php echo $__env->make('layouts.inc.blogsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>
<!-- End Blog List -->

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

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/frontend/blogs.blade.php ENDPATH**/ ?>
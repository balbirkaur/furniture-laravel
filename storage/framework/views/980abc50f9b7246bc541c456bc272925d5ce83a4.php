<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $__env->yieldContent('title'); ?></title>
    <!-- ================== Font =================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('font/font-awesome/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('font/mdi-font/css/material-design-iconic-font.min.css')); ?>" />
    <!-- ================== Vendor CSS =================== -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/bootstrap4/bootstrap.min.css')); ?>" />
    <?php echo $__env->yieldContent('frontcss'); ?>
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/font.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>" />
</head>

<body class="box">
    <!-- Page Loader -->
    <!--   <div id="page-loader">
        <div class="page-loader__inner">
            <div class="page-loader__spin"></div>
        </div>
    </div>-->
    <!-- End Page Loader -->


    <body>

        <!-- End Page Loader -->
        <!-- Page Wrap -->
        <div class="page-wrap">
            <?php echo $__env->make('layouts.inc.headerstick', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.inc.desktopnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.inc.menucanvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.inc.mobilenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>
            <!-- Footer -->
            <footer class="footer-3">
                <div class="section-content section-content--w1140">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <h2 class="logo-footer">
                                    <a href="<?php echo e(url('/')); ?>">
                                        <img alt="Logo" src="<?php echo e(url('img/logo-white.png')); ?>" />
                                    </a>
                                </h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur moon el adipiscing
                                    elit, sed do eiusmod tempor incididunt ut labore et doloe
                                    magna aliqua.
                                </p>
                                <h5 class="title-footer">FOLLOW US</h5>
                                <div class="social-footer">
                                    <a href="">
                                        <i class="zmdi zmdi-facebook"></i>
                                    </a>
                                    <a href="">
                                        <i class="zmdi zmdi-twitter"></i>
                                    </a>
                                    <a href="">
                                        <i class="zmdi zmdi-pinterest-box"></i>
                                    </a>
                                    <a href="">
                                        <i class="zmdi zmdi-dribbble"></i>
                                    </a>
                                    <a href="">
                                        <i class="zmdi zmdi-google"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <h5 class="title-footer m-b-26">contact info</h5>
                                <p class="con__item">
                                    AD : AD : 60 Rogers Street Manchester, NH 0310
                                </p>
                                <p class="con__item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    603-689-4557
                                </p>
                                <p class="con__item">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    Info@newvocustom.com
                                </p>
                                <p class="con__item">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    Monday- Friday : 8am - 6pm
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <h5 class="title-footer m-b-30">from gallery</h5>
                                <div class="gallery clearfix">
                                    <div class="gallery__item">
                                        <img alt="Gallery 1" src="img/gallery-01.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 2" src="img/gallery-02.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 3" src="img/gallery-03.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 4" src="img/gallery-04.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 5" src="img/gallery-05.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                    <div class="gallery__item">
                                        <img alt="Gallery 6" src="img/gallery-06.jpg" />
                                        <a href="" class="pro-link">
                                            <div class="overlay overlay--invisible overlay--yellow"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Copyright -->
                        <div class="copyright-2">
                            <div>
                                Copyright &copy; 2020
                                <span>Newvo Custome</span>. All rights reserved.
                            </div>
                        </div>
                        <!-- End Copyright -->
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

            <!-- Back to top -->
            <a href="" id="btn-to-top">
                <i class="fa fa-chevron-up"></i>
            </a>
            <!-- End Back to top -->
        </div>
        <!-- End Page Wrap -->
        <!-- =================== PLUGIN JS ==================== -->
        <script src="<?php echo e(asset('vendor/jquery-3.5.1.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('vendor/bootstrap4/popper.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(asset('vendor/bootstrap4/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <?php echo $__env->yieldContent('frontjs'); ?>
        <!-- =================== CUSTOM JS ==================== -->
        <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>
        <?php echo $__env->yieldContent('frontmainjs'); ?>
    </body>

</html>
<?php /**PATH C:\xampp\htdocs\furniture\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>
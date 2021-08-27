<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(url('assets/img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(url('assets/img/favicon.png')); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(url('assets/css/now-ui-dashboard.css?v=1.5.0')); ?>" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo e(url('assets/demo/demo.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(url('assets/css/jquery.dataTables.min.css')); ?>" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
            <div class="logo">
                <a href="<?php echo e(url('dashboard')); ?>" class="simple-text logo-mini">
                    <img alt="Logo" src="<?php echo e(url('img/admin-logo.png')); ?>" />
                </a>
                <a href="<?php echo e(url('dashboard')); ?>" class="simple-text logo-normal">
                    Newvo Customs
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php echo e('dashboard' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('dashboard')); ?>">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="<?php echo e('homesettings' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('homesettings')); ?>">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Home Settings</p>
                        </a>
                    </li>
                    <li class="<?php echo e('contactsettings' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('contactsettings')); ?>">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Contact Settings</p>
                        </a>
                    </li>
                    <li class="<?php echo e('contactlist' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('contactlist')); ?>">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Contact List</p>
                        </a>
                    </li>
                    <li class="<?php echo e('product-category' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('product-category')); ?>">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Product Category</p>
                        </a>
                    </li>
                    <li class="<?php echo e('product-list' == request()->path() ? 'active' : ''); ?>">
                        <a href=" <?php echo e(url('product-list')); ?>">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="<?php echo e('slider' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('slider')); ?>">
                            <i class="now-ui-icons design_image"></i>
                            <p>Home Slider</p>
                        </a>
                    </li>
                    <li class="<?php echo e('abouts' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('abouts')); ?>">
                            <i class="now-ui-icons education_atom"></i>
                            <p>About Us</p>
                        </a>
                    </li>
                    <li class="<?php echo e('teammember-list' == request()->path() ? 'active' : ''); ?>">
                        <a href=" <?php echo e(url('teammember-list')); ?>">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Team</p>
                        </a>
                    </li>
                    <li class="<?php echo e('service-category' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('service-category')); ?>">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>Service Category</p>
                        </a>
                    </li>
                    <li class="<?php echo e('service-list' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('service-list')); ?>">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Services</p>
                        </a>
                    </li>
                    <li class="<?php echo e('role-register' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('role-register')); ?>">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li class="<?php echo e('project-category' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('project-category')); ?>">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Project Category</p>
                        </a>
                    </li>
                    <li class="<?php echo e('project-list' == request()->path() ? 'active' : ''); ?>">
                        <a href=" <?php echo e(url('project-list')); ?>">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Projects</p>
                        </a>
                    </li>
                    <li class="<?php echo e('blog-category' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('blog-category')); ?>">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Blog Category</p>
                        </a>
                    </li>
                    <li class="<?php echo e('blog-list' == request()->path() ? 'active' : ''); ?>">
                        <a href=" <?php echo e(url('blog-list')); ?>">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                    <li class="<?php echo e('process-list' == request()->path() ? 'active' : ''); ?>">
                        <a href=" <?php echo e(url('process-list')); ?>">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Process</p>
                        </a>
                    </li>
                    <li class="<?php echo e('banner-list' == request()->path() ? 'active' : ''); ?>">
                        <a href=" <?php echo e(url('banner-list')); ?>">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Banners</p>
                        </a>
                    </li>
                    <li class="<?php echo e('settings' == request()->path() ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('settings')); ?>">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Admin List</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->yieldContent('popup'); ?>

        </div>


    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo e(url('assets/js/core/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/core/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/plugins/perfect-scrollbar.jquery.min.js')); ?>"></script>

    <!-- Chart JS -->
    <script src="<?php echo e(url('assets/js/plugins/chartjs.min.js')); ?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo e(url('assets/js/plugins/bootstrap-notify.js')); ?>"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo e(url('assets/js/now-ui-dashboard.min.js?v=1.5.0')); ?>" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo e(url('assets/demo/demo.js')); ?>"></script>

    <script src="<?php echo e(url('assets/js/sweetalert.min.js')); ?>"></script>
    <script>
        <?php if(session('status')): ?>
            swal({
        title: "<?php echo e(session('status')); ?>",
        // text: "You clicked the button!",
        icon: "<?php echo e(session('statuscode')); ?>",
        button: "OK",
        });

      <?php endif; ?>
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\furniture\resources\views/layouts/master.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
Furniture User Edit
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit About Us</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="<?php echo e(url('/aboutus-update/'.$aboutus->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo e($aboutus->title); ?>">
                            </div>
                            <div class="form-group">
                                <label>Sub Title</label>
                                <input type="text" name="subtitle" class="form-control" value="<?php echo e($aboutus->subtitle); ?>">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control description" id="description"
                                    rows="3"><?php echo e($aboutus->description); ?></textarea>
                                <script src="<?php echo e(asset('node_module/tinymce/tinymce.js')); ?>"></script>
                                <script>
                                    tinymce.init({
                                        forced_root_block : false,
                                        selector:'textarea.description',
                                        width: 900,
                                        height: 300,
                                        plugins: 'code',
                                        toolbar: 'undo redo | styleselect | bold italic | link image | code',
                                        menubar: 'tools'
                                    });
                                </script>

                            </div>
                            <div class="form-group">
                                <label>Sub Description</label>
                                <textarea name="sub_description" class="form-control sub_description"
                                    id="sub_description" rows="3"><?php echo e($aboutus->sub_description); ?></textarea>

                                <script>
                                    tinymce.init({
                                        forced_root_block : false,
                                        selector:'textarea.sub_description',
                                        width: 900,
                                        height: 300,
                                        plugins: 'link image code',
                                        toolbar: 'undo redo | styleselect | bold italic | link image | code',
                                        menubar: 'tools',
                                        /* without images_upload_url set, Upload tab won't show up*/
                                        images_upload_url: 'postAcceptor.php',
                                        /* we override default upload handler to simulate successful upload*/
                                        images_upload_handler: function (blobInfo, success, failure) {
                                        setTimeout(function () {
                                            /* no matter what you upload, we will turn it into TinyMCE logo :)*/
                                            success('http://moxiecode.cachefly.net/tinymce/v9/images/logo.png');
                                        }, 2000);
                                        },
                                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                                                                            });
                                </script>

                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update About</button>
                            <a href="<?php echo e(url('abouts')); ?>" class="btn btn-danger mb-2">Cancel</a>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/admin/abouts/edit.blade.php ENDPATH**/ ?>
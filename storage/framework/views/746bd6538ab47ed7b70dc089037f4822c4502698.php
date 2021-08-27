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
                        <form method="POST" action="<?php echo e(url('/product-category-update/'.$products->id)); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="product_name" class="form-control"
                                    value="<?php echo e($products->product_name); ?>">
                            </div>

                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="product_description" class="form-control" id="product_description"
                                    rows="3"><?php echo e($products->product_description); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Product</button>
                            <a href="<?php echo e(url('product-category')); ?>" class="btn btn-danger mb-2">Cancel</a>
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
<!-- Now Ui Dashboard DEMO methods, don't include it in your product! -->
<script src="<?php echo e(url('assets/demo/demo.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>
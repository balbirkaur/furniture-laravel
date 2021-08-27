<?php $__env->startSection('title'); ?>
Furniture Product Edit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit Product</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="<?php echo e(url('/product-update/'.$products['allproducts']->id)); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="product_title" class="form-control"
                                    value="<?php echo e($products['allproducts']->title); ?>">
                                <input type="hidden" id="product_id" name="product_id" class="form-control"
                                    value="<?php echo e($products['allproducts']->id); ?>">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_category" class="col-form-label">Category:</label>
                                    <select name="prod_cate_id" class="form-control" id="prod_cate_id">
                                        <?php $__currentLoopData = $products['allcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$pcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($pcat['id']==$products['allproducts']->prod_cate_id): ?>
                                            <?php echo e("selected=selected"); ?> <?php else: ?> <?php endif; ?>
                                            value="<?php echo e($pcat['id']); ?>"><?php echo e($pcat['product_name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Image</label>
                                    <input type="file" name="productpic" class="form-control">
                                    <?php if($products['allproducts']->productpic): ?>
                                    <img src="<?php echo e(asset('uploads/product/'.$products['allproducts']->productpic)); ?>">
                                    <?php else: ?>
                                    No Image
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Click to upload Additional Images</label>
                                    <div class="alert alert-warning" style="display:none">
                                        <p></p>
                                    </div>

                                    <input type="file" name="productpics[]" class="form-control" multiple
                                        id="productpics" placeholder="Post Image" style="position:relative;">

                                    <div> <a class="btn btn-success" id="uploadFile" name='submitImage' />Upload
                                        Additional Images</a></div>
                                    <br />

                                    <div class="row">
                                        <?php $__currentLoopData = $products['allimages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4"><img
                                                src="<?php echo e(asset('uploads/product/'.$value->productpic)); ?>" height="150"
                                                width="150"></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div class="form-inline">
                                    <label for="featured" class="col-form-label">Featured:</label>&nbsp;&nbsp;
                                    Yes &nbsp;<input name="featured" type="radio" class="form-control" value="Yes"
                                        <?php if($products['allproducts']->featured=="Yes"): ?>
                                    <?php echo e("checked=checked"); ?> <?php else: ?> <?php endif; ?>>&nbsp;&nbsp;
                                    No &nbsp;<input name="featured" type="radio" class="form-control" value="No"
                                        <?php if($products['allproducts']->featured=="No"): ?>
                                    <?php echo e("checked=checked"); ?> <?php else: ?> <?php endif; ?>>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_date" class="col-form-label">Date:</label>
                                    <input name="product_date" value="<?php echo e($products['allproducts']->product_date); ?>"
                                        type="date" class="form-control" id="product_date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="product_description" class="form-control" id="product_description"
                                        rows="3"><?php echo e($products['allproducts']->description); ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update Product</button>
                            <a href="<?php echo e(url('product-list')); ?>" class="btn btn-danger mb-2">Cancel</a>
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

<script type="text/javascript">
    $( document ).ready(function() {
    $("#uploadFile").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                }
            });
            let image_upload = new FormData;
            let TotalImages = $('#productpics')[0].files.length; //Total Images
            let images = $('#productpics')[0];
          //  for (let i = 0; i < TotalImages; i++) {
         //       image_upload.append('images' + i, images.files[i]);
         //   }
            $.each($('#productpics')[0].files, function(i, file) {
                image_upload.append('images' + i, file);
            });

            image_upload.append('TotalImages', TotalImages);
            image_upload.append('product_id', $('#product_id').val());

            $.ajax({
                url: "<?php echo e(url("product-images-store")); ?>/"+$('#product_id').val(),
                type: 'POST',
                contentType: false,
                processData: false,
                data: image_upload,
                success: function(result) {
                    $("div.alert").show();
                    $("div.alert p").text(result.message);
                    $('#productpics').val("");
                    setTimeout(function() {
                        $("div.alert").hide();
                    }, 9000); // 9 secs
                }
            });


    });

});
</script>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/admin/product-list/edit.blade.php ENDPATH**/ ?>
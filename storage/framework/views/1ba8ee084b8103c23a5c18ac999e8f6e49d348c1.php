<?php $__env->startSection('title'); ?>
Product Furniture Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Product List
                    <a href="<?php echo e(url('product-create')); ?>" class="float-right btn btn-primary">Add</a>
                </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="datatable">
                        <thead class=" text-primary">
                            <th>
                                Id
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Featured
                            </th>
                            <th class="text-right">
                                Edit
                            </th>
                            <th class="text-right">
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $productlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <input type="hidden" class="serdelete_val" value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->id); ?>

                                </td>
                                <td>
                                    <?php echo e($data->title); ?>

                                </td>
                                <td>
                                    <?php if($data->productpic): ?>
                                    <img src="<?php echo e(asset('uploads/product/'.$data->productpic)); ?>" height="50" width="150">
                                    <?php else: ?>
                                    No Image
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($data->category->product_name); ?>

                                </td>
                                <td>
                                    <?php echo e($data->featured); ?>

                                </td>
                                <td class="text-right">
                                    <a href="<?php echo e(url('/product-edit/'.$data->id)); ?>" class="btn btn-success">Edit</a>
                                </td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-primary deletebtn">Delete</button>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url('assets/js/jquery.dataTables.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();

        $('#datatable').on('click','.deletebtn',function(e){
            e.preventDefault();
            var delete_id = $(this).closest('tr').find('.serdelete_val').val();

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                    "id":delete_id
                        };
                            $.ajax({
                                type:"DELETE",
                                url: "<?php echo e(url("product-prod-delete")); ?>/"+delete_id,
                                data:data,
                                success:function(response){
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                        })
                                        .then((willDelete) => {
                                            location.reload();
                                        });
                                }
                            });

                    }
                });
            });
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\furniture\resources\views/admin/product-list/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('admin_content'); ?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add product catalog
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="<?php echo e(route('category.product.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control"  name="name" id="exampleInputEmail1" placeholder="Name product catalog">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Descripsion</label>
                            <textarea type="text" style="resize: none" rows="5" class="form-control" name="descripsion" id="exampleInputPassword1" placeholder="Descripsion product catalog"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">hide</option>
                                <option value="1">shows</option>
                            </select>
                        </div>
                        <button type="submit" name="add_category_product" class="btn btn-info">Create</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CosmeticShop\resources\views/admin/category/create.blade.php ENDPATH**/ ?>

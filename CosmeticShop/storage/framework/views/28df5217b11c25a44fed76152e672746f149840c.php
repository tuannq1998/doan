<?php $__env->startSection('admin_content'); ?>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List the product catalog
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Name</th>
                        <th>Descripsion</th>
                        <th>Status</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($categories)): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->descripsion); ?></td>
                                <td>
                                    <?php if($category->c_status == \App\Models\Category_Product::STATUS_SHOWS): ?>
                                        <a href="<?php echo e(route('category.product.status',$category->id )); ?>" class="label <?php echo e($category->getStatus($category->status)['class']); ?>"><?php echo e($category->getStatus($category->status)['name']); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('category.product.status',$category->id )); ?>" class="label <?php echo e($category->getStatus($category->status)['class']); ?>"><?php echo e($category->getStatus($category->status)['name']); ?></a>
                                    <?php endif; ?>
                                </td>
                                <td class="align-middle">
                                    <a href="<?php echo e(route('category.product.edit', $category->id)); ?>" class="btn btn-sm btn-outline-info" ui-toggle-class="">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <a href="<?php echo e(route('category.product.destroy', $category->id)); ?>"
                                                            class="text-danger"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CosmeticShop\resources\views/admin/category/list.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <button class="btn btn-danger" onclick="window.location.href='/admin/product'">Back</button>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Product')); ?></div>
                
                <div class="card-body">
                    <form method="POST" action="/admin/postproduct" enctype="multipart/form-data">
                        <?php if(Session::get('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(Session::get('success')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(Session::get('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(Session::get('danger')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(Session::get('taken')): ?>
                            <div class="alert alert-warning">
                               Product exist
                            </div>
                        <?php endif; ?>
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <select type="text" name="name" id="name" required autocomplete="name" class="form-control">
                                    <option value="charcoal">Charcoal</option>
                                    <option value="yacon">Yacon</option>
                                    <option value="ground coffee">Ground Coffee</option>
                                    <option value="whole beans coffee">Whole Beans Coffee</option>
                                    <option value="adlai">Adlai</option>
                                    <option value="turmeric">Turmeric</option>
                                    <option value="honey">Honey</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Weight')); ?></label>

                            <div class="col-md-6">
                                <select type="text" name="weight" id="weight" required autocomplete="weight" class="form-control">
                                    <option value="500mg">500mg</option>
                                    <option value="1kg">1kg</option>
                                    <option value="500g">500g</option>
                                    <option value="250g">250g</option>
                                    <option value="250mg">250mg</option>
                                    <option value="8.8">8.8</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Image')); ?></label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control " name="image" required autocomplete="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Quantity')); ?></label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control " name="quantity" required autocomplete="quantity">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Price')); ?></label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" required autocomplete="price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="remarks" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Remarks')); ?></label>

                            <div class="col-md-6">
                                
                                <select type="text" name="remarks" id="remarks" required autocomplete="remarks" class="form-control">
                                    <option value="available">Available</option>
                                    <option value="outofstock">Out of stock</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Add product')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hineleban-master\resources\views/dashboards/admins/addproduct.blade.php ENDPATH**/ ?>
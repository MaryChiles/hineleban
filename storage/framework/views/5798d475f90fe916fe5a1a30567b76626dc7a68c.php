<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item ">
              <h5 class="nav-link " >Hineleban <span class="sr-only">(current)</span></h5>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="/admin/dashboard">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/admin/product">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/customer">Customer</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Transactions
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo e(route('admin.order')); ?>">Order</a>
                
                
                <a class="dropdown-item" href="<?php echo e(route('admin.sales')); ?>">Sales</a>
                <a class="dropdown-item" href="<?php echo e(route('admin.delivery')); ?>">Delivery</a>
                <a class="dropdown-item" href="<?php echo e(route('admin.user')); ?>">Users</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>


      <div class="container">
        <?php if(Session::get('delete')): ?>
        <div class="alert alert-danger">
            Product deleted
        </div>
    <?php endif; ?>

          <div style="padding-bottom: 20px;">
            <button type="button" onclick="window.location.href='/admin/addproduct'" class="btn btn-outline-primary" >
              Add product
            </button>
          </div>
     
        <table class="table table-striped table-bordered" id="datatable">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Weight</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Remarks</th>
                <th scope="col">Price x Quantity</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
                
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>
                <th scope="row"><?php echo $data->id;?></th>
                <td><?php echo $data->name;?></td>
                <td><?php echo $data->weight;?></td>
                <td><?php echo $data->quantity;?></td>
                <td><?php echo $data->price;?></td>
                <td><img style="height:60px;" src="/image/<?php echo e($data->image); ?>" /></td>
                <td><?php echo $data->remarks;?></td>
                <td>PHP
                    <?php 

                     $result = $data->quantity * $data->price;
                     echo number_format($result);
                     ?>
                </td>
                <td>
                    <button class="btn btn-outline-danger" onclick="window.location.href='delete/<?php echo e($data->id); ?>'">Delete</button>
                    <button class="btn btn-outline-success" onclick="window.location.href='edit/<?php echo e($data->id); ?>'">Edit</button>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
      </div>


   
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascripts'); ?>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hineleban-master\resources\views/dashboards/admins/product.blade.php ENDPATH**/ ?>
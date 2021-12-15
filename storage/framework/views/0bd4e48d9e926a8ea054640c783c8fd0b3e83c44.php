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
              <a class="nav-link " href="/admin/dashboard" >Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/product">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/admin/customer">Customer</a>
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
      <?php if(Session::get('success')): ?>
        <div class="alert alert-warning">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table table-striped table-bordered" id="customer">
        <thead>
          <tr>
            
            <th >Fullname</th>
            <th>Email</th>
            <th>Gender</th>
            <th>View</th>
            <th>Deactivate</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            
            <td><?php echo e($customer->name); ?></td>
            <td><?php echo e($customer->email); ?></td>
            <td><?php echo e($customer->gender); ?></td>
            <td>
                <button class="btn btn-outline-primary btn-sm" onclick="window.location.href='showcustomer/<?php echo e($customer->id); ?>'">View</button>      
            </td>
            <td>
              <form method="POST" action="<?php echo e(route('customer.deactivate')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($customer->id); ?>">
                <button class="btn btn-outline-danger btn-sm" type="submit">Deactivate</button>
            </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascripts'); ?>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#customer').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hineleban-master\resources\views/dashboards/admins/customer.blade.php ENDPATH**/ ?>
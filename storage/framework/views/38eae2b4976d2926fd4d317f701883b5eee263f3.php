<?php $__env->startSection('content'); ?>

<div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <h5 class="nav-link active">Hineleban <span class="sr-only">(current)</span></h5>
        </li>
        <li class="nav-item ">
          <a class="nav-link active">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/product">Product</a>
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
            <a class="dropdown-item" href="<?php echo e(route('admin.chart')); ?>">Charts</a>
          </div>
        </li>
      </ul>
      
    </div>
  </nav>

  <div class="row" style="padding-top: 40px;">
    <div class="col-sm-6 col-md-4">
      <div class="card" style="width:100%;">
        <div class="card-header text-center">
          Total Users
        </div>
        <div class="card-body text-center">
          <p class="card-text"><?php echo e($finalUserCount); ?> Active User</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4">
      <div class="card" style="width: 100%;">
        <div class="card-header text-center">
          Total Product
        </div>
        <div class="card-body text-center">
          <p class="card-text"><?php echo e($finalProductCount); ?> Active Product(s)</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4">
      <div class="card" style="width: 100%;">
        <div class="card-header text-center">
          Year Sales
        </div>
        <div class="card-body text-center">
          <p class="card-text"><?php echo e(number_format($sales, 2)); ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="mt-5 col-md-4 col-sm-12">
      <div class="table-responsive">
        <div class="card">
          <div class="card-header">
            <h1>Highest Selling Product</h1>
          </div>
          <div class="card-body">
            <?php if(count($highest_selling) > 0): ?>
            <table class="table">
              <thead class="bg-dark text-light">
                <tr>
                  <th scope="col">Product Name</th>
                  <th scope="col">Total Sales</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $highest_selling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($hs->product_name); ?></td>
                  <td><?php echo e($hs->total); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
            </table>
            <?php else: ?>
            <div class="alert alert-danger text-center">
              <h6>No Data to show</h6>
            </div>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>

    <div class="mt-5 col-md-4 col-sm-12">
      <div class="table-responsive">
        <div class="card">
          <div class="card-header">
            <h1>Latest Sales</h1>
          </div>
          <div class="card-body">
            <?php if(count($latest_sales) > 0): ?>
            <table class="table">
              <thead class="bg-dark text-light">
                <tr>
                  <!-- <th scope="col">#</th>
                  <th scope="col">Product Name</th> -->
                  <th scope="col">Order Num</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Posted Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $latest_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <!-- <th scope="row"><?php echo e($ls->id); ?></th>
                  <td><?php echo e($ls->product_name); ?></td> -->
                  <td><?php echo e($ls->order_num); ?></td>
                  <td><?php echo e($ls->quantity); ?></td>
                  <td><?php echo e($ls->updated_at); ?></td>
                  <td><a href="<?php echo e(url('/admin/invoice',$ls->order_num)); ?>" target="_blank" class="btn btn-primary">View Invoice</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <?php else: ?>
            <div class="alert alert-danger text-center">
              <h6>No Data to show</h6>
            </div>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>

    <div class="mt-5 col-md-4 col-sm-12">
      <div class="table-responsive">
        <div class="card">
          <div class="card-header">
            <h1>Recently Added Products</h1>
          </div>
          <div class="card-body">
            <?php if(count($recent_products) > 0): ?>
            <table class="table">
              <thead class="bg-dark text-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Price</th>
                  <th scope="col">Created At</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $recent_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <th scope="row"><?php echo e($rp->id); ?></th>
                  <td><?php echo e($rp->name); ?></td>
                  <td><?php echo e($rp->quantity); ?></td>
                  <td><?php echo e($rp->price); ?></td>
                  <td><?php echo e($rp->created_at->diffForHumans()); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
            <?php else: ?>
            <div class="alert alert-danger text-center">
              <h6>No Data to show</h6>
            </div>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>



  </div>


</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hineleban-master\resources\views/dashboards/admins/index.blade.php ENDPATH**/ ?>
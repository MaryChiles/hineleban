<?php $__env->startSection('content'); ?>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item ">
              <h5 class="nav-link active" >Hineleban <span class="sr-only">(current)</span></h5>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/user/dashboard">Shop</a>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="/user/myorders">My orders</a>
            </li>
          </ul>
          <form  class="form-inline my-2 my-lg-0">
            
            <svg onclick="window.location.href='/user/cart'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <span class="badge badge-primary"><?php echo e($finalCount); ?></span>
          </form>  
        </div>
      </nav>
</div>


<?php
$datenow =   date('Y-m-d'); 
?>


<div class="container">
  <?php if(Session::get('success')): ?>
<div class="alert alert-success alert-dismissible fade show"  role="alert">
  <?php echo e(Session::get('success')); ?>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

<?php if(Session::get('error')): ?>
<div class="alert alert-danger alert-dismissible fade show"  role="alert">
  <?php echo e(Session::get('danger')); ?>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>
  <div class="row">
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   
          <div class="col-sm-6 col-md-4">
            <form method="POST" action="/user/addtocart">
              <?php echo csrf_field(); ?>
              <div class="card border-white">
                  <img class="card-img-top" style="height: 250px;" src="/image/<?php echo e($data->image); ?>" alt="Card image cap">
                  <input type="text" value="<?php echo e($data->id); ?>" name="product_id" hidden>
                  <input type="text" value="<?php echo e(Auth::user()->id); ?>" name="user_id" hidden>
                  <input type="text" value="<?php echo e($data->name); ?>" name="product_name" hidden>
                  <input type="text" value="<?php echo e($data->image); ?>" name="image" hidden>
                  <input type="text" value="<?php echo e($data->price); ?>" name="price" hidden>
                  <input type="text" name="created_at" value="<?php echo $datenow;?>" hidden>
                      <div class="card-body">
                          <h5 class="card-title"><?php echo e($data->name); ?></h5>
                          <p class="card-text">PHP<?php echo e($data->price); ?>.00</p>
                          
                          <button type="submit" class="btn btn-primary">Add to cart</button>
                      </div>
                  </div>
                </form>
  
          </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascripts'); ?>
    <script>
      $(document).ready(function(){
        $(".alert-success").fadeTo(1000, 500).slideUp(500, function(){
            $(".alert-success").slideUp(500);
        });
      })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hineleban-master\resources\views/dashboards/users/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div style="padding-left: 10px;" >
  <button class="btn btn-danger" onclick="window.location.href='/user/dashboard'">Back</button>
</div>

<div class="container">
    <?php if(Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show"  role="alert">
          <?php echo e(Session::get('success')); ?>

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
    <?php $__currentLoopData = $countTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($total->totals_count > 0): ?>
        <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header"><?php echo e(__('Cart')); ?></div>
                 <div style="text-align: right;">
                  
                    <button class="px-6 py-2 text-red-800 bg-red-300 btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Place order</button>
                 </div>
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Product</th>
                          <th scope="col">Product name</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Price</th>
                          <th scope="col">Sub Total</th>
                          <th scope="col">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th scope="row">
                              <img style="height: 100px;" src="/image/<?php echo e($item->image); ?>" alt="">
                          </th>
                          <td><?php echo e($item->product_name); ?></td>
                          <td>
                              <form action="<?php echo e(route('cart.update')); ?>" method="POST">
                                  <?php echo csrf_field(); ?>
                                  <input type="hidden" name="id" value="<?php echo e($item->id); ?>" >
                                <input type="number" class="keyupfunction" name="quantity" min="1"  value="<?php echo e($item->quantity); ?>" 
                                class="w-6 text-center bg-gray-300" />
                                <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500 btn btn-success">update</button>
                                </form>
                          </td>
                          <td><?php echo e($item->price); ?></td>
                          <td>
                              <?php
                                $result = $item->quantity * $item->price;
                                echo $result;  
                              ?>
                          </td>
                          <td>
                              <form action="<?php echo e(route('cart.remove')); ?>" method="POST">
                                  <?php echo csrf_field(); ?>
                                  <input type="hidden" value="<?php echo e($item->id); ?>" name="id">
                                  <button class="px-4 py-2 text-white bg-red-600 btn btn-secondary">x</button>
                              </form>
                          </td>
                        </tr>
      
                        
      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                      </tbody>
                     
                    </table>
                    <?php $__currentLoopData = $countTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h1 style="text-align: center;">PHP <?php echo e($total->totals_count); ?></h1>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
                    <form action="<?php echo e(route('cart.clear')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" name="user_id">
                      <button class="px-6 py-2 text-red-800 bg-red-300 btn btn-danger">Remove All Item</button>
                    </form>
      
                    
              </div>
          </div>
      </div>
        <?php else: ?>

        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <img src="/images/emptycoffee.jpg" style="height: 500px" alt="">
              <br/>
                <div style="widows: 300px; text-align: center;">
                  <button class="btn btn-primary" onclick="window.location.href='/user/dashboard'">Shopping</button>
                </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose your payment method</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div style="text-align: center;">
            <button type="button" class="btn btn-primary" onclick="window.location.href='/user/placeorderbankdeposit'">Bank Deposit</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='/user/placeordercash'">Cash</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='/user/placeordercheque'">Cheque Card</button>
            </div>
        </div>
       
      </div>
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


      $("[type='number']").keypress(function (evt) {
          evt.preventDefault();
      });


     
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hineleban-master\resources\views/dashboards/users/cart.blade.php ENDPATH**/ ?>
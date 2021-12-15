<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="padding-left: 10px;">
    <button class="btn btn-danger" onclick="window.location.href='/user/dashboard'">Back</button>
    
</div>
<div class="container">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Waiting to deliver</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/user/myordersdone" aria-selected="false">Delivered order</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table class="table table-striped table-bordered" id="recentorder">
                <thead>
                  <tr>
                    
                    <th >Order number</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                      <?php $__currentLoopData = $myorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                        
                  <tr>
                   
                    <td><?php echo e($item->order_num); ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="window.location.href='showmyorders/<?php echo e($item->order_num); ?>'">View</button>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
        </div>
      </div>
 
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascripts'); ?>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#recentorder').DataTable();
        });
        $(document).ready( function () {
            $('#deliveredorder').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hineleban-master\resources\views/dashboards/users/myorders.blade.php ENDPATH**/ ?>
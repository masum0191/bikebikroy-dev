												
												
<?php if($errors->any()): ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>  <i class="fas fa-bell"></i> <?php echo e(count($errors)); ?> Errors</strong> 
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p class="text-danger strong"><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
								
<?php endif; ?>


<?php /**PATH /home/bikebik/public_html/resources/views/partial/formerror.blade.php ENDPATH**/ ?>
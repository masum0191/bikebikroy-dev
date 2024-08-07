
<?php $__env->startSection('title', "Register"); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="user-card shadow-lg">
            <h3 class="user-logo mb-0">
               Otp Verify
            </h3>
            <h6 ><?php if($errors->has('status')): ?>
                   
                <strong class="text-danger text-center"><?php echo e($errors->first('status')); ?></strong>
                <?php endif; ?></h6>
            
<form class="login-form"   method="POST" action='<?php echo e(url("userotpverify")); ?>'>

<?php echo csrf_field(); ?>

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">
        <i class="far fa-user"></i>
    </span>
    <input id="code" type="number" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code"
  value="<?php echo e(old('code')); ?>" required autocomplete="code" autofocus  placeholder="Otp Code">
<?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<div class="invalid-feedback">
    <small  role="alert">
        <?php echo e($message); ?>

      </small>
  </div>

<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  
</div>
<input type="hidden" name="phone" value="<?php echo e(Request::segment(2)); ?>">
           
            <button class="user-btn mt-2">
                Verify
            </button>
          
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/auth/otpverify.blade.php ENDPATH**/ ?>
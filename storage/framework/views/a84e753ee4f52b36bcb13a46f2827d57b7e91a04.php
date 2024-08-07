<?php $__env->startSection('title', "Register"); ?>

<style>
    .login-with-facebook a{
    padding: 5px 10px;
    background: #3b5999;
    color: #fff;
    display: block;
    border-radius: 4px;
}
.login-with-facebook{
    padding: 0 0 20px 0;
}
.login-with-facebook a li{
    font-weight: 700;
}
.login-with-facebook a li i{
    margin-right: 10px;
}

.login-with-google a{
    padding: 5px 10px;
    background: transparant;
    color: #000;
    display: block;
    border-radius: 4px;
    border: 1px solid #ddd;
}
.login-with-google{
    padding: 0 0 20px 0;
}
.login-with-google a li{
    font-weight: 700;
}
.login-with-google a li i{
    margin-right: 10px;
}
</style>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="user-card shadow-lg">
            <h3 class="user-logo mb-0">
                Bike  Bikroy 
            </h3>
            <div class="login-with-facebook">
                <a href="<?php echo e(url('login/facebook')); ?>">
                     <ul>
                     <li><i class="fab fa-facebook-square"></i> Continue with Facebook</li>
                 </ul>
                </a>
             </div>
                   <div class="login-with-google">
                <a href="<?php echo e(url('login/google')); ?>">
                     <ul>
                     <li><i class="fab fa-google"></i> Continue with Google</li>
                 </ul>
                </a>
             </div>
            <?php if($errors->has('status')): ?>
                                                           
            <strong><?php echo e($errors->first('status')); ?></strong>
        
    <?php endif; ?>
<form class="login-form"   method="POST" action='<?php echo e(url("userregister")); ?>' aria-label="<?php echo e(__('Register')); ?>">

<?php echo csrf_field(); ?>

<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">
        <i class="far fa-user"></i>
    </span>
    <input id="email" type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fullname"
  value="<?php echo e(old('fullname')); ?>" required autocomplete="fullname" autofocus  placeholder="Your Full Name">
<?php $__errorArgs = ['fullname'];
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
<div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">
       <i class="fa fa-phone"></i>
    </span>
    <input id="phone" type="tel" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone"
  value="<?php echo e(old('phone')); ?>" required autocomplete="phone" autofocus  placeholder="Your Phone Number">
<?php $__errorArgs = ['phone'];
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
<!--old-->

            
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    <i class="far fa-envelope"></i>
                </span>
                <input id="email" type="email" class="form-control" name="email"
               placeholder="Your Email Address">
          
              
            </div>
          
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-key"></i>
                </span>
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                value="<?php echo e(old('password')); ?>" required autocomplete="password" autofocus  placeholder="Password">
              <?php $__errorArgs = ['password'];
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
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-key"></i>
                </span>
                <input id="password_confirmation" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation"
                value="<?php echo e(old('password_confirmation')); ?>" required autocomplete="password_confirmation" autofocus  placeholder="Confirm Password">
              <?php $__errorArgs = ['password_confirmation'];
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
          
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox"  id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
           
            <button class="user-btn mt-2">
                Registration
            </button>
            <div class="row mt-5">
                <div class="col-md-6">
                    <a href="<?php echo e(url('login')); ?>">Log Up</a>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo e(url('/')); ?>" class="text-danger">Home </a>
                </div>
            </div>







        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>
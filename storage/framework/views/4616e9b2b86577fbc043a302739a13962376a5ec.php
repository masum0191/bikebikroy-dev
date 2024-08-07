<?php $__env->startSection('content'); ?>
<section id="main-ad">
        <div class="container">
             <div class="row">

                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-12">
                            <p class="category-tittle mb-0">
                              Top Bike & Scooter Brand 
                            </p>
                        </div>

                    </div>
                    <div class="main-category">
                        <div class="row">
                            <?php $__currentLoopData = $Bikebradtop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-2 col-sm-1">
                                <a href="<?php echo e(url('bikebrand/'.$brand->slug)); ?>">
                                    <div class="single-category">
                                        <div class="cat-icon align-self-center">
                                            <img src="<?php echo e($brand->photo); ?>" alt="<?php echo e($brand->bikebrand); ?>" class="img-fluid">
                                        </div>
                                        <div class="cat-text align-self-center">
                                      <span><?php echo e($brand->bikesale->count('id')); ?>ads</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                    </div>
                </div>
              </div>
            <div class="row">

                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-12 pt-5">
                            <p class="category-tittle mb-0">
                                All Bike Brand
                            </p>
                        </div>

                    </div>
                    <div class="main-category">
                        <div class="row">
                            <?php $__currentLoopData = $Bikebrad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-2 col-sm-1">
                                <a href="<?php echo e(url('bikebrand/'.$brand->slug)); ?>">
                                    <div class="single-category">
                                        <div class="cat-icon align-self-center">
                                            <img src="<?php echo e($brand->photo); ?>" alt="<?php echo e($brand->bikebrand); ?>" class="img-fluid">
                                        </div>
                                        <div class="cat-text align-self-center">
                                      <span><?php echo e($brand->bikesale->count('id')); ?>ads</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>


                    </div>
                </div>
              </div>
              
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/frontend/en/brand/index.blade.php ENDPATH**/ ?>
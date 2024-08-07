<?php $__env->startSection('content'); ?>
<style>

</style>
<section id="main-ad">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <?php if($Allbikes->isNotEmpty()): ?>
                <?php $__currentLoopData = @$Allbikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- <div class="single-search-result d-flex mb-3">
                    <div class="w-25">
                        <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100" alt="<?php echo e($bike->title); ?>">
                    </div>
                    <div class="w-75 align-self-center">
                        <h4>

                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>"><?php echo e($bike->title); ?></a>
                        </h4>
                        <p class="mb-0">
                            <?php echo $bike->description; ?>

                        </p>
                    </div>
                </div> -->



                <div class="row g-0 mb-4" style="border: 1px solid #ddd;">
                    <div class="col-md-3"> <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="bike-post-list" width="279px" height="180px" alt="Yamaha R15M Price In BD" style="object-fit: cover">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h4>

                                <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>"><?php echo e($bike->title); ?></a>
                            </h4>
                            <h5>
                                Price: 00000
                            </h5>
                            <p class="mb-0">
                                <?php echo $bike->description; ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(@$Allbikes->withQueryString()->onEachSide(1)->links()); ?>

                <?php else: ?>
                <div>
                    <h2 class="text-center">No Resule found</h2>
                </div>
                <?php endif; ?>
            </div>


        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/frontend/en/search/show.blade.php ENDPATH**/ ?>
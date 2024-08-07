<?php $__env->startSection('content'); ?>
<style>
    @media (max-width: 767px) { 
    .bike-post-list{
        width: 100%;
    }
 
 }


@media (min-width: 768px) and (max-width: 991px) { 
    .bike-post-list{
     height: 190px;
     width: 198px;   
    }
 }


@media (min-width: 992px) and (max-width: 1199px) {
    .bike-post-list{
        height: 240px;
        width: 198px;   
       }
 }


 .search-bar .select2-container--default .select2-selection--single .select2-selection__arrow{
    height: 36px;
}
.search-bar span.select2.select2-container.select2-container--default.select2-container--focus{
    height: 100%;
}
.search-bar .select2-container{
    height: 100%;
}
.search-bar .selection{
    height: 100%;
}
.search-bar .select2-container--default .select2-selection--single{
    height: 100%;
}
.search-bar .select2-container--default .select2-selection--single .select2-selection__rendered{
    height: 100%;
    line-height: 36px;
}
</style>
 <section id="ad-src-area">
     <form action="<?php echo e(url('/bikesalesearch')); ?>" method="get" class="d-flex">
        <div class="container">
            <div class="search-bar">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo Form::select('district',CommonFx::Districtname(),null,array('class'=>'form-select js-example-basic-single','required','placeholder'=>'Select District')); ?>


                    </div>
                    <div class="col-md-2">
                        <?php echo Form::select('brand',CommonFx::Brandnane(),null,array('class'=>'form-select js-example-basic-single','required','placeholder'=>'Select Brand')); ?>

                    </div>
                    <div class="col-md-2">
                         <select class="form-select me-2 js-example-basic-single" id="selectOption"> >
                                <option value="">Select Price Type</option>
                                <option <?php if(@$type=='low') echo 'selected'; ?> value="low">Price Low to High</option>
                                <option <?php if(@$type=='high') echo 'selected'; ?> value="high">Price High to Low</option>
                            </select> 
                    </div>
                    <div class="col-md-6  d-flex">
                           
                            <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                            
                          
                            
                        
                            <button class="btn btn-outline-primary" type="submit">Search</button>

                    </div>
                </div>
            </div>
        </div>
     </form>
    </section>


    <section id="main-ad">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar mobile-none">
                        
                        
                        <!--<p class="mb-2 sidebar-head">-->
                        <!--    Sort results by-->
                        <!--</p>-->
                        <!--<?php echo Form::select('district',CommonFx::Districtname(),null,array('class'=>'form-select js-example-basic-single','placeholder'=>'Select District')); ?>-->
                        <!--<p class="mb-2 pt-2 sidebar-head">-->
                        <!--    Sort results by-->
                        <!--</p>-->
                        <!--<?php echo Form::select('district',CommonFx::Districtname(),null,array('class'=>'form-select js-example-basic-single','placeholder'=>'Select District')); ?>-->

                        <!--  <p class="mb-2 pt-2 sidebar-head">-->
                        <!--  <?php echo e(@$brandtype); ?>-->
                        <!--</p>-->
                        <ul class="ps-0 sidebar-brand">
                            <?php $__currentLoopData = $Bikebrad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <li><a  href="<?php echo e(url('bikebrand/'.$brand->slug)); ?>"> <i class="fas fa-motorcycle"></i> <?php echo e($brand->bikebrand); ?> <span>(<?php echo e($brand->bikesale->count('id')); ?>)</span></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                         <p class="mb-2 pt-2 sidebar-head">
                            Location
                        </p>
                        <ul class="ps-0 sidebar-brand">
                            <?php $__currentLoopData = $Divisionalbike; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divison): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a  href="<?php echo e(url('bikesale-divison/'.$divison->slug)); ?>"> <i class="fas fa-map"></i> <?php echo e($divison->division); ?> <span>(<?php echo e($divison->bikesale->count('id')); ?>)</span></a></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php $__currentLoopData = $Bikeslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo e($loop->index); ?>" class="<?php echo e($loop->iteration == 1 ? 'active' : ''); ?>" aria-current="true" aria-label="Slide 1"></button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="carousel-inner">
                            <?php $__currentLoopData = $Bikeslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php echo e($loop->iteration == 1 ? 'active' : ''); ?>">
                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$slider->path.'/'.$slider->photoone)); ?>" class="d-block w-100" max-width="736px" height="400px" alt="<?php echo e($slider->title); ?>" style="object-fit: cover">
                                <a href="<?php echo e(url('bikesale/'.$slider->slug)); ?>">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo e($slider->title); ?></h5>
                                    <p class="mb-0"><?php echo e($slider->title); ?></p>
                                </div>
                            </a>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                    <div class="ad-card">
                    <?php $__currentLoopData = @$Allbikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="card ad-card-single mb-3 border"  style="">
                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                <div class="row g-0">
                                    <div class="col-md-5"> <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="bike-post-list" width="307px" height="215px" alt="<?php echo e($bike->title); ?>" style="object-fit: cover">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title mb-0"><?php echo e($bike->title); ?></h5>
                                            <p class="card-text mb-1"><?php echo e(@$bike->district->district); ?>, <?php echo e(@$bike->bikebrand->bikebrand); ?> </p>

                                               <span class="member-btn"><i class="fas fa-star"></i>
                                                <?php echo e(@$bike->user->package->packagename); ?></span>
                                            <h6 class="price text-primary mb-3 mt-1">
                                                Tk <?php echo e($bike->price); ?>


                                            <p class="card-text text-end"><small class="text-muted"><?php echo e(@$bike->updated_at->diffForHumans()); ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php echo e(@$Allbikes->onEachSide(1)->links()); ?>

                </div>

                <div class="col-md-2">
                    <img src="assets/images/ad-space-160x600.jpg" class="" alt="">
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/frontend/en/bikesale/index.blade.php ENDPATH**/ ?>
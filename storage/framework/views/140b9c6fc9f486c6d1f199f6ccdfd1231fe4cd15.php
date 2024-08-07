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
</style>
<?php $__env->startSection('content'); ?>
    <section id="product-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="similar-head pt-5 mb-3 border-0">
                        <div class="row">
                            <div class="col-md-12">
                              <img src="<?php echo e(url('storage/app/files/shares/uploads/'.@$Bikeshopinfo->path.'/'.@$Bikeshopinfo->profilephoto)); ?>" class="shop-banner-img" alt="<?php echo e(@$Bikeshopinfo->shopname); ?>"  height="350px">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <div class="main-shop">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                        <h5 class="pt-3">
                            <b>All ads from <?php echo e(@$Bikeshopinfo->shopname); ?></b>
                        </h5>
                        <div class="row">
                            <div class="col-md-12">
                                <?php $__currentLoopData = @$Allbikes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card ad-card-single" style="">
                                    <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" alt="<?php echo e($bike->title); ?>" width="307px" height="215px" style="object-fit: cover">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo e($bike->title); ?></h5>
                                                    <p class="card-text"> <?php echo e(@$bike->bikebrand->bikebrand); ?></p>
                                                    <h6 class="price">
                                                        Tk <?php echo e($bike->price); ?>

                                                    </h6>
                                                    <p class="card-text text-end"><small class="text-muted"><?php echo e(@$bike->created_at->diffForHumans()); ?></small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(@$Allbikes->onEachSide(1)->links()); ?>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="pr-sidebar">
                        <p class="mb-0">
                            <b> <?php echo e(@$Bikeshopinfo->shopname); ?> </b> <br>
                            The Road Starts Here

                        </p>

                        <span class="member-btn"><i class="fas fa-star"></i> MEMBER</span>
                        <p class="mb-0">
                            <b><?php echo e(date('d-M-Y', strtotime(@$Bikeshopinfo->created_at))); ?></b>
                        </p>
                        <p class="text-primary">
                            <?php echo e(@$Bikeshopinfo->facebookshoplink); ?>

                        </p>


                        <p>
                            <div id="Hidephone">
                                <div role="button">
                                  <strong> <i class="fas fa-phone" style="font-size:14px" ></i>
                                    <?php echo e(Str::limit(@$Bikeshopinfo->contactnumber,5,'*******')); ?></strong>
                                  &nbsp; &nbsp;&nbsp; <p class="mb-0" style="font-size:12px">Click To  View Phone Number </p>
                                </div>
                            </div>
                           </p>
                        <p class="d-none" id="Showphone"><i class="fas fa-phone" ></i><a href="<?php echo e('tel:'. @$Bikeshopinfo->contactnumber); ?>">  <?php echo e((@$Bikeshopinfo->contactnumber)); ?></a>
                        </p>
                        <p>
                            <i class="far fa-envelope-open"></i> <?php echo e(@$Bikeshopinfo->shopemail); ?>

                        </p>
                        <p>
                            <i class="fas fa-map-marker-alt"></i> <?php echo e(@$Bikeshopinfo->address); ?>

                        </p>




                        <p class="mb-0">
                            <b>About the shop</b>
                        </p>
                        <p>
                            <?php echo @$Bikeshopinfo->description; ?>

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>



   
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/lightbox.min.js')); ?>"></script>
    <script>
          $(document).ready(function () {
           $('#Hidephone').click(function(){
            $('#Hidephone').addClass('d-none');
            $('#Showphone').removeClass('d-none');
           });

    });


    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/frontend/en/shop/show.blade.php ENDPATH**/ ?>
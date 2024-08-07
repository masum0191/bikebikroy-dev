<?php $__env->startSection('page-style'); ?>
<link href="<?php echo e(asset('assets/css/lightbox.min.css')); ?>" rel="stylesheet" type="text/css">
<style>
    @media (max-width: 767px) { 
    .bike-post-list{
        width: 100%;
    height: 240px;
    }
    .product-share ul{
text-align: left;
margin-top: 8px;
}
 
 }
 
     #social-links {
        display: inline-block;

    }
.image-container {
    width: 100px; /* Set a fixed width for the container */
    height: 70px; /* Set a fixed height for the container */
    overflow: hidden; /* Hide any overflow content */
    display: inline-block; /* Display the containers inline */
    margin-right: 10px; /* Add spacing between the containers (adjust as needed) */
}

   .xzoom-gallery5{
  width: 100%; /* Ensure the image fills the container */
    height: 100%; /* Ensure the image fills the container */
    object-fit: cover; /* Cover the entire container while maintaining aspect ratio */


   }

ul.sfty-li li {
    list-style: disc;
}
    #social-links ul {
        margin-bottom: 0 !important;
        padding-left: 0 !important;
        margin-right: 10px;
    }

    #social-links ul li {
        list-style: none;
    }

    #social-links ul li a span {
        font-size: 22px;
        color: #000;
    }
    li{
        list-style: none;
    }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="product-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="similar-head pt-5 border-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="mb-0 smlr-head">
                             
                             <?php echo e(@$Bike->title); ?>

                            </h3>
                            <p class="mb-0 product-time">

                                Posted on <?php echo e(@$Bike->created_at); ?> at <?php echo e(@$Bike->division->division); ?>, <?php echo e(@$Bike->district->district); ?>

                            </p>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="product-share">
                                    <ul>

                                    <?php echo Share::currentPage()->facebook(); ?>

                                    <?php echo Share::currentPage()->twitter(); ?>

                                   <?php echo Share::currentPage()->whatsapp(); ?>

                                    <li><a href="<?php echo e(url('user/saveadd/'.@$Bike->id)); ?>"><i class="far fa-star"></i> Save ad</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">

                <div class="row">
                    
     
                    <div class="col-md-12">
                        <div class="">
                             <section id="magnific">
    <div class="row">
      <!--<div class="large-12 column"><h3>With Magnific Pop-up</h3>Left click while zooming</div>-->
      <div class="large-7 column">
        <div class="xzoom-container ">
            <div style="text-align:center;">
                <img class="xzoom5 " style="" id="xzoom-magnific" alt="<?php echo e($Bike->title); ?>" src="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)); ?>" xoriginal="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)); ?>" height="400px" max-width="735" />
          
            </div>
          <div class="xzoom-thumbs pt-2" >
            <a class="image-container" href="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)); ?>"><img class="xzoom-gallery5" src="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)); ?>" title="<?php echo e($Bike->title); ?>"></a>

<?php if($Bike->phototwo !== 'not-found.webp'): ?>
    <a class="image-container" href="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->phototwo)); ?>"><img class="xzoom-gallery5" src="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->phototwo)); ?>" title="<?php echo e($Bike->title); ?>"></a>
<?php endif; ?> 

<?php if($Bike->photothree !== 'not-found.webp'): ?>
    <a class="image-container" href="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photothree)); ?>"><img class="xzoom-gallery5" src="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photothree)); ?>" title="<?php echo e($Bike->title); ?>"></a>
<?php endif; ?>

<?php if($Bike->photofour !== 'not-found.webp'): ?>
    <a class="image-container" href="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photofour)); ?>"><img class="xzoom-gallery5" src="<?php echo e(@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photofour)); ?>" title="<?php echo e($Bike->title); ?>"></a>
<?php endif; ?>

            <!--<a href="images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery5" width="80" src="images/gallery/preview/04_g_car.jpg" title="The description goes here"></a>-->
          </div>
        </div>        
      </div>
      
    </div>
    </section>
                            
                        </div>

                        <div class="sproduct-price">
                            <h3 class="">
                                Tk <?php echo e(number_format($Bike->price)); ?> BDT
                                <?php if($Bike->negotiable=='on'): ?>
                                <span>Negotiable</span>
                                <?php endif; ?>


                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-6">

                                   <p class="mb-0">
                                    Bike Type:
                                    <b><?php echo e(@$Bike->biketype); ?></b>

                                </p>
                                       <p class="mb-0">
                                    Model:
                                    <b><?php echo e(@$Bike->bikemodel->bikemodel); ?></b>

                                </p>
                                     <p class="mb-0">
                                    Year of Manufacture:
                                    <b><?php echo e(@$Bike->manufacture); ?></b>

                                </p>

                                <p>
                                    Engine Capacity:
                                    <b><?php echo e(@$Bike->cc); ?>CC</b>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0">
                                    Brand:
                                    <b> <?php echo e(@$Bike->bikebrand->bikebrand); ?></b>

                                </p>
                                     <p class="mb-0">
                                    Trim/Edition:
                                    <b><?php echo e(@$Bike->edition); ?></b>

                                </p>
                                   <p class="mb-0">
                                    Kilometers Run:
                                    <b><?php echo e(@$Bike->kilometerrun); ?></b>

                                </p>
                                  <p class="mb-0">
                                    Condition:
                                    <b style="text-transform: capitalize;"><?php echo e(@$Bike->condition); ?></b>


                                </p>

                            </div>
                        </div>
                        <p>
                            <b>Description</b> <br>

                           <?php echo @$Bike->description; ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pr-sidebar">
                    <p>
                        For sale by
                        <b> <?php echo e(@$Bike->user->fullname); ?></b>
                    </p>
                    <?php if(@$Bike->user->bikeshop): ?>
                   <p>
                       Shop :
                        <b> <a href="<?php echo e(url('bikeshop/'. @$Bike->user->bikeshop->slug)); ?>"><?php echo e(@$Bike->user->bikeshop->shopname); ?></a></b>
                    </p>
                    <?php endif; ?> 
                    <div id="Hidephone">
                        <div role="button">
                         
                            <?php echo e(Str::limit(@$Bike->phonenumber,5,'*******')); ?></strong>
                          &nbsp; &nbsp;&nbsp; <p class="mb-0" style="font-size:12px">Click To  View Phone Number </p>
                        </div>
                    </div>
                   <p class="d-none" id="Showphone"> 
                    <i class="fas fa-phone" ></i><a href="<?php echo e('tel:'. @$Bike->phonenumber); ?>">  <?php echo e($Bike->phonenumber); ?></a>
                    
               
                    </p> 
                    <?php if(@Auth::id()!==$Bike->user_id): ?>
                      <p>
                        <a href="<?php echo e(url('user/bikesalechat/'.$Bike->id)); ?>"><i class="fas fa-comments"></i> Chat</a>
                    </p>
                   
                    <?php endif; ?>
                    <p>
                        <b><i class="fas fa-shield-alt"></i> Safety tips</b>
                    </p>
                    <ul class="sfty-li">
                        <li>Avoid offers that look unrealistic</li>
                        <li>Call with seller to clarify item details</li>
                        <li>Meet in a safe & public place</li>
                        <li>Check the item before buying it</li>
                        <li>Don’t pay in advance</li>
                       </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="similar-add">
    <div class="container">
        <div class="similar-head">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0 smlr-head">
                        Similar Ads
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="<?php echo e(url('bikesale')); ?>">Show more ads</a>
                </div>
            </div>
        </div>
        <div class="similar-main">
            <div class="row">
                <?php $__currentLoopData = $Similarbike; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="col-md-6">
                    <div class="card ad-card-single border" style="">
                        <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" height="150px" width="225px;" alt="<?php echo e($bike->title); ?>" style="object-fit: cover;">

                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($bike->title); ?></h5>
                                        <h6 class="price">
                                            <?php echo e(number_format($bike->price)); ?> BDT
                                        </h6>
                                        <p class="card-text mb-0"><?php echo e(@$bike->district->district); ?>, <?php echo e(@$bike->bikebrand->bikebrand); ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo e(@$bike->created_at->diffForHumans()); ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/frontend/en/bikesale/show.blade.php ENDPATH**/ ?>
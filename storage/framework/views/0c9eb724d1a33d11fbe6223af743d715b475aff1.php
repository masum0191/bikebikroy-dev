<?php $__env->startSection('content'); ?>
   

   
    <section id="similar-add">
    <div class="container">
        <div class="similar-head">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-0 smlr-head">
                        <?php echo e($info->title); ?>

                    </h3>
                    <P> <?php echo e($info->shortdescription); ?></P>
                    
                    
                </div>
                
            </div>
        </div>
        <?php if($info->type): ?>
        <div class="similar-main" style="padding: 30px 0;">
            <h3  class="mb-0 smlr-head">Type of <?php echo e($info->type); ?> Bike</h3>
            <div class="row">
                <?php $__currentLoopData = App\Models\Bikesale::where('biketype',$info->type)->get()->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3">
                        
                        <div class="card ad-card-single border mb-0">
                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" height="150px" width="225px;" alt="<?php echo e($bike->title); ?>" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php if(Str::of($bike->title)->wordCount()>2): ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?>

                                        <?php else: ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?> 
                                        <?php endif; ?>
                                    
                                    </h5>
                                    <h6 class="price">
                                       <?php echo e(number_format($bike->price)); ?> BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?><?php echo e(@$area->areaname); ?>, <?php echo e(@$bike->thana->thana); ?>, <?php echo e(@$bike->district->district); ?> </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
         <?php if($info->location): ?>
        <div class="similar-main" style="padding: 30px 0;">
            <h3  class="mb-0 smlr-head">Location Bike</h3>
            <div class="row">
                <?php $__currentLoopData = App\Models\Bikesale::where('district_id',$info->location)->get()->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3">
                        
                      <div class="card ad-card-single border mb-0">
                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" height="150px" width="225px;" alt="<?php echo e($bike->title); ?>" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php if(Str::of($bike->title)->wordCount()>2): ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?>

                                        <?php else: ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?> 
                                        <?php endif; ?>
                                    
                                    </h5>
                                    <h6 class="price">
                                       <?php echo e(number_format($bike->price)); ?> BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?><?php echo e(@$area->areaname); ?>, <?php echo e(@$bike->thana->thana); ?>, <?php echo e(@$bike->district->district); ?> </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
         <?php if($info->cc): ?>
        <div class="similar-main" style="padding: 30px 0;">
            <h3  class="mb-0 smlr-head"><?php echo e($info->cc); ?> CC Bike</h3>
            <div class="row">
                <?php $__currentLoopData = App\Models\Bikesale::where('cc',$info->cc)->get()->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3">
                        
                      <div class="card ad-card-single border mb-0">
                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" height="150px" width="225px;" alt="<?php echo e($bike->title); ?>" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php if(Str::of($bike->title)->wordCount()>2): ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?>

                                        <?php else: ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?> 
                                        <?php endif; ?>
                                    
                                    </h5>
                                    <h6 class="price">
                                       <?php echo e(number_format($bike->price)); ?> BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?><?php echo e(@$area->areaname); ?>, <?php echo e(@$bike->thana->thana); ?>, <?php echo e(@$bike->district->district); ?> </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
          <?php if($info->Ymanufacture): ?>
        <div class="similar-main" style="padding: 30px 0;">
            <h3 class="mb-0 smlr-head"><?php echo e($info->Ymanufacture); ?> of Manufacture  Bike</h3>
            <div class="row">
                <?php $__currentLoopData = App\Models\Bikesale::where('year',$info->Ymanufacture)->get()->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3">
                        
                      <div class="card ad-card-single border mb-0">
                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" height="150px" width="225px;" alt="<?php echo e($bike->title); ?>" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php if(Str::of($bike->title)->wordCount()>2): ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?>

                                        <?php else: ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?> 
                                        <?php endif; ?>
                                    
                                    </h5>
                                    <h6 class="price">
                                       <?php echo e(number_format($bike->price)); ?> BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?><?php echo e(@$area->areaname); ?>, <?php echo e(@$bike->thana->thana); ?>, <?php echo e(@$bike->district->district); ?> </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
         <?php if($info->enginecapacity): ?>
        <div class="similar-main" style="padding: 30px 0;">
            <h3 class="mb-0 smlr-head"><?php echo e($info->enginecapacity); ?> CC Bike</h3>
            <div class="row">
                <?php $__currentLoopData = App\Models\Bikesale::where('cc',$info->enginecapacity)->get()->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3">
                        
                     <div class="card ad-card-single border mb-0">
                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" height="150px" width="225px;" alt="<?php echo e($bike->title); ?>" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php if(Str::of($bike->title)->wordCount()>2): ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?>

                                        <?php else: ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?> 
                                        <?php endif; ?>
                                    
                                    </h5>
                                    <h6 class="price">
                                       <?php echo e(number_format($bike->price)); ?> BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?><?php echo e(@$area->areaname); ?>, <?php echo e(@$bike->thana->thana); ?>, <?php echo e(@$bike->district->district); ?> </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
          <?php if($info->enginecapacity): ?>
        <div class="similar-main" style="padding: 30px 0;">
            <h3 class="mb-0 smlr-head">Brand Bike</h3>
            <div class="row">
                <?php $__currentLoopData = App\Models\Bikesale::whereIn('bikebrand_id',[json_decode($info->queryinfo)])->get()->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bike): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3">
                        
                       <div class="card ad-card-single border mb-0">
                            <a href="<?php echo e(url('bikesale/'.$bike->slug)); ?>">
                                <img src="<?php echo e(url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)); ?>" class="w-100 bike-post-list" height="150px" width="225px;" alt="<?php echo e($bike->title); ?>" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php if(Str::of($bike->title)->wordCount()>2): ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?>

                                        <?php else: ?>
                                        <?php echo e(substr($bike->title, 0, 20) . '...'); ?> 
                                        <?php endif; ?>
                                    
                                    </h5>
                                    <h6 class="price">
                                       <?php echo e(number_format($bike->price)); ?> BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?><?php echo e(@$area->areaname); ?>, <?php echo e(@$bike->thana->thana); ?>, <?php echo e(@$bike->district->district); ?> </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
   
   

    


    <section id="quick-link">
        <div class="container">
           
            <p><?php echo $info->headerinfo; ?></p>

             <p><?php echo $info->footerinfo; ?></p>
          
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/frontend/en/procategory/index.blade.php ENDPATH**/ ?>
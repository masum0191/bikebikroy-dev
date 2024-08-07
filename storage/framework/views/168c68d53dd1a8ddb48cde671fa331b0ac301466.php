<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="<?php echo e(asset('dashboardassets/css/all.min.css')); ?>" rel="stylesheet">
   <link href="<?php echo e(asset('dashboardassets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboardassets/css/responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboardassets/css/style.css')); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>

.breadcrumb-item {

    display: inline-block !important;
}
    </style>
    <?php echo $__env->yieldContent('page-style'); ?>
</head>
<body>
    <div class="body-dark-mobile">
        <i class="fas fa-times menu-cross"></i>
    </div>
    <div id="main-dashboard" class="d-flex">
        <div class="sidebar">
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="brand-logo">

                   <?php echo e(@Auth::user()->adminname); ?>


            </a>

            <div class="main-dashboard-menu">
                <ul class="dash-main-menu">
                    <li><a href="/" class="page-active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    


                    <li>
                        <p class="layout-menu mb-0"><i class="far fa-copy"></i> Bike Sale
                            <i class="fas fa-angle-right menu-angle-one"></i></p>

                        <ul class="dash-main-menu layout-toggle">
                            <li><a href="<?php echo e(url('admin/bikesalelist')); ?>"  class="<?php echo e((request()->is('admin/bikesalelist')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Bikesale List</a></li>
                            <li><a href="<?php echo e(url('admin/recentsports')); ?>"  class="<?php echo e((request()->is('admin/recentsports')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Recent Sports Bikes</a></li>
                            <li><a href="<?php echo e(url('admin/scooters')); ?>"  class="<?php echo e((request()->is('admin/scooters')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Recent Scooters Bikes</a></li>
                            <li><a href="<?php echo e(url('admin/createbikesale')); ?>"  class="<?php echo e((request()->is('admin/createbikesale')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Create Bikesale</a></li>
                            <li><a href="<?php echo e(url('admin/archive-list')); ?>"  class="<?php echo e((request()->is('admin/archive-list')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i>Archive List</a></li>
                        </ul>
                    </li>
                    

                    <li>
                        <p class="layout-menu mb-0"><i class="far fa-copy"></i> Bike Shop
                            <i class="fas fa-angle-right menu-angle-one"></i></p>

                        <ul class="dash-main-menu layout-toggle">
                            <li><a href="<?php echo e(url('admin/bikeshoplist')); ?>" class="<?php echo e((request()->is('admin/bikeshoplist')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Bikeshop List</a></li>

                        </ul>
                    </li>
                    
                    <li>
                        <p class="page-menu mb-0"><i class="far fa-star"></i> Brand And Model <i class="fas fa-angle-right menu-angle-four"></i>


                        </p>

                        <ul class="dash-main-menu page-toggle">

                            <li><a href="<?php echo e(url('admin/bikebrandlist')); ?>" class="<?php echo e((request()->is('admin/bikebrandlist')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i>Bike Brand List</a></li>
                            <li><a href="<?php echo e(url('admin/bikemodellist')); ?>" class="<?php echo e((request()->is('admin/bikemodellist')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Model List</a></li>
                          


                        </ul>
                    </li>
                    <li>
                        <p class="page-menu mb-0"><i class="far fa-star"></i> User List <i class="fas fa-angle-right menu-angle-four"></i>


                        </p>

                        <ul class="dash-main-menu page-toggle">

                            <li><a href="<?php echo e(url('admin/userlist')); ?>" class="<?php echo e((request()->is('admin/userlist')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i>User List</a></li>
                            <li><a href="<?php echo e(url('admin/createuser')); ?>" class="<?php echo e((request()->is('admin/createuser')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Create User</a></li>
                          


                        </ul>
                    </li>

                    <li>
                        <p class="component-menu mb-0"><i class="fas fa-tachometer-alt"></i> Setting <i class="fas fa-angle-right menu-angle-six"></i>


                        </p>

                        <ul class="dash-main-menu component-toggle">
                            <li><a href="<?php echo e(url('admin/packagelist')); ?>"  class="<?php echo e((request()->is('admin/packagelist')) ? 'page-active' : ''); ?>"><i class="far fa-circle"></i> Package List</a></li>
                           

                        </ul>
                    </li>
                    

                </ul>
            </div>


        </div>



        <div class="main-content">
            <div class="main-header">
                <div class="row">
                    <div class="col-md-2 main-header-col-icon">
                        <ul class="menu-toggle-icon">
                            <li>
                                <i class="fas fa-bars main-toggle-btn"></i>
                                <i class="fas fa-bars main-toggle-btn-mobile"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 main-header-col m-auto">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

                        </form>
                    </div>
                    <div class="col-md-4 main-header-col">
                        <ul class="profile-area">
                            <li><span class="top-message-icon"><i class="far fa-envelope" data-bs-toggle="dropdown"></i>
                                    <div class="message-box dropdown-menu">

                                        <ul>
                                            <li>You have 7 messages</li>
                                            <li>
                                                <a href="#">
                                                    <span class="prf-img">
                                                        <img src="<?php echo e(url('assets/image/young-confident-handsome-man-full-260nw-1416442523.webp')); ?>" class="w-100" alt="">
                                                    </span>
                                                    Profile name</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="prf-img">
                                                        <img src="<?php echo e(url('assets/image/young-confident-handsome-man-full-260nw-1416442523.webp')); ?>" class="w-100" alt="">
                                                    </span>
                                                    Profile name</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="prf-img">
                                                        <img src="<?php echo e(url('assets/image/young-confident-handsome-man-full-260nw-1416442523.webp')); ?>" class="w-100" alt="">
                                                    </span>
                                                    Profile name</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="prf-img">
                                                        <img src="<?php echo e(url('assets/image/young-confident-handsome-man-full-260nw-1416442523.webp')); ?>" class="w-100" alt="">
                                                    </span>
                                                    Profile name</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="prf-img">
                                                        <img src="<?php echo e(url('assets/image/young-confident-handsome-man-full-260nw-1416442523.webp')); ?>" class="w-100" alt="">
                                                    </span>
                                                    Profile name</a>
                                            </li>


                                        </ul>
                                        <p class="mb-0 ntf-view-all">
                                            View all
                                        </p>
                                    </div>

                                </span></li>
                            <li>
                                <span class="top-notification-icon">
                                    <i class="fas fa-bell" data-bs-toggle="dropdown"></i>


                                    <div class="notification-box dropdown-menu">

                                        <ul>
                                            <li>You have <strong></strong>10</strong> notifications</li>
                                            
                                            <li><a href="#"><i class="fas fa-cart-plus text-danger"></i> notifications</a></li>
                                            <li><a href="#"><i class="fas fa-cart-plus text-primary"></i> notifications</a></li>
                                            <li><a href="#"><i class="fas fa-cart-plus text-warning"></i> notifications</a></li>
                                            <li><a href="#"><i class="fas fa-cart-plus text-info"></i> notifications</a></li>
                                            <li><a href="#"><i class="fas fa-cart-plus text-success"></i> notifications</a></li>

                                        </ul>
                                        <p class="mb-0 ntf-view-all">
                                            View all
                                        </p>
                                    </div>




                                </span>

                            </li>
                            <li>

                                <div class="user-profile">
                                    <div class="top-profile-img">
                                        <img class="" src="<?php echo e(@asset('storage/app/files/shares/profileimage/'.Auth::user()->image)); ?>" alt="" data-bs-toggle="dropdown">


                                        <div class="profile-box dropdown-menu">
                                            <ul>
                                                <li><a href="profile.html"><i class="far fa-user"></i> Profile</a></li>
                                                <li><a href="#"><i class="far fa-envelope-open"></i> Inbox</a></li>
                                            </ul>
                                            <hr>
                                            <ul>
                                                <li><a href="lock-screen.html"><i class="fas fa-lock"></i> Lock Screen</a></li>

                                                <li><a href="<?php echo e(route('logout')); ?>"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-key"></i> Logout</a>   </a>
                                                 <form id="logout-form"  action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                  <input  type="hidden" name="user" value="admin">
                                                     <?php echo csrf_field(); ?>
                                                 </form>
                                            </ul>
                                        </div>


                                    </div>

                                </div>





                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="main-dashboard" id="dash-spy">
                <div class="page-location">

                    <nav aria-label="breadcrumb">
                        <?php if(isset($breadcrumbs)): ?>
                        <ol class="breadcrumbs mb-0">
                          <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="breadcrumb-item <?php echo e(!isset($breadcrumb['link']) ? 'active' :''); ?>">
                            <?php if(isset($breadcrumb['link']) && ($breadcrumb['link'] !== 'javascript:void(0)')): ?>
                            <a href="<?php echo e(url($breadcrumb['link'])); ?>"><?php endif; ?><?php echo e($breadcrumb['name']); ?><?php if(isset($breadcrumb['link'])): ?></a>
                            <?php endif; ?>
                          </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                        <?php endif; ?>

                    </nav>
                </div>
                <?php echo $__env->yieldContent('content'); ?>



            <div class="copyright">
                <div class="row">
                    <div class="col-md-12">
                        <p class="copy-right-text">
                            Copyright © 2016-<?php echo e(date('Y')); ?> All rights
                            reserved.

                        </p>
                    </div>
                </div>
            </div>

        </div>




    </div>

<!--flash notification-->
<?php echo app('flasher.response_manager')->render(); ?>


    <script src="<?php echo e(asset('dashboardassets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboardassets/js/popper.min.js')); ?>"></script>
   <script src="<?php echo e(asset('dashboardassets/js/bootstrap.min.js')); ?>"></script>
   <script src="<?php echo e(asset('dashboardassets/js/jquery.preloader.min.js')); ?>"></script>
      <script src="<?php echo e(asset('dashboardassets/js/main.js')); ?>"></script>

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
    // alert(55);
  $('.js-example-basic-single').select2();

            var url = "<?php echo e(URL::to('/')); ?>";
            $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
  $(document).ready(function () {

$("#seennotify").click(function(){

 $.ajax({
     type: "post",
     url:url+'/admin/seennotification',

 });

});

$("#notificationsdropdown").click(function(){

$.ajax({
    type: "post",
    url:url+'/admin/deletenotification',
       success: function (d) {
            M.toast({
    html: 'Your Seen Your Notifcation'
});

}

});
});
});
          </script>
            <?php echo $__env->yieldContent('page-script'); ?>
    </body>
    </html><?php /**PATH /home/bikebik/public_html/resources/views/layouts/admin.blade.php ENDPATH**/ ?>
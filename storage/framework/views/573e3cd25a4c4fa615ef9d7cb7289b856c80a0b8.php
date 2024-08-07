<?php $__env->startSection('title','Edit Shop'); ?>
<?php $__env->startSection('page-style'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="product-main">
    <div class="container">
    <div class="row">
        <?php echo $__env->make('partial.formerror', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Form::model($Bikeshop, array('url' =>['user/updatebikeshop/'.$Bikeshop->id], 'method'=>'PATCH','class'=>'row g-3','files'=>true)); ?>


                <div class="col-12">
                    <label for="shopname" class="form-label">Shop Name *</label>
                    <?php echo Form::text('shopname', null, ['id' => 'shopname','required', 'class' => 'form-control  mb-1']); ?>

                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Shop Email</label>
                    <?php echo Form::email('shopemail', null, ['id' => 'shopemail', 'class' => 'form-control  mb-1']); ?>

                </div>
                <div class="col-md-6">
                    <label for="contactnumber" class="form-label">Contact Number *</label>
                    <?php echo Form::tel('contactnumber', null, ['id' => 'shopemail','required', 'class' => 'form-control  mb-1']); ?>


                </div>
                <div class="col-md-12">
                    <label for="facebookshoplink" class="form-label">Facebook Page (Shop Url)</label>
                    <?php echo Form::text('facebookshoplink', null, ['id' => 'facebookshoplink', 'class' => 'form-control  mb-1']); ?>


                </div>

                <div class="col-md-12">
                    <label for="googleamplocaltion" class="form-label">Google Map (Embed Code)</label>
                    <?php echo Form::text('googleamplocaltion', null, ['id' => 'googleamplocaltion', 'class' => 'form-control  mb-1']); ?>


                </div>
                <div class="col-md-12">
                    <label for="address" class="form-label">Shop Address *</label>
                    <?php echo Form::textarea('address', null, ['id' => 'description', 'class' => 'form-control  mb-1','rows'=>'3']); ?>


                </div>
                <div class="col-md-6">
                    <label for="profilephoto" class="form-label">Profile Photo * [150x150]</label>
                    <div class="form-group">
                        <input type="file" name="profilephoto"   id="image">
                         </div>

                </div>
                <div class="col-md-6">
                    <label for="coverphoto" class="form-label">Cover Photo *[300x600]</label>
                    <div class="form-group">
                        <input type="file" name="coverphoto"   id="image">
                         </div>

                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">About Shop *</label>
                    <?php echo Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control  mb-1']); ?>


                </div>
                <div class="col-md-12 mb-2">
                    <button type="submit"  class="btn btn-primary">Update</button>

                </div>

            </form>
        </div>
    </div>
</section>
    <?php echo Form::close(); ?>

</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/user/shop/edit.blade.php ENDPATH**/ ?>
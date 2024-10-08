<?php $__env->startSection('title','Create Bikesale'); ?>
<?php $__env->startSection('page-style'); ?>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <?php echo $__env->make('partial.formerror', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo Form::open(['url' => 'admin/createbikesale', 'class' => 'row g-3', 'files'=>'true']); ?>

         <div class="col-md-6">
            <?php echo Form::label('user', 'Select User *'); ?>

            <select class="form-control js-example-basic-single" name="user_id" required>
                <option value="" selected  disabled>Select One</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e(@$user->id); ?>"><?php echo e(@$user->fullname); ?> (<?php echo e(@$user->phone); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </select>
        </div>
        <div class="col-md-6">
            <?php echo Form::label('phonenumber', 'Number *'); ?>

            <?php echo Form::tel('phonenumber',null,   array('id'=>'phonenumber','required','class'=>'form-control','placeholder'=>'Ex: Bike Saler Phone Numer')); ?>



        </div>
                        <div class="col-md-12">
                            <?php echo Form::label('title', 'Title/Bike Name *'); ?>

                            <?php echo Form::text('title',null,   array('id'=>'title','required','class'=>'form-control','placeholder'=>'Ex: I Will Sale A Bike')); ?>

                         </div>
                         <div class="col-md-12">
                            <?php echo Form::label('metatitle', 'Bike Post Metatitle *'); ?>

                            <?php echo Form::text('metatitle',null,   array('id'=>'metatitle','required','class'=>'form-control','placeholder'=>'Ex:  Bike Title')); ?>

                         </div>
                         <div class="col-md-12">
                            <?php echo Form::label('metadescription', 'Bike Post Metadescription (Not More Than 160 Word )  *'); ?>

                            <?php echo Form::text('metadescription',null,   array('id'=>'metadescription','required','class'=>'form-control','placeholder'=>'Ex:  Bike Short Description')); ?>

                         </div>
                         <div class="col-md-4">
                                <label for="division_id" class="form-label">Select Division *</label>
                                <?php echo Form::select('division_id',CommonFx::Divisionname(),null, array('id'=>'division_id','required','class'=>'form-control js-example-basic-single','placeholder'=>'Select Division')); ?>

                            </div>
                            <div class="col-md-4">
                                <label for="district_id" class="form-label">Select District  *</label>
                                <select class="form-select js-example-basic-single" id="district_id" name="district_id" required>
                                    <option  value="">Select District *</option>
                                  </select>
                            </div>
                            <div class="col-md-4">
                                <label for="thana_id" class="form-label">Select Thana  *</label>
                                <select class="form-select js-example-basic-single" id="thana_id" name="thana_id" required>
                                    <option  value="">Select Thana *</option>
                                  </select>
                            </div>
                            
                         
                            <div class="col-md-12">
                                <label for="condition" class="form-label">Condition  *</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="new" value="new">
                                    <label class="form-check-label" for="new">New</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition" checked value="used">
                                    <label class="form-check-label" for="condition">Used</label>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <label for="inputState" class="form-label">Bike Type  *</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="biketype" id="Motorcycle" checked value="Motorcycle">
                                    <label class="form-check-label" for="Motorcycle">Motorcycle</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="biketype" id="Scooters" value="Scooters">
                                    <label class="form-check-label" for="Scooters">Scooters</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="biketype" id="E-bikes" value="E-bikes">
                                    <label class="form-check-label" for="E-bikes">E-bikes</label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Select Brand  *</label>
                                  <?php echo Form::select('bikebrand_id',CommonFx::BikeBrand(),null, array('id'=>'bikebrand_id','required','class'=>'form-control js-example-basic-single','placeholder'=>'Select Brand')); ?>

                            </div>
                            <div class="col-md-6">

                                <label for="inputState" class="form-label">Select Model  *</label>
                                <select class="form-select js-example-basic-single" id="bikemodel_id" name="bikemodel_id" required>
                                    <option  value="">Select Model *</option>
                                  </select>
                            </div>

                            <div class="col-12">
                                <?php echo Form::label('edition', 'Edition (optional) '); ?>

                                <?php echo Form::text('edition',null,   array('id'=>'edition','class'=>'form-control','placeholder'=>'Ex: What is the edition of your bike?')); ?>


                            </div>
                            <div class="col-12">
                                <?php echo Form::label('manufacture', ' Year of Manufacture '); ?>

                                <?php echo Form::text('manufacture',null,   array('id'=>'manufacture','class'=>'form-control','placeholder'=>'Ex: Year of Manufacture?')); ?>

                               </div>
                               <div class="col-12">
                                <?php echo Form::label('year', 'Year of Bike Buy *'); ?>

                                <?php echo Form::number('year',null,   array('id'=>'year','required','class'=>'form-control','placeholder'=>'Ex: What was your bike Buy Year ?')); ?>

                               </div>
                            <div class="col-md-6">
                                <?php echo Form::label('kilometerrun', 'Kilometers Run (km) *'); ?>

                                <?php echo Form::number('kilometerrun',null,   array('id'=>'kilometerrun','required','class'=>'form-control','placeholder'=>'Ex: What is the mileage of your bike?')); ?>


                            </div>
                            <div class="col-md-6">
                                <?php echo Form::label('cc', 'Engine Capacity (CC) *'); ?>

                                <?php echo Form::number('cc',null,   array('id'=>'cc','required','class'=>'form-control','placeholder'=>'Ex: What is the engine capacity of your bike?')); ?>

                            </div>
                            <div class="col-md-12">
                                <?php echo Form::label('description', 'Description  * (Not More Than 1000 Word)'); ?>

                                <?php echo Form::textarea('description',null,   array('id'=>'cc','required','class'=>'form-control','placeholder'=>'Ex: What is the engine capacity of your bike?')); ?>

                                 </div>
                            <div class="col-12">

                                <?php echo Form::label('price', 'Price (Tk) *'); ?>

                                <?php echo Form::number('price',null, array('id'=>'price','required','class'=>'form-control', 'min'=>'1','placeholder'=>'Ex: Pick a good price - what would you pay?')); ?>

                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="negotiable" name="negotiable">
                                    <label class="form-check-label" for="negotiable">
                                        Negotiable
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imageone" required  id="image1">

                                </div>
                                <img id="preview1" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imagetwo"  id="image2" class="d-none">

                                </div>
                                <img id="preview2" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imagethree"  id="image3" class="d-none">

                                </div>
                                <img id="preview3" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imagefour"  id="image4" class="d-none">

                                </div>
                                <img id="preview4" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>

                            <div class="col-md-12">
                                <?php echo Form::label('status', 'Status *'); ?>

                      <?php echo Form ::select('status',['Active'=>'Active','Pending'=>'Pending'], 'Active', array('required','id'=>'status', 'class'=>'form-control')); ?>

                             </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>



$('#image1').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview1').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
            // $('#image1').addClass('d-none');
            $('#image2').removeClass('d-none');

           });
           $('#image2').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview2').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

            $('#image3').removeClass('d-none');

           });
           $('#image3').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview3').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

            $('#image4').removeClass('d-none');

           });
           $('#image4').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
              $('#preview4').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });
$(document).ready(function () {
$('#division_id').change(function(){
            $('#district_id').empty();

    var divisionid = $(this).val();

    $.ajax({
        type: "GET",
        url: url + '/getdistrict/'+divisionid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){

                    $.each(data, function(key, value){
                      $('#district_id').append('<option value="'+value.id+'">' + value.district + '</option>');

                    });
                    $('#district_id').append(' <option  value="" selected disabled>Select District *</option>');
                    
                }

            },
    });

});
//for thana
$('#district_id').change(function(){
            $('#thana_id').empty();

    var districtid = $(this).val();

    $.ajax({
        type: "GET",
        url: url + '/getthana/'+districtid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){

                    $.each(data, function(key, value){
                       // alert(key);
                        $('#thana_id').append('<option value="'+value.id+'">' + value.thana + '</option>');

                    });
                    $('#thana_id').append(' <option  value="" selected disabled>Select Thana *</option>');
                }

            },
    });
    });
    //for area
$('#thana_id').change(function(){
            $('#area_id').empty();
      var thanatid = $(this).val();
    $.ajax({
        type: "GET",
        url: url + '/getarea/'+thanatid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){
                 $.each(data, function(key, value){
                      $('#area_id').append('<option value="'+value.id+'">' + value.areaname + '</option>');

                    });
                    $('#area_id').append(' <option  value="" selected disabled>Select Area *</option>');
                }

            },
    });
    });
$('#bikebrand_id').change(function(){
    $('#bikemodel_id').empty();
    $.ajax({
        type: "GET",
        url: url + '/getbikebrand/'+$(this).val(),
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){

                    $.each(data, function(key, value){
                        $('#bikemodel_id').append('<option value="'+value.id+'">' + value.bikemodel + '</option>');

                    });
                }

            },
    });
    });

});


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/admin/sale/create.blade.php ENDPATH**/ ?>
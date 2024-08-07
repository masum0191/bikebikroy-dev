
<?php $__env->startSection('title','Create User'); ?>
<?php $__env->startSection('page-style'); ?>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <?php echo $__env->make('partial.formerror', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo Form::open(['url' => 'admin/createuser', 'class' => 'row g-3', 'files'=>'true']); ?>

         <div class="col-md-6">
            <?php echo Form::label('fullname', 'Full Name *'); ?>

            <?php echo Form::text('fullname',null,   array('id'=>'fullname','required','class'=>'form-control','placeholder'=>'Ex: Jhon')); ?>



        </div>
        <div class="col-md-6">
            <?php echo Form::label('phone', 'Phone Number *'); ?>

            <?php echo Form::tel('phone','880',   array('id'=>'phone','required','class'=>'form-control','placeholder'=>'Ex: 88017')); ?>



        </div>
                        <div class="col-md-12">
                            <?php echo Form::label('email', 'Email *'); ?>

                            <?php echo Form::email('email',null,   array('id'=>'title','required','class'=>'form-control','placeholder'=>'Ex:admin@mail.com')); ?>

                         </div>
                         <div class="col-md-12">
                            <?php echo Form::label('password', 'Password *'); ?>

                            <?php echo Form::text('password',null,   array('id'=>'password','required','class'=>'form-control','placeholder'=>'Ex:  Admin1234')); ?>

                         </div>
                         <div class="col-md-12">
                            <?php echo Form::label('salepost', 'Can Sale Post *'); ?>

                            <?php echo Form::number('salepost','10',   array('id'=>'salepost','required','class'=>'form-control')); ?>

                         </div>
                        
                        
                         <div class="col-md-6">
                                <label for="division_id" class="form-label">Select Division *</label>
                                <?php echo Form::select('division_id',CommonFx::Divisionname(),null, array('id'=>'division_id','required','class'=>'form-control','placeholder'=>'Select Division')); ?>

                            </div>
                            <div class="col-md-6">
                                <label for="district_id" class="form-label">Select District  *</label>
                                <select class="form-select" id="district_id" name="district_id" required>
                                    <option  value="">Select District *</option>
                                  </select>
                            </div>
                            <div class="col-md-6">
                                <label for="thana_id" class="form-label">Select Thana  *</label>
                                <select class="form-select" id="thana_id" name="thana_id" required>
                                    <option  value="">Select Thana *</option>
                                  </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="area_id" class="form-label">Select Area  *</label>
                                <select class="form-select" id="area_id" name="area_id" required>
                                    <option  value="">Select Area *</option>
                                  </select>
                            </div>
                           
                          
                            

                            <div class="col-12">
                                <div class="form-group">
                                    <input type="file" name="photo" required  id="image1">

                                </div>
                                <img id="preview1" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>
                           

                            <div class="col-md-12 mb-3">
                                <?php echo Form::label('status', 'Status *'); ?>

                      <?php echo Form ::select('status',['1'=>'Active','0'=>'Pending'], '1', array('required','id'=>'status', 'class'=>'form-control')); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/admin/user/create.blade.php ENDPATH**/ ?>